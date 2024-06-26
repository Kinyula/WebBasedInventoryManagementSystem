<?php

namespace App\Livewire;

use App\Imports\CiveResourceImport;
use App\Models\Asset;
use App\Models\Category;
use App\Models\CiveResource;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class AddCiveResourcesLivewire extends Component
{
    public $category_type, $resource_name, $college_name,
    $university_store_resource_name, $civeResourceImport, $civeResource, $import_quantity;

    public $searchUniversityResourceName = '';

    public function render()
    {
        return view('livewire.add-cive-resources-livewire', ['categories' => Category::get(), 'Assets' =>Asset::search($this->searchUniversityResourceName)->get()]);
    }

    public function addCiveResources()
    {


        $this->validate([

            'category_type' => 'required',

            'resource_name' => 'required',

            'university_store_resource_name' => 'required',
            'import_quantity' => 'required'
        ]);

        for ($i=0; $i <$this->import_quantity ; $i++) {

            $civeResource = new CiveResource();

            $civeResource->user_id = auth()->user()->id;

            $civeResource->category_id = $this->category_type;

            $civeResource->asset_id = $this->university_store_resource_name;

            $civeResource->resource_name = $this->resource_name;


            $civeResource->college_name = auth()->user()->college_name;

            $civeResource->save();

        }


        $this->reset(['category_type', 'resource_name', 'college_name', 'university_store_resource_name']);

        session()->flash('addResources', 'Resources added successfully.');
    }

    public function importCiveResources()
    {



        $this->validate(['civeResource' => 'required|mimes:xlsx,xls,csv']);

        Excel::import(new CiveResourceImport, $this->civeResourceImport);

        session()->flash('message', 'Cive resources are imported successfully');
    }
}
