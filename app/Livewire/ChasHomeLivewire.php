<?php

namespace App\Livewire;

use App\Models\ChasResource;
use Livewire\Component;
use Livewire\WithPagination;

class ChasHomeLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $resourceSearch = '';

    public function render()
    {
        
        return view('livewire.chas-home-livewire', [
            'Resources' => ChasResource::searchDefected($this->resourceSearch)->groupBy('id')->where('asset_status', '=', 'Poor')->orWhere('asset_status', '=', 'Fair')->orWhere('asset_status', '=', 'Good')->paginate(15),
            'UnAllocatedResources' => ChasResource::searchDefected($this->resourceSearch)->groupBy('id')->where('asset_status', '=', 'Poor')->orWhere('asset_status', '=', 'Fair')->orWhere('asset_status', '=', 'Good')->paginate(15),
            'maintanance' => ChasResource::where('asset_status', '=', 'Poor')->orWhere('asset_status', '=', 'Fair')->orWhere('asset_status', '=', 'Good')->count(),
            'unallocated' => ChasResource::where('allocation_status', 'Not Allocated')->count(),
            'office_equipment' => ChasResource::where('category_id', '3')->count(),
            'laboratory' => ChasResource::where('category_id', '4')->count(),
            'camera_studio' => ChasResource::where('category_id', '5')->count(),
            'motor_vehicle' => ChasResource::where('category_id', '6')->count(),
            'land_buildings' => ChasResource::where('category_id', '7')->count(),
            'consumable_items' => ChasResource::where('category_id', '8')->count(),
            'furniture' => ChasResource::where('category_id', '13')->count(),
            'computer_laptops' => ChasResource::where('category_id', '15')->count(),
        ]);
    }


    public function deleteChasCreatedResources($id)
    {

        $chasResource = ChasResource::findOrFail($id) ? ChasResource::findOrFail($id)->delete() : false;

        session()->flash('deleteResource', 'Resource is deleted successfully!');
    }
}
