<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\ResourceAllocation;
use App\Models\Asset;
use App\Models\ResourceAllocationToCollege;
use Livewire\WithFileUploads;

class CollegeResourceAllocationLivewire extends Component
{

    use WithFileUploads;

    public $asset, $asset_quantity, $resource_allocated_college, $status, $resource_file;
    public $searchAsset = '';

    public function render()
    {
        return view('livewire.college-resource-allocation-livewire', ['Assets' => Asset::search($this->searchAsset)->get()]);
    }

    public function allocateResource()
    {

        $this->validate([

            'asset' => 'required',

            'asset_quantity' => 'required|numeric',

            'resource_allocated_college' => 'required',

            'status' => 'required',



        ]);

        $resource = new ResourceAllocationToCollege();

        $resource->user_id = auth()->user()->id;

        $resource->asset_id = $this->asset;

        $resource->asset_quantity = $this->asset_quantity;

        $resource->resource_allocated_college = $this->resource_allocated_college;

        $resource->status = $this->status;

        $resource->save();

        $this->reset(['asset', 'asset_quantity', 'resource_allocated_college', 'status']);

        session()->flash('allocateResourceMessage', 'Resource is allocated successfully.');
    }
}
