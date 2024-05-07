<?php

namespace App\Livewire;

use App\Models\CoeseReport;
use App\Models\CoESEResource;
use Livewire\Component;
use Livewire\WithFileUploads;
class CoeseReportLivewire extends Component
{

    use WithFileUploads;

    public $resource_name, $resource_image, $description;

    public $search = '';

    public function render()
    {
        if (empty($this->search)) {
            return view('livewire.coese-report-livewire', ['coeseResources' => []]);
        } else {
            return view('livewire.coese-report-livewire', ['coeseResources' => CoESEResource::searchResource($this->search)->with(['category', 'user'])->get()]);
        }


    }


    public function addCoeseReport()
    {

        $this->validate([

            'description' => 'required',

            'resource_name' => 'required',

            'resource_image' => 'required',


        ]);

        $coeseReport = new CoeseReport();

        $coeseReport->user_id = auth()->user()->id;

        $coeseReport->college_name = auth()->user()->college_name;

        $coeseReport->description = $this->description;

        if (!is_null($this->resource_image)) {

            $resource_image = $this->resource_image->store('public/resource_images');

            $resource_image = explode('/', $resource_image);

            $resource_image = $resource_image[2];


            $coeseReport->resource_image = $resource_image;
        }

        else {
            session()->flash('errorMessage', 'Ooops! Resource image can not be empty!');
        }

        $coeseReport->co_e_s_e_resource_id = $this->resource_name;



        $coeseReport->save();

        $this->reset(['description', 'resource_name', 'resource_image']);

        session()->flash('addResources', 'A report is submitted successfully!');
    }
}
