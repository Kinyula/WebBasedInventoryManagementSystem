<?php

namespace App\Livewire;

use App\Exports\CoeseDetailsReportExport;
use App\Models\CoESEResource;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;

class CoeseDetailsReportLivewire extends Component
{
    public $coeseDetailSearch = '';
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.coese-details-report-livewire',
        [
            'Details' => CoESEResource::search($this->coeseDetailSearch)->with(['category'])->paginate(15),
        ]
    );
    }


    public function exportCoesedetailsExcel(){

        session()->flash('done', 'Export done...');

        return Excel::download(new CoeseDetailsReportExport, 'CoESE-DETAILS-REPORT.xlsx');

    }

    public function deleteCoeseCreateddetail($id){

        $details = CoESEResource::findOrFail($id) ? CoESEResource::findOrFail($id)->delete() :false;

        session()->flash('success','Deleted...');
    }
}
