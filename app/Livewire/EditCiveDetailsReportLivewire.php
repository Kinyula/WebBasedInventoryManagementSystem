<?php

namespace App\Livewire;

use App\Models\CiveResource;
use Livewire\Component;

class EditCiveDetailsReportLivewire extends Component
{

    public $region, $department, $floor, $id, $resource_cost, $building, $resource_status;

    public function render()
    {
        return view('livewire.edit-cive-details-report-livewire',
        [
            'Status' => CiveResource::findOrFail($this->id)
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



        $civeResource = CiveResource::findOrFail($id);

            $civeResource->region = $this->region;
            $civeResource->department = $this->department;
            $civeResource->specific_area = $this->floor;
            $civeResource->resource_cost = $this->resource_cost;
            $civeResource->building = $this->building;
            $civeResource->asset_status = $this->resource_status;


        $civeResource->update();

        $this->reset(['region', 'department', 'floor', 'resource_cost', 'building','resource_status']);

        session()->flash('detailStatusMessage', 'CHAS resource details is updated successfully.');
    }
}
