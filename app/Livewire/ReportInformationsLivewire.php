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
        return view('livewire.report-informations-livewire', ['Reports' => SendingReport::search($this->reportInformationSearch)->with(['user'])->whereNot('college_name', 'Not set')->paginate(15)]);
    }

    public function download($id)
    {

        $file_path = SendingReport::where('id', $id)->first();

        return response()->download(public_path('storage/report_files/' . $file_path->report_file));

        session()->flash('message', 'Done Downloaded!');
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
