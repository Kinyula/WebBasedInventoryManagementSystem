<?php

namespace App\Livewire;

use App\Models\Asset;
use App\Models\AssetCost;
use Livewire\Component;
use App\Models\Category;
use App\Imports\AssetImport;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;
use Illuminate\Support\Number;




class AddAssetLivewire extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $category_type, $asset_type, $asset_status, $searchAsset = '';

    public $asset, $asset_cost, $resourceImport;


    public function render()
    {
        return view('livewire.add-asset-livewire', [

            'categories' => Category::get(),

            'Assets' => Asset::search($this->searchAsset)->with(['cost'])->paginate(15)

    ]);

    }

    public function addItemAsset()
    {

        $this->validate([

            'category_type' => 'required',

            'asset_type' => 'required|unique:assets,asset_type',

            'asset_status' => 'required'

        ]);

        $category = new Asset();

        $category->category_id = $this->category_type;

        $category->asset_type = $this->asset_type;

        $category->asset_status = $this->asset_status;

        $category->save();



        $this->reset(['category_type', 'asset_type', 'asset_status']);

        session()->flash('addItems', 'An item is added successfully.');
    }

    public function addItemAssetCost(){

        $this->validate([

            'asset' => 'required',

            'asset_cost' => 'required|unique:asset_costs,cost',

        ]);

        $cost = new AssetCost();

        $cost->asset_id = $this->asset;
        $cost->cost = $this->asset_cost;

        $cost->save();

        $this->reset(['asset', 'asset_cost']);

        session()->flash('addCost', "An asset's cost  is created successfully.");

    }


    public function importAssets()
    {



        $this->validate(['resourceImport' => 'required|mimes:xlsx,xls,csv']);

        // dd($this->assistantInventoryManager);

        $filePath = $this->resourceImport->store('public/assets');


        // dispatch(new AssetImport($filePath))->delay(now()->addSeconds(5));



        // if (File::exists($filePath)) {
        //     File::delete()
        // }

        Excel::queueImport(new AssetImport, $filePath);


        $this->reset(['resourceImport']);

        session()->flash('message', 'Done...');

    }
}
