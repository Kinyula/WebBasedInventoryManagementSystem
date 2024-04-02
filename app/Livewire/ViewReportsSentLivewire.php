<?php

namespace App\Livewire;

use App\Models\SendingReport;
use Livewire\Component;
use Livewire\WithPagination;

class ViewReportsSentLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.view-reports-sent-livewire', ['Reports' => SendingReport::paginate(15)]);
    }

    public function download($id){

        $file_path = SendingReport::where('id', $id)->first();

        return response()->download(public_path('storage/report_files/'.$file_path->report_file));
        
    }
}
