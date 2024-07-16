<?php

namespace App\Livewire;

use App\Exports\ChasReportExcelExport;
use App\Models\AreaOfAllocation;
use App\Models\ChasResource;
use App\Models\ResourceAllocation;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ResourceAllocationToAreasLivewire extends Component
{

    use WithPagination;
    public $resource_name, $quantity, $building,$room,  $searchAsset = '', $department, $floor;


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

        $this->validate(['resource_name' => 'required', 'quantity' => 'required', 'building' => 'required', 'room' => 'required', 'department' => 'required', 'floor' => 'required']);

        $allocate = new AreaOfAllocation();

        $allocate->user_id = auth()->user()->id;

        $allocate->chas_resource_id = $this->resource_name;

        $allocate->department = $this->department;

        $allocate->college_name = auth()->user()->college_name;

        $allocate->quantity = $this->quantity;

        $allocate->area_of_allocation = $this->building;

        $allocate->floor = $this->floor;

        $allocate->specific_area_of_allocations= $this->room;

        $allocate->save();

        $this->decrementAssetsQuantity();

        session()->flash('success', 'Successfully allocated');

        $this->reset(['quantity', 'resource_name', 'building', 'room']);
    }

    // public function exportChasAreas(){
    //     $AreaReport = [];

    //     $areaData = AreaOfAllocation::where('college_name', '=', auth()->user()->college_name)->get();

    //     foreach ($areaData as $area){
    //         $AreaReport[] = [
    //             'area' => $area,
    //         ];
    //     }

    //     $pdf = Pdf::loadView('chas-allocated-areas',[
    //         'area' => $area,
    //     ]);

    //     $pdfOutput = $pdf->output();

    //     return response()->stream(
    //         function ($pdfOutput) use ($pdf
    //     ){
    //         echo $pdfOutput;
    //     },
    //     200,
    //     [
    //         'Content-Type' => 'application/pdf',
    //         'Content-Disposition' => 'inline; filename=UDOM-CHAS-report.pdf'
    //     ]
    //     );
    // }

    public function exportChasReportExcel(){

        session()->flash('report', 'Data is exported successfully');

        return Excel::download(new ChasReportExcelExport, 'CHAS-report-data.xlsx');
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
