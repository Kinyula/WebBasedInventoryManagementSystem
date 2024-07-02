<?php

namespace App\Livewire;

use App\Models\AreaOfAllocation;
use Livewire\Component;

class EditChasAreaOfAllocationLivewire extends Component
{
    public $id, $department, $area_of_allocation, $specific_area;

    public function render()
    {
        return view('livewire.edit-chas-area-of-allocation-livewire', [

            'Area' => AreaOfAllocation::where('college_name', auth()->user()->college_name)->findOrFail($this->id)
        ]);
    }


    public function editChasAreaOfAllocation(){

        
        $area = AreaOfAllocation::findOrFail($this->id);

        $area->department = $this->department;

        $area->area_of_allocation = $this->area_of_allocation;

        $area->specific_area_of_allocations = $this->specific_area;

        $area->update();


        session()->flash('success', 'Areas of Allocation have been updated successfully');

    }


    public function deleteChasAreaOfAllocation($id){

        $area = AreaOfAllocation::findOrFail($id) ? AreaOfAllocation::findOrFail($id)->delete() : false;

        session()->flash('message', 'Areas of Allocation have been deleted successfully');
    }
}
