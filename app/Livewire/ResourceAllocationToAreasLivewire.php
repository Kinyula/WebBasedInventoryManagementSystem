<?php

namespace App\Livewire;

use App\Models\AreaOfAllocation;
use Livewire\Component;


class ResourceAllocationToAreasLivewire extends Component
{

    public $resource_name, $quantity, $area_of_allocation;

    public function render()
    {
        return view('livewire.resource-allocation-to-areas-livewire');
    }


    public function allocateResourceToAreas(){

        $this->validate(['resource_name' => 'required', 'quantity' => 'required', 'area_of_allocation' => 'required']);

        $allocate = new AreaOfAllocation();

        $allocate->user_id = auth()->user()->id;

        $allocate->college_name = auth()->user()->college_name;

        $allocate->quantity = $this->quantity;

        $allocate->area_of_allocation = $this->area_of_allocation;

        $allocate->resource = $this->resource_name;

        $allocate->save();

        session()->flash('success','Successfully allocated');

        $this->reset(['quantity', 'resource_name', 'area_of_allocation']);
        


    }
}
