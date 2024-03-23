<?php

namespace App\Livewire;

use App\Imports\ChasResourceImport;
use App\Models\Asset;
use App\Models\ChasResource;
use App\Models\Category;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class AddChasResourcesLivewire extends Component
{
    public $resource_name, $category_type, $chasResourceImport, $university_store_resource_name;

    public function render()
    {
        return view('livewire.add-chas-resources-livewire', ['categories' => Category::get(), 'Assets' =>Asset::get()]);
    }

    public function addChasResources()
    {

        $this->validate([

            'category_type' => 'required',

            'resource_name' => 'required|unique:chas_resources,resource_name',

            'university_store_resource_name' =>'required|unique:chas_resources,asset_id'

        ]);

        $chasResource = new ChasResource();

        $chasResource->user_id = auth()->user()->id;

        $chasResource->category_id = $this->category_type;

        $chasResource->asset_id = $this->university_store_resource_name;

        $chasResource->resource_name = $this->resource_name;

        $chasResource->college_name = auth()->user()->college_name;

        $chasResource->save();

        $this->reset(['category_type', 'resource_name', 'university_store_resource_name']);

        session()->flash('addResources', 'A resource is added successfully.');
    }

    public function importChasResources()
    {

        $this->validate(['chasResource' => 'required|mimes:xlsx,xls,csv']);

        Excel::import(new ChasResourceImport, $this->chasResourceImport);

        session()->flash('message', 'CHAS resources are imported successfully');
    }
}
