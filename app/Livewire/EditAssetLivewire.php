<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Asset;
use App\Models\Supplier;

class EditAssetLivewire extends Component
{
    public $category_type, $asset_type, $id, $assetStatus, $cost, $searchSupplier = '', $supplier, $quantity;

    public function render()
    {
        return view('livewire.edit-asset-livewire', ['categories' => Category::get(),

        'Asset' => Asset::with(['category'])->findOrFail($this->id),

        'Suppliers' => Supplier::search($this->searchSupplier)->get()

    ]);

    }

    public function editAssets($id){

        $this->validate(['category_type' => 'required', 'asset_type' => 'required', 'assetStatus' => 'required', 'cost' => 'required', 'supplier' => 'required']);

        $edit_asset = Asset::findOrFail($id);

        $edit_asset->asset_type = $this->asset_type;

        $edit_asset->category_id = $this->category_type;

        $edit_asset->asset_status = $this->assetStatus;

        $edit_asset->asset_cost = $this->cost;

        $edit_asset->quantity = $this->quantity;


        $edit_asset->update();


        $this->reset([ 'asset_type', 'category_type', 'assetStatus','cost', 'quantity']);

        session()->flash('editAssets', 'Asset updated successfully.');
    }
}
