<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\SendingReport;

class ViewCobeReportsSentLivewire extends Component
{
    public function render()
    {
        return view('livewire.view-cobe-reports-sent-livewire', ['Reports' => SendingReport::paginate(15)]);
    }

    public function download($id){

        $file_path = SendingReport::where('id', $id)->first();

        return response()->download(public_path('storage/report_files/'.$file_path->report_file));

    }
}
