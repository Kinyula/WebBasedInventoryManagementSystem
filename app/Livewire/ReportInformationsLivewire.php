<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SendingReport;
use Illuminate\Support\Facades\File;


class ReportInformationsLivewire extends Component
{
    public $reportInformationSearch = '';

    public function render()
    {
        $reports = SendingReport::search($this->reportInformationSearch)
                ->with(['user'])
                ->whereNot('college_name', 'Not set')
                ->orderByDesc('id')
                ->paginate(15);
        return view('livewire.report-informations-livewire', ['Reports' => $reports]);
    }

    public function download(SendingReport $report)
    {
        //update the report status
        $report->report_status = 'downloaded';
        $report->save();

        session()->flash('message', 'Done Downloaded!');

        return response()->download(public_path('storage/report_files/' . $report->report_file));

    }

    public function deleteReport($id){

        $report_file = SendingReport::findOrFail($id);

        if (File::exists(public_path('storage/report_files/' . $report_file->report_file))) {

            File::delete(public_path('storage/report_files/' . $report_file->report_file));

            $report_file->delete();

            session()->flash('deleteReport', 'Report deleted successfully!');

        }

    }
}
