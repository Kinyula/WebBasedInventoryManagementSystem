<?php

namespace App\Livewire;

use App\Models\CobeReport;
use App\Models\CoBEResource;
use Livewire\WithFileUploads;

use Livewire\Component;

class CobeReportLivewire extends Component
{
    use WithFileUploads;

    public $resource_name, $resource_image, $description;

    public $search = '';

    public function render()
    {

        if ($this->search) {
            return view('livewire.cobe-report-livewire', ['cobeResources' => []]);
        } else {
            return view('livewire.cobe-report-livewire', ['cobeResources' => CoBEResource::searchResource($this->search)->with(['category', 'user'])->get()]);
        }



    }

    public function addCobeReport()
    {

        $this->validate([

            'description' => 'required',

            'resource_name' => 'required',

            'resource_image' => 'required',


        ]);

        $cobeReport = new CobeReport();

        $cobeReport->user_id = auth()->user()->id;

        $cobeReport->college_name = auth()->user()->college_name;

        $cobeReport->description = $this->description;

        if (!is_null($this->resource_image)) {

            $resource_image = $this->resource_image->store('public/resource_images');

            $resource_image = explode('/', $resource_image);

            $resource_image = $resource_image[2];


            $cobeReport->resource_image = $resource_image;
        }

        else {
            session()->flash('errorMessage', 'Ooops! Resource image can not be empty!');
        }

        $cobeReport->co_b_e_resource_id = $this->resource_name;



        $cobeReport->save();

        $this->reset(['description', 'resource_name', 'resource_image']);

        session()->flash('addResources', 'A report is submitted successfully!');
    }
}
