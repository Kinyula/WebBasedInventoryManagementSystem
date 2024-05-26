<?php

namespace App\Livewire;

use App\Models\AreaOfAllocation;
use Livewire\Component;
use Livewire\WithPagination;

class ViewResourceAllocationToAreasLivewire extends Component
{

    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $areaSearch = '';

    public function render()
    {

        if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ') {

            return view('livewire.view-resource-allocation-to-areas-livewire', ['Areas' => AreaOfAllocation::search($this->areaSearch)->with('user')->where('college_name', auth()->user()->college_name)->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )') {

            return view('livewire.view-resource-allocation-to-areas-livewire', ['Areas' => AreaOfAllocation::search($this->areaSearch)->with('user')->where('college_name', auth()->user()->college_name)->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Education ( CoED )') {

            return view('livewire.view-resource-allocation-to-areas-livewire', ['Areas' => AreaOfAllocation::search($this->areaSearch)->with('user')->where('college_name', auth()->user()->college_name)->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Earth Sciences and Engineering ( CoESE )') {

            return view('livewire.view-resource-allocation-to-areas-livewire', ['Areas' => AreaOfAllocation::search($this->areaSearch)->with('user')->where('college_name', auth()->user()->college_name)->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )') {

            return view('livewire.view-resource-allocation-to-areas-livewire', ['Areas' => AreaOfAllocation::search($this->areaSearch)->with('user')->where('college_name', auth()->user()->college_name)->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )') {

            return view('livewire.view-resource-allocation-to-areas-livewire', ['Areas' => AreaOfAllocation::search($this->areaSearch)->with('user')->where('college_name', auth()->user()->college_name)->paginate(15)]);

        }

    }


    public function deleteAreaOfAllocation($id) {

        $deleteArea = AreaOfAllocation::findOrFail($id) ? AreaOfAllocation::findOrFail($id)->delete() : false;

        session()->flash('success_delete', 'Area of Allocation has been deleted successfully');

    }

}
