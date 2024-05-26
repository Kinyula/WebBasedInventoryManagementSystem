<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Asset;

class EditAssetLivewire extends Component
{
    public $category_type, $asset_type, $id, $assetStatus;

    public function render()
    {
        return view('livewire.edit-asset-livewire', ['categories' => Category::get(),

        'Asset' => Asset::with(['category'])->findOrFail($this->id)

    ]);
    }

    public function editAssets($id){

        $this->validate(['category_type' => 'required', 'asset_type' => 'required', 'assetStatus' => 'required']);

        $edit_asset = Asset::findOrFail($id);

        $edit_asset->asset_type = $this->asset_type;

        $edit_asset->category_id = $this->category_type;

        $edit_asset->asset_status = $this->assetStatus;

        $edit_asset->update();


        $this->reset([ 'asset_type', 'category_type', 'assetStatus']);

        session()->flash('editAssets', 'Asset updated successfully.');
    }
}
