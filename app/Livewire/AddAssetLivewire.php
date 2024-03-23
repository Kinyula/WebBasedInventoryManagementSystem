<?php

namespace App\Livewire;

use App\Models\Asset;
use Livewire\Component;
use App\Models\Category;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class AddAssetLivewire extends Component
{
    public $category_type, $asset_type;

    public function render()
    {
        return view('livewire.add-asset-livewire', ['categories' => Category::get()]);
    }

    public function addItemAsset()
    {

        $this->validate([

            'category_type' => 'required',

            'asset_type' => 'required|unique:asset,asset_type',

        ]);

        $category = new Asset();

        $category->category_id = $this->category_type;

        $category->asset_type = $this->asset_type;

        $category->save();

        $this->reset(['category_type', 'asset_type']);

        session()->flash('addItems', 'An item is added successfully.');
    }
}
