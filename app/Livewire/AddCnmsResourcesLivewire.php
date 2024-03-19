<?php

namespace App\Livewire;

use App\Imports\CnmsResourceImport;
use App\Models\Asset;
use Livewire\Component;
use App\Models\Category;
use App\Models\CnmsResource;
use Maatwebsite\Excel\Facades\Excel;

class AddCnmsResourcesLivewire extends Component
{
    public $category_type, $resource_name, $cnmsResourceImport, $university_store_resource_name;
    public function render()
    {
        return view('livewire.add-cnms-resources-livewire', ['categories' => Category::get() , 'Assets' =>Asset::get()]);
    }

    public function addCnmsResources()
    {

        $this->validate([

            'category_type' => 'required',

            'resource_name' => 'required',

            'university_store_resource_name' => 'required',
        ]);

        $cnmsResource = new CnmsResource();

        $cnmsResource->user_id = auth()->user()->id;

        $cnmsResource->category_id = $this->category_type;

        $cnmsResource->asset_id = $this->university_store_resource_name;

        $cnmsResource->resource_name = $this->resource_name;

        $cnmsResource->college_name = auth()->user()->college_name;

        $cnmsResource->save();

        $this->reset(['category_type', 'resource_name', 'university_store_resource_name']);

        session()->flash('addResources', 'A resource is added successfully.');
    }

    public function importCnmsResources()
    {



        $this->validate(['civeResource' => 'required|mimes:xlsx,xls,csv']);

        Excel::import(new CnmsResourceImport, $this->cnmsResourceImport);

        session()->flash('message', 'CNMS resources are imported successfully');
    }
}
