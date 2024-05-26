<?php

namespace App\Livewire;

use App\Models\AreaOfAllocation;
use Livewire\Component;

class UpdateAreaOfAllocationLivewire extends Component
{
    public $id, $resource_name, $quantity, $area_of_allocation;

    public function render()
    {
        return view('livewire.update-area-of-allocation-livewire', ['area' => AreaOfAllocation::with(['user'])->findOrFail($this->id)]);
    }

    public function updateArea($id){

        $this->validate(['resource_name' => 'required', 'quantity' => 'required', 'area_of_allocation' => 'required']);

        $area = AreaOfAllocation::findOrFail($id);
        $area->resource = $this->resource_name;
        $area->quantity = $this->quantity;
        $area->area_of_allocation = $this->area_of_allocation;

        $area->update();

        $this->reset(['resource_name', 'quantity', 'area_of_allocation']);

        session()->flash('success', 'Successfully updated');
    }
}
