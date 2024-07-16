<?php

namespace App\Livewire;

use App\Exports\CnmsDetailsReportExport;
use App\Models\CnmsResource;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class CnmsDetailsReportLivewire extends Component
{
    public $cnmsDetailSearch = '';
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.cnms-details-report-livewire',
        [
            'Details' => CnmsResource::search($this->cnmsDetailSearch)->with(['category'])->paginate(15),
        ]
    );
    }

    public function exportCnmsdetailsPdf(){

        session()->flash('done', 'Export done...');

        return Excel::download(new CnmsDetailsReportExport, 'CNMS-DETAILS-REPORT.xlsx');

    }

    public function deleteCnmsCreateddetail($id){

        $details = CnmsResource::findOrFail($id) ? CnmsResource::findOrFail($id)->delete() :false;

        session()->flash('success','Deleted...');
    }
}
