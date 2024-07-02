<?php

namespace App\Livewire;

use App\Models\AreaOfAllocation;
use App\Models\AssetMovementWithinCollege;
use Livewire\Component;

class AssetMovementLivewire extends Component
{

    public $resource_name, $department, $quantity, $area_of_allocation, $specific_area;

    public function render()
    {
        return view('livewire.asset-movement-livewire',[
            'Assets' => AreaOfAllocation::get(),
            'Areas' => AssetMovementWithinCollege::where('user_id', auth()->user()->id)->where('college_name', auth()->user()->college_name)->paginate(15),
        ]);

    }

    public function moveResourceToAreas()
    {

        $this->validate(['resource_name' => 'required', 'quantity' => 'required', 'area_of_allocation' => 'required', 'specific_area' => 'required']);

        $allocate = new AssetMovementWithinCollege();

        $allocate->user_id = auth()->user()->id;

        $allocate->area_of_allocation_id = $this->resource_name;

        $allocate->department = $this->department;

        $allocate->college_name = auth()->user()->college_name;

        $allocate->quantity = $this->quantity;

        $allocate->area_of_allocation = $this->area_of_allocation;

        $allocate->specific_area_of_allocations= $this->specific_area;

        $allocate->save();

        $this->decrementAssetsQuantity();

        session()->flash('success', 'Successfully moved');

        $this->reset(['quantity', 'resource_name', 'area_of_allocation', 'department', 'specific_area']);
    }
}
