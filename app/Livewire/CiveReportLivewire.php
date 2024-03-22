<?php

namespace App\Livewire;

use App\Models\CiveResource;
use App\Models\Report;
use Livewire\Component;
use Livewire\WithFileUploads;

class CiveReportLivewire extends Component
{
    use WithFileUploads;

    public $resource_name, $resource_image, $description;

    public function render()
    {
        return view('livewire.cive-report-livewire', ['civeResources' => CiveResource::with(['category', 'user'])->get()]);
    }


    public function addCiveReport()
    {

        $this->validate([

            'description' => 'required',

            'resource_name' => 'required',

            'resource_image' => 'required',


        ]);

        $civeReport = new Report();

        $civeReport->user_id = auth()->user()->id;

        $civeReport->college_name = auth()->user()->college_name;

        $civeReport->description = $this->description;

        if (!is_null($this->resource_image)) {

            $resource_image = $this->resource_image->store('public/resource_images');

            $resource_image = explode('/', $resource_image);

            $resource_image = $resource_image[2];


            $civeReport->resource_image = $resource_image;
        }

        else {
            session()->flash('errorMessage', 'Ooops! Resource image can not be empty!');
        }

        $civeReport->cive_resource_id = $this->resource_name;



        $civeReport->save();

        $this->reset(['description', 'resource_name', 'resource_image']);

        session()->flash('addResources', 'A report is submitted successfully!');
    }
}
