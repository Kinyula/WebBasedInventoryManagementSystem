<?php

namespace App\Livewire;

use App\Imports\CoBEResourceImport;
use App\Models\Asset;
use App\Models\Category;
use App\Models\CoBEResource;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class AddCoBEResourcesLivewire extends Component
{

    public $category_type, $resource_name, $cobeResourceImport, $university_store_resource_name;

    public function render()
    {
        return view('livewire.add-co-b-e-resources-livewire', ['categories' => Category::get(), 'Assets' =>Asset::get()]);
    }

    public function addCobeResources()
    {

        $this->validate([

            'category_type' => 'required',

            'resource_name' => 'required',

            'university_store_resource_name' => 'required',

        ]);

        $cobeResource = new CoBEResource();

        $cobeResource->user_id = auth()->user()->id;

        $cobeResource->category_id = $this->category_type;

        $cobeResource->asset_id = $this->university_store_resource_name;

        $cobeResource->resource_name = $this->resource_name;

        $cobeResource->college_name = auth()->user()->college_name;

        $cobeResource->save();

        $this->reset(['category_type', 'resource_name', 'university_store_resource_name']);

        session()->flash('addResources', 'A resource is added successfully.');
    }

    public function importCobeResources()
    {

        $this->validate(['cobeResourceImport' => 'required|mimes:xlsx,xls,csv']);

        Excel::import(new CoBEResourceImport, $this->cobeResourceImport);

        session()->flash('message', 'CoBE resources are imported successfully');
    }
}
