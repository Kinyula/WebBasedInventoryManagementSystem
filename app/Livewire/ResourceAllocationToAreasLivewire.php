<?php

namespace App\Livewire;

use App\Models\AreaOfAllocation;
use App\Models\ChasResource;
use App\Models\ResourceAllocation;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithPagination;


class ResourceAllocationToAreasLivewire extends Component
{

    use WithPagination;
    public $resource_name, $quantity, $area_of_allocation,$specific_area,  $searchAsset = '', $department;


    public function render()
    {
        return view('livewire.resource-allocation-to-areas-livewire', [
            'Assets' => ChasResource::search($this->searchAsset)->where('allocation_status', 'Transfered')->where('status', '=', 'Approved')->get(),
            'Areas' => AreaOfAllocation::where('user_id', auth()->user()->id)->where('college_name', auth()->user()->college_name)->paginate(15),
            // 'Resources' => ResourceAllocation::where('user_id', auth()->user()->id)->where('college_name', auth()->user()->college_name)->get(),
        ]);
    }


    public function allocateResourceToAreas()
    {

        $this->validate(['resource_name' => 'required', 'quantity' => 'required', 'area_of_allocation' => 'required', 'specific_area' => 'required']);

        $allocate = new AreaOfAllocation();

        $allocate->user_id = auth()->user()->id;

        $allocate->chas_resource_id = $this->resource_name;

        $allocate->department = $this->department;

        $allocate->college_name = auth()->user()->college_name;

        $allocate->quantity = $this->quantity;

        $allocate->area_of_allocation = $this->area_of_allocation;

        $allocate->specific_area_of_allocations= $this->specific_area;

        $allocate->save();

        $this->decrementAssetsQuantity();

        session()->flash('success', 'Successfully allocated');

        $this->reset(['quantity', 'resource_name', 'area_of_allocation']);
    }

    public function exportChasAreas(){
        $AreaReport = [];

        $areaData = AreaOfAllocation::where('college_name', '=', auth()->user()->college_name)->get();

        foreach ($areaData as $area){
            $AreaReport[] = [
                'area' => $area,
            ];
        }

        $pdf = Pdf::loadView('chas-allocated-areas',[
            'area' => $area,
        ]);

        $pdfOutput = $pdf->output();

        return response()->stream(
            function ($pdfOutput) use ($pdf
        ){
            echo $pdfOutput;
        },
        200,
        [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename=UDOM-CHAS-report.pdf'
        ]
        );
    }

    public function decrementAssetsQuantity()
    {
            $updateStatus = ChasResource::where('allocation_status', 'Not Allocated')->where('resource_name', $this->resource_name)->take($this->quantity)->get();

            foreach ($updateStatus as $status) {

                $status->allocation_status = 'Transfered';
                $status->update();
            }

    }

    public function deleteChasArea($id)
    {

        $deleteChasArea = AreaOfAllocation::findOrFail($id)->delete();

        session()->flash('area', 'Successfully deleted');


    }
}
