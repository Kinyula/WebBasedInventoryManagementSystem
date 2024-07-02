<?php

namespace App\Livewire;

use App\Models\ChasResource;
use Livewire\Component;

class EditChasResourceStatusLivewire extends Component
{
    public $resourceStatus, $allocationStatus, $approvalStatus, $id, $resource_cost, $repair_status;

    public function render()
    {
        return view('livewire.edit-chas-resource-status-livewire', [

            'Status' => ChasResource::findOrFail($this->id)
        ]);
    }

    public function editResourceStatus($id)
    {

        if (auth()->user()->post === 'accountant') {
            $this->validate([

                'resourceStatus' => 'required|string',
                'approvalStatus' => 'required|string',
                'allocationStatus' => 'required|string',
                'resource_cost' => 'required',
                'repair_status' => 'required'

            ]);
        } else {
            $this->validate([

                'resourceStatus' => 'required|string',
                'allocationStatus' => 'required|string',
                'resource_cost' => 'required',
                'repair_status' => 'required'
            ]);
        }



        $chasResource = ChasResource::findOrFail($id);

        if (auth()->user()->post === 'accountant') {
            $chasResource->status = $this->approvalStatus;
            $chasResource->asset_status = $this->resourceStatus;
            $chasResource->allocation_status = $this->allocationStatus;
            $chasResource->resource_cost = $this->resource_cost;
        } else {

            $chasResource->asset_status = $this->resourceStatus;
            $chasResource->allocation_status = $this->allocationStatus;
            $chasResource->resource_cost = $this->resource_cost;
        }

        $chasResource->update();

        $this->reset(['resourceStatus', 'approvalStatus', 'allocationStatus', 'resource_cost']);

        session()->flash('resourceStatusMessage', 'CHAS resource status is updated successfully.');
    }
}
