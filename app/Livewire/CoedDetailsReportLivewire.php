<?php

namespace App\Livewire;

use App\Exports\CoedDetailsReportExport;
use App\Models\CoEDResource;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class CoedDetailsReportLivewire extends Component
{
    public $coedDetailSearch = '';
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.coed-details-report-livewire',
        [
            'Details' => CoEDResource::search($this->coedDetailSearch)->with(['category'])->paginate(15),
        ]
    );
    }

    public function exportCoeddetailsExcel(){

        session()->flash('done', 'Export done...');

        return Excel::download(new CoedDetailsReportExport, 'CoED-DETAILS-REPORT.xlsx');

    }

    public function deleteCoedCreateddetail($id){

        $details = CoEDResource::findOrFail($id) ? CoEDResource::findOrFail($id)->delete() :false;

        session()->flash('success','Deleted...');
    }
}
