<?php

namespace App\Livewire;

use App\Models\ChasResource;
use Livewire\Component;
use Livewire\WithPagination;

class ChasVerificationAndApprovalLivewire extends Component
{
    use WithPagination;

    public $resource_name, $batch_quantity;
    public $chasResourceSearch = '';

    public function render()
    {
        return view('livewire.chas-verification-and-approval-livewire',
    [
        'VerifiedApproval' => ChasResource::searchApproved($this->chasResourceSearch)->with(['category'])->where('status', '=', 'Approved')->where('verification_status', '=', 'Verified')->paginate(15)
    ]
);
    }

    public function submit(){

        $this->VerificationAndApproval();


        $this->reset(['resource_name', 'batch_quantity']);
    }


    public function VerificationAndApproval()
    {
        // Validate input
        $this->validate([
            'resource_name' => 'required',
            'batch_quantity' => 'required|integer'
        ]);

        // Convert resource_name to lowercase for case-insensitive comparison
        $resourceNameLower = strtolower($this->resource_name);

        // Retrieve records based on resource_name and batch_quantity, case-insensitive
        $records = ChasResource::whereRaw('LOWER(resource_name) = ?', [$resourceNameLower])
            ->limit($this->batch_quantity)
            ->get();

                    // Check if no records were found
        if ($records->isEmpty()) {
            session()->flash('notfound', 'No records found for the given resource name.');
            return;
        }

        // Check if all records are already approved
        $allApproved = $records->every(function ($record) {
            return $record->status === 'Approved' && $record->verification_status === 'Verified';
        });

        // If all records are approved, notify the user using session()->flash()
        if ($allApproved) {
            session()->flash('unapproved', 'All records are already verified and approved.');
            return;
        }

        // Otherwise, update the status to 'Approved'
        ChasResource::where('resource_name', $this->resource_name)
            ->limit($this->batch_quantity)
            ->update(['status' => 'Approved','verification_status' => 'Verified']);

        session()->flash('approved', 'Records have been verified and approved successfully.');
    }
}
