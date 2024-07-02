<?php

namespace App\Livewire;

use App\Models\CnmsResource;
use Livewire\Component;

class CnmsHomeLivewire extends Component
{
    public function render()
    {
        return view('livewire.cnms-home-livewire', [
            'Resources' => CnmsResource::searchDefected($this->resourceSearch)->groupBy('id')->where('asset_status', '=', 'Poor')->orWhere('asset_status', '=', 'Fair')->orWhere('asset_status', '=', 'Good')->paginate(15),
            'UnAllocatedResources' => CnmsResource::searchDefected($this->resourceSearch)->groupBy('id')->where('asset_status', '=', 'Poor')->orWhere('asset_status', '=', 'Fair')->orWhere('asset_status', '=', 'Good')->paginate(15),
            'maintanance' => CnmsResource::where('asset_status', '=', 'Poor')->orWhere('asset_status', '=', 'Fair')->orWhere('asset_status', '=', 'Good')->count(),
            'unallocated' => CnmsResource::where('allocation_status', 'Not Allocated')->count(),
            'office_equipment' => CnmsResource::where('category_id', '3')->count(),
            'laboratory' => CnmsResource::where('category_id', '4')->count(),
            'camera_studio' => CnmsResource::where('category_id', '5')->count(),
            'motor_vehicle' => CnmsResource::where('category_id', '6')->count(),
            'land_buildings' => CnmsResource::where('category_id', '7')->count(),
            'consumable_items' => CnmsResource::where('category_id', '8')->count(),
            'furniture' => CnmsResource::where('category_id', '13')->count(),
            'computer_laptops' => CnmsResource::where('category_id', '15')->count(),
        ]);
    }

    public function deleteCnmsCreatedResources($id)
    {

        $chasResource = CnmsResource::findOrFail($id) ? CnmsResource::findOrFail($id)->delete() : false;

        session()->flash('deleteResource', 'Resource is deleted successfully!');
    }
}
