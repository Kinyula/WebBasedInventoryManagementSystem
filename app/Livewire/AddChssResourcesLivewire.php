<?php

namespace App\Livewire;

use App\Imports\ChssResourceImport;
use App\Models\Asset;
use App\Models\ChssResource;

use App\Models\Category;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class AddChssResourcesLivewire extends Component
{
    public $category_type, $resource_name, $chssResourceImport, $university_store_resource_name;

    public function render()
    {
        return view('livewire.add-chss-resources-livewire', ['categories' => Category::get() , 'Assets' =>Asset::get()]);
    }

    public function addChssResources()
    {

        $this->validate([

            'category_type' => 'required',

            'resource_name' => 'required',

            'university_store_resource_name' => 'required',

        ]);

        $chssResource = new ChssResource();

        $chssResource->user_id = auth()->user()->id;

        $chssResource->asset_id = $this->university_store_resource_name;

        $chssResource->category_id = $this->category_type;

        $chssResource->resource_name = $this->resource_name;


        $chssResource->college_name = auth()->user()->college_name;

        $chssResource->save();

        $this->reset(['category_type', 'resource_name', 'university_store_resource_name']);

        session()->flash('addResources', 'A resource is added successfully.');
    }

    public function importChssResources()
    {

        $this->validate(['chssResource' => 'required|mimes:xlsx,xls,csv']);

        Excel::import(new ChssResourceImport, $this->chssResourceImport);

        session()->flash('message', 'CHSS resources are imported successfully');
    }
}
