<?php

namespace App\Livewire;

use App\Exports\CiveDetailsReportExport;
use App\Models\CiveResource;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class CiveDetailsReportLivewire extends Component
{
    public $civeDetailSearch = '';
    use WithPagination;
    public function render()
    {
        return view('livewire.cive-details-report-livewire',
        [
            'Details' => CiveResource::search($this->civeDetailSearch)->with(['category'])->paginate(15),
        ]
    );
    }

    public function exportCivedetailsPdf(){

        session()->flash('done', 'Export done...');

        return Excel::download(new CiveDetailsReportExport, 'CIVE-DETAILS-REPORT.xlsx');

    }

    public function deleteCiveCreateddetail($id){

        $details = CiveResource::findOrFail($id) ? CiveResource::findOrFail($id)->delete() :false;

        session()->flash('success','Deleted...');
    }
}
