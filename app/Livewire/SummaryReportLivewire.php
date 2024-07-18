<?php

namespace App\Livewire;

use App\Exports\SummaryReportExport;
use Livewire\Component;
use App\Models\ChasResource;
use Maatwebsite\Excel\Facades\Excel;

class SummaryReportLivewire extends Component
{
    public $chasdetailSearch = '';
    public function render()
    {
        return view(
            'livewire.summary-report-livewire',

            [
                'Details' => ChasResource::search($this->chasdetailSearch)->with(['category'])->distinct('category_id')->whereNot('category_id', '=', '8')->paginate(15),
            ]
        );
    }

    public function exportChasSummaryExcel()
    {
        session()->flash('done', 'Downloaded successfully');

        return Excel::download(new SummaryReportExport, 'CHAS-SUMMARY-REPORT.xlsx');
    }
}
