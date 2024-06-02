<?php

namespace App\Livewire;

use App\Models\Asset;
use App\Models\AssetCost;
use Livewire\Component;
use App\Models\Category;
use App\Imports\AssetImport;
use App\Jobs\AssetExportJob;
use App\Models\Supplier;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;


class AddAssetLivewire extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $category_type, $asset_type, $asset_status, $searchAsset = '', $searchSupplier = '', $supplier;

    public $asset, $asset_cost, $resourceImport, $quantity;

    public $resourceId = [];

    public $pdfFiles = [];

    public function render()
    {



        $path = 'storage/asset_cost_files/';

        $files = File::files($path);

        foreach ($files as $file) {
            $this->pdfFiles[] = $file->getPathname();
        }

        return view('livewire.add-asset-livewire', [

            'categories' => Category::get(),

            'Assets' => Asset::search($this->searchAsset)->paginate(15),

            'Suppliers' => Supplier::search($this->searchSupplier)->get()

    ]);

    }

    public function deleteFiles($pdf)
    {


        if (File::exists(storage_path('app/public/asset_cost_files/'.$pdf))) {

            File::delete(storage_path('app/public/asset_cost_files/'.$pdf));

            session()->flash('downloadSuccessMessage', 'The file is downloaded!');
        }

        else {

            session()->flash('downloadErrorMessage', 'ERROR 404 | File not found please remember to refresh the page to view the remaining files!');
        }
    }

    public function deleteFilesManually($file){

        if (File::exists(storage_path('app/public/asset_cost_files/'.$file))) {

            File::delete(storage_path('app/public/asset_cost_files/'.$file));

            session()->flash('deleteErrorMessage', 'The file is deleted!');
        }

        else {
            session()->flash('deleteErrorMessage', ' ERROR 404 | File not found please remember to refresh the page to view the remaining files!');
        }

    }
    public function addItemAsset()
    {

        $this->validate([

            'category_type' => 'required',

            'asset_type' => 'required',

            'asset_status' => 'required',

            'asset_cost' => 'required',

            'supplier' => 'required',

            'quantity' => 'required'


        ]);


        $asset = new Asset();

        $asset->user_id = auth()->user()->id;

        $asset->category_id = $this->category_type;

        $asset->asset_type = $this->asset_type;

        $asset->asset_status = $this->asset_status;

        $asset->asset_cost = $this->asset_cost;

        $asset->supplier_id = $this->supplier;

        $asset->quantity = $this->quantity;

        $asset->save();



        $this->reset(['category_type', 'asset_type', 'asset_status', 'asset_cost', 'supplier']);

        session()->flash('addItems', 'An item is added successfully.');
    }

    // public function addItemAssetCost(){

    //     $this->validate([

    //         'asset' => 'required',

    //         'asset_cost' => 'required|unique:asset_costs,cost',

    //     ]);

    //     $cost = new AssetCost();

    //     $cost->asset_id = $this->asset;
    //     $cost->cost = $this->asset_cost;

    //     $cost->save();

    //     $this->reset(['asset', 'asset_cost']);

    //     session()->flash('addCost', "An asset's cost  is created successfully.");

    // }


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

    public function exportAssetPdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            Asset::search($this->searchAsset)->with(['supplier'])->chunk($chunkSize, function ($data) {

                AssetExportJob::dispatch($data)->delay(now()->addSeconds(2));

            });

            session()->flash('exportAsset', 'Asset PDF is ready to be exported make sure you refresh the page after this action please...');

        }


        else {

            Asset::search($this->searchAsset)->with(['supplier'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data) {

                AssetExportJob::dispatch($data)->delay(now()->addSeconds(2));

            });

            session()->flash('exportAsset', 'Selected asset PDF is ready to be exported make sure you refresh the page after this action please...');

        }
    }

    public function deleterRecords($id) {

        $record = Asset::findOrFail($id) ? Asset::findOrFail($id)->delete() : false;

        session()->flash('delete_record', 'Record is deleted successfully');

    }
}
