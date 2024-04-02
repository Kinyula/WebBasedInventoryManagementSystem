<?php

namespace App\Livewire;

use App\Models\SendingReport;
use Livewire\Component;
use Livewire\WithFileUploads;


class SendingReportsLivewire extends Component
{

    use WithFileUploads;

    protected $paginationTheme = 'tailwind';

    public $report_file;

    public function render()
    {
        return view('livewire.sending-reports-livewire');
    }

    public function sendingReports()
    {

        $this->validate(['report_file' => 'required|file|mimes:pdf']);

        $send = new SendingReport();

        $send->user_id = auth()->user()->id;

        $send->college_name = auth()->user()->college_name;

        if (!is_null($this->report_file)) {
            $report_file = $this->report_file->store('public/report_files');

            $report_file = explode('/', $report_file);

            $report_file = $report_file[2];

            $send->report_file = $report_file;
        }

        $send->save();

        session()->flash('sendingReportMessage', 'Report sent successfully!');

        $this->reset(['report_file']);
    }
}
