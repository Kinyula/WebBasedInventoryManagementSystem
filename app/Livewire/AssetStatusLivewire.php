<?php

namespace App\Livewire;

use App\Models\Asset;
use App\Models\Status;
use Livewire\Component;

class AssetStatusLivewire extends Component
{
    public $asset;
    public function render()
    {
        return view('livewire.asset-status-livewire', ['assets' => Asset::with(['category'])->get()]);
    }

    public function addStatus()
    {

        $this->validate([
            'asset' => 'required|unique:statuses,asset_id',


        ]);

        $status = new Status();

        $status->user_id = auth()->user()->id;

        $status->asset_id = $this->asset;




        $status->save();

        $this->reset(['asset']);

        session()->flash('addStatuses', 'Status is created successfully.');
    }

}
