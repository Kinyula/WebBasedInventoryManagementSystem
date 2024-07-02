<?php

namespace App\Livewire;

use App\Imports\ChasResourceImport;
use App\Models\Asset;
use App\Models\ChasResource;
use App\Models\Category;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;

class AddChasResourcesLivewire extends Component
{
    use WithFileUploads;

    public $resource_name, $category_type, $chasResourceImport,
      $import_quantity;

    public function render()
    {
        return view('livewire.add-chas-resources-livewire', ['categories' => Category::get(), 'Assets' =>Asset::get()]);
    }


    public function importChasResources()
    {
        $this->validate(['chasResourceImport' => 'required|mimes:xlsx,xls,csv']);

        $filePath = $this->chasResourceImport->store('public/resource_files');

        // dispatch(new AssistantImportProcess($filePath))->delay(now()->addSeconds(5));

        // if (File::exists($filePath)) {
        //     File::delete()
        // }

        Excel::queueImport(new ChasResourceImport, $filePath);


        $this->reset(['chasResourceImport']);

        session()->flash('message', 'Done...');

    }

    public function addChasResources()
    {

        $this->validate([

            'category_type' => 'required',

            'resource_name' => 'required',


            'import_quantity' => 'required'

        ]);

        for ($i=0; $i < $this->import_quantity; $i++) {

            $chasResource = new ChasResource();

            $chasResource->user_id = auth()->user()->id;

            $chasResource->category_id = $this->category_type;


            $chasResource->resource_name = $this->resource_name;

            $chasResource->college_name = auth()->user()->college_name;

            $chasResource->save();

        }


        $this->reset(['category_type','import_quantity', 'resource_name']);

        session()->flash('addResources', 'A resource is added successfully.');
    }


}
