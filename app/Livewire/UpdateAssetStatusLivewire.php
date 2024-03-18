<?php

namespace App\Livewire;

use App\Models\Status;
use Livewire\Component;

class UpdateAssetStatusLivewire extends Component
{
    public $id, $asset_status;

    public function render()
    {
        return view('livewire.update-asset-status-livewire');
    }


    public function updateAssetStatus($id)
    {

        $this->validate(['asset_status' => 'required']);
        $update_asset_status = Status::findOrFail($id);


        $update_asset_status->status = $this->asset_status;


        $update_asset_status->update();


        $this->reset(['asset_status']);

        session()->flash('updateStatus', 'Asset status is updated successfully.');
    }
}
