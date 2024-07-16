<?php

namespace App\Livewire;

use App\Exports\CobeDetailsReportExport;
use App\Models\CoBEResource;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;
class CobeDetailsReportLivewire extends Component
{

        public $cobeDetailSearch = '';
        use WithPagination;
        protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.cobe-details-report-livewire',
        [
            'Details' => CoBEResource::search($this->cobeDetailSearch)->with(['category'])->paginate(15),
        ]
    );
    }

    public function exportCobedetailsExcel(){

        session()->flash('done', 'Export done...');

        return Excel::download(new CobeDetailsReportExport, 'CoBE-DETAILS-REPORT.xlsx');

    }

    public function deleteCobeCreateddetail($id){

        $details = CoBEResource::findOrFail($id) ? CoBEResource::findOrFail($id)->delete() :false;

        session()->flash('success','Deleted...');
    }
}
