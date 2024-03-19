<?php

namespace App\Livewire;

use App\Models\ChssReport;
use App\Models\ChssResource;
use Livewire\WithFileUploads;

use Livewire\Component;

class ChssReportLivewire extends Component
{
    use WithFileUploads;

    public $resource_name, $resource_image, $description;

    public function render()
    {
        return view('livewire.chss-report-livewire', ['chssResources' => ChssResource::with(['category', 'user'])->get()]);
    }

    public function addChssReport()
    {

        $this->validate([

            'description' => 'required',

            'resource_name' => 'required',

            'resource_image' => 'required',


        ]);

        $chssReport = new ChssReport();

        $chssReport->user_id = auth()->user()->id;

        $chssReport->college_name = auth()->user()->college_name;

        $chssReport->description = $this->description;

        if (!is_null($this->resource_image)) {
            $resource_image = $this->resource_image->store('public/resource_images');

            $resource_image = explode('/', $resource_image);
            $resource_image = $resource_image[2];


            $chssReport->resource_image = $resource_image;
        } else {
            session()->flash('errorMessage', 'Ooops! Resource image can not be empty!');
        }

        $chssReport->chss_resource_id = $this->resource_name;



        $chssReport->save();

        $this->reset(['description', 'resource_name', 'resource_image']);

        session()->flash('addResources', 'A report is submitted successfully!');
    }
}
