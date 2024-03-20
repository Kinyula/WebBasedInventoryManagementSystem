<?php

namespace App\Livewire;

use App\Models\ChasReport;
use App\Models\ChasResource;
use Livewire\WithFileUploads;
use Livewire\Component;

class ChasReportLivewire extends Component
{

    use WithFileUploads;

    public $chasReportSearch = '';

    public $resource_name, $resource_image, $description;

    public function render()
    {
        return view('livewire.chas-report-livewire', ['chasResources' => ChasResource::with(['category', 'user'])->get()]);
    }

    public function addChasReport()
    {

        $this->validate([

            'description' => 'required',

            'resource_name' => 'required',

            'resource_image' => 'required',


        ]);

        $chasReport = new ChasReport();

        $chasReport->user_id = auth()->user()->id;

        $chasReport->college_name = auth()->user()->college_name;

        $chasReport->description = $this->description;

        if (!is_null($this->resource_image)) {
            $resource_image = $this->resource_image->store('public/resource_images');

            $resource_image = explode('/', $resource_image);
            $resource_image = $resource_image[2];


            $chasReport->resource_image = $resource_image;
        } else {
            session()->flash('errorMessage', 'Ooops! Resource image can not be empty!');
        }

        $chasReport->chas_resource_id = $this->resource_name;



        $chasReport->save();

        $this->reset(['description', 'resource_name', 'resource_image']);

        session()->flash('addResources', 'A report is submitted successfully!');
    }
}
