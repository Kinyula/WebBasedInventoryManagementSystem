<?php

namespace App\Livewire;

use App\Models\CoedReport;
use App\Models\CoEDResource;
use Livewire\Component;
use Livewire\WithFileUploads;

class CoedReportLivewire extends Component
{

    use WithFileUploads;

    public $resource_name, $resource_image, $description;

    public $search = '';

    public function render()
    {
        if ($this->search) {
            return view('livewire.coed-report-livewire', ['coedResources' => []]);
        } else {
            return view('livewire.coed-report-livewire', ['coedResources' => CoEDResource::searchResource($this->search)->with(['category', 'user'])->get()]);
        }


    }


    public function addCoedReport()
    {

        $this->validate([

            'description' => 'required',

            'resource_name' => 'required',

            'resource_image' => 'required',


        ]);

        $coedReport = new CoedReport();

        $coedReport->user_id = auth()->user()->id;

        $coedReport->college_name = auth()->user()->college_name;

        $coedReport->description = $this->description;

        if (!is_null($this->resource_image)) {

            $resource_image = $this->resource_image->store('public/resource_images');

            $resource_image = explode('/', $resource_image);

            $resource_image = $resource_image[2];


            $coedReport->resource_image = $resource_image;
        }

        else {
            session()->flash('errorMessage', 'Ooops! Resource image can not be empty!');
        }

        $coedReport->co_e_d_resource_id = $this->resource_name;



        $coedReport->save();

        $this->reset(['description', 'resource_name', 'resource_image']);

        session()->flash('addResources', 'A report is submitted successfully!');
    }
}
