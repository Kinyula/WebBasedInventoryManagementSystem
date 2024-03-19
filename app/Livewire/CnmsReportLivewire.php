<?php

namespace App\Livewire;

use App\Models\Asset;
use App\Models\Category;
use App\Models\CnmsReport;
use App\Models\CnmsResource;
use Livewire\Component;
use Livewire\WithFileUploads;

class CnmsReportLivewire extends Component
{
    use WithFileUploads;

    public $resource_name, $resource_image, $description;
    public function render()
    {
        return view('livewire.cnms-report-livewire', ['cnmsResources' => CnmsResource::with(['category', 'user'])->get()]);
    }

    public function addCnmsReport()
    {

        $this->validate([

            'description' => 'required',

            'resource_name' => 'required',

            'resource_image' => 'required',


        ]);

        $cnmsReport = new CnmsReport();

        $cnmsReport->user_id = auth()->user()->id;

        $cnmsReport->college_name = auth()->user()->college_name;

        $cnmsReport->description = $this->description;

        if (!is_null($this->resource_image)) {
            $resource_image = $this->resource_image->store('public/resource_images');

            $resource_image = explode('/', $resource_image);
            $resource_image = $resource_image[2];


            $cnmsReport->resource_image = $resource_image;
        } else {
            session()->flash('errorMessage', 'Ooops! Resource image can not be empty!');
        }

        $cnmsReport->cnms_resource_id = $this->resource_name;



        $cnmsReport->save();

        $this->reset(['description', 'resource_name', 'resource_image']);

        session()->flash('addResources', 'A report is submitted successfully!');
    }
}
