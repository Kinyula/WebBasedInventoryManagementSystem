<?php

namespace App\Livewire;

use App\Models\ResourceAllocation;
use Livewire\Component;

class UpdateResourceAllocationStatusLivewire extends Component
{
    public $id, $resource_status;

    public function render()
    {
        return view('livewire.update-resource-allocation-status-livewire');
    }

    public function updateResourceStatus($id)
    {

        $this->validate(['resource_status' => 'required']);
        $update_resource_status = ResourceAllocation::findOrFail($id);


        $update_resource_status->status = $this->resource_status;


        $update_resource_status->update();


        $this->reset(['resource_status']);

        session()->flash('updateResource', 'Resource status is updated successfully.');
    }
}
