<?php

namespace App\Livewire;

use App\Imports\ChasResourceImport;
use App\Models\Asset;
use App\Models\ChasResource;
use App\Models\Category;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class AddChasResourcesLivewire extends Component
{
    use WithFileUploads;

    public $resource_name, $category_type, $chasResourceImport,
      $import_quantity, $resource_cost, $region, $department;

    public function render()
    {

        return view('livewire.add-chas-resources-livewire', ['categories' => Category::get(), 'Assets' =>Asset::get()]);

    }


    public function importChasResources()
    {
        $this->validate([
            'chasResourceImport' => 'required|mimes:xlsx,xls,csv',
        ]);

        $filePath = $this->chasResourceImport->store('public/resource_files');

        if (!$filePath) {
            session()->flash('error', 'File could not be stored.');
            return;
        }

        try {
            Excel::queueImport(new ChasResourceImport, $filePath);

            $this->reset(['chasResourceImport']);

            session()->flash('message', 'Import completed...');
        } catch (\Exception $e) {
            Log::error('Import Error: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while importing. Please try again.');
        }
    }

    public function addChasResources()
    {

        $this->validate([

            'category_type' => 'required',

            'resource_name' => 'required',


            'import_quantity' => 'required',

            'resource_cost' => 'required',

            'region' => 'required',

        ]);

        for ($i=0; $i < $this->import_quantity; $i++) {

            $chasResource = new ChasResource();

            $chasResource->user_id = auth()->user()->id;

            $chasResource->category_id = $this->category_type;


            $chasResource->resource_name = $this->resource_name;

            $chasResource->college_name = auth()->user()->college_name;

            $chasResource->department = auth()->user()->department;

            $chasResource->resource_cost = $this->resource_cost;

            $chasResource->save();

        }


        $this->reset(['category_type','import_quantity', 'resource_name','resource_cost', 'region']);

        session()->flash('addResources', 'A resource is added successfully.');
    }


}
