<?php

namespace App\Livewire;

use App\Imports\CoESEResourceImport;
use App\Models\Asset;
use App\Models\Category;
use App\Models\CoESEResource;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;


class AddCoESEResourcesLivewire extends Component
{


    public $coeseResourceImport, $university_store_resource_name,
    $category_type, $resource_name, $import_quantity;

    public function render()
    {
        return view('livewire.add-co-e-s-e-resources-livewire', ['categories' => Category::get() , 'Assets' =>Asset::get()]);
    }

    public function addCoeseResources()
    {

        $this->validate([

            'category_type' => 'required',

            'resource_name' => 'required',

            'university_store_resource_name' => 'required',

            'import_quantity' => 'required'

        ]);

        for ($i=0; $i <$this->import_quantity ; $i++) {

            $coeseResource = new CoESEResource();

            $coeseResource->user_id = auth()->user()->id;

            $coeseResource->category_id = $this->category_type;

            $coeseResource->asset_id = $this->university_store_resource_name;

            $coeseResource->resource_name = $this->resource_name;

            $coeseResource->college_name = auth()->user()->college_name;

            $coeseResource->save();
        }


        $this->reset(['category_type', 'resource_name','university_store_resource_name', 'import_quantity']);

        session()->flash('addResources', 'A resource is added successfully.');
    }

    // public function importCoeseResources()
    // {

    //     $this->validate(['coeseResourceImport' => 'required|mimes:xlsx,xls,csv']);

    //     Excel::import(new CoESEResourceImport, $this->coeseResourceImport);

    //     session()->flash('message', 'CoESE resources are imported successfully');
    // }
}
