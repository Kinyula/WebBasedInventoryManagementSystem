<?php

namespace App\Livewire;

use App\Imports\CoEDResourceImport;
use App\Models\Asset;
use App\Models\Category;
use App\Models\CoEDResource;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
class AddCoEDResourcesLivewire extends Component
{
    public $coedResourceImport, $university_store_resource_name,
    $category_type, $resource_name,$import_quantity;

    public function render()
    {
        return view('livewire.add-co-e-d-resources-livewire', ['categories' => Category::get() , 'Assets' =>Asset::get()]);
    }

    public function addCoedResources()
    {

        $this->validate([

            'category_type' => 'required',

            'resource_name' => 'required',

            'university_store_resource_name' => 'required',

            'import_quantity' => 'required'

        ]);

        for ($i=0; $i <$this->import_quantity ; $i++) {

            $coedResource = new CoEDResource();

            $coedResource->user_id = auth()->user()->id;

            $coedResource->category_id = $this->category_type;

            $coedResource->asset_id = $this->university_store_resource_name;

            $coedResource->resource_name = $this->resource_name;

            $coedResource->college_name = auth()->user()->college_name;

            $coedResource->save();
        }


        $this->reset(['category_type', 'resource_name','university_store_resource_name', 'import_quantity']);

        session()->flash('addResources', 'A resource is added successfully.');
    }

    public function importCoedResources()
    {

        $this->validate(['cobeResourceImport' => 'required|mimes:xlsx,xls,csv']);

        Excel::import(new CoEDResourceImport, $this->coedResourceImport);

        session()->flash('message', 'CoED resources are imported successfully');
    }
}
