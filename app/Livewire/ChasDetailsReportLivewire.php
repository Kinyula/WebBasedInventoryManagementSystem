<?php

namespace App\Livewire;

use App\Exports\DetailsReportExport;
use App\Models\ChasResource;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ChasDetailsReportLivewire extends Component
{
    public $chasDetailSearch = '';
    use WithPagination;

    public function render()
    {
        return view('livewire.chas-details-report-livewire',

        [
            'Details' => ChasResource::search($this->chasDetailSearch)->with(['category'])->whereNot('category_id', '=', '8')->paginate(15),
        ]

    );
    }

    public function exportChasdetailsPdf(){

        session()->flash('done', 'Export done...');

        return Excel::download(new DetailsReportExport, 'CHAS-DETAILS-REPORT.xlsx');

    }

    public function deleteChasCreateddetail($id){

        $details = ChasResource::findOrFail($id) ? ChasResource::findOrFail($id)->delete() :false;

        session()->flash('success','Deleted...');
    }
}
