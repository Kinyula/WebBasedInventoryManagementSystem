<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SendingReport;

use Livewire\WithPagination;

class ViewChasReportsSentLivewire extends Component
{

    use WithPagination;

    public function render()
    {
        if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )') {

            return view('livewire.view-chas-reports-sent-livewire', ['Reports' => SendingReport::with(['user'])->where('college_name', auth()->user()->college_name)->paginate(15)]);

        }

    }

    public function download($id){

        $file_path = SendingReport::where('id', $id)->first();

        return response()->download(public_path('storage/report_files/'.$file_path->report_file));

    }
}
