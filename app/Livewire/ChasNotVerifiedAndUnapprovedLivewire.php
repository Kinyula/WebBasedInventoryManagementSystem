<?php

namespace App\Livewire;

use App\Models\ChasResource;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ChasNotVerifiedAndUnapprovedLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $chasResourceSearch = '';
    public $resourceId = [];
    public $allChecked = false;


    public function markAll()
    {
        if ($this->allChecked) {
            // Mark all checkboxes
            $this->resourceId = ChasResource::searchUnApproved($this->chasResourceSearch)
                ->where('status', '=', 'In progress')
                ->where('verification_status', '=', 'Not verified')
                ->pluck('id')
                ->toArray();
        } else {
            // Unmark all checkboxes
            $this->resourceId = [];
        }
    }

    public function verifySelected()
    {
        if (empty($this->resourceId)) {
            session()->flash('error', 'No items selected for the approval after verification.');
            return;
        }

        DB::transaction(function () {
            ChasResource::whereIn('id', $this->resourceId)
                ->update([
                    'verification_status' => 'Verified',
                    'status' => 'Approved'
                ]);
        });

        session()->flash('done', 'Approved successfully.');
        // Reset selection and checkbox state
        $this->resourceId = [];
        $this->allChecked = false;


    }

    public function render()
    {
        return view('livewire.chas-not-verified-and-unapproved-livewire', [
            'NotVerifiedApproval' => ChasResource::searchUnApproved($this->chasResourceSearch)
                ->with(['category'])
                ->where('status', '=', 'In progress')
                ->where('verification_status', '=', 'Not verified')
                ->paginate(15),
        ]);
    }
}
