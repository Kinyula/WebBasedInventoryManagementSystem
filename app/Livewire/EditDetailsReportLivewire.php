<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ChasResource;

class EditDetailsReportLivewire extends Component
{
    public $region, $department, $floor, $id, $resource_cost, $building, $resource_status;

    public function render()
    {
        return view(
            'livewire.edit-details-report-livewire',
            [
                'Status' => ChasResource::findOrFail($this->id)
            ]
        );
    }

    public function editDetailStatus($id)
    {

        $this->validate([

            'region' => 'required|string',
            'department' => 'required|string',
            'floor' => 'required|string',
            'resource_cost' => 'required',
            'building' => 'required|string',
            'resource_status' => 'required|string',

        ]);

        $chasResource = ChasResource::findOrFail($id);


        $chasResource->region = $this->region;
        $chasResource->department = $this->department;
        $chasResource->specific_area = $this->floor;
        $chasResource->resource_cost = $this->resource_cost;
        $chasResource->building = $this->building;
        $chasResource->asset_status = $this->resource_status;


        $chasResource->update();

        $this->reset(['region', 'department', 'floor', 'resource_cost', 'building', 'resource_status']);

        session()->flash('detailStatusMessage', 'CHAS resource details is updated successfully.');
    }
}
