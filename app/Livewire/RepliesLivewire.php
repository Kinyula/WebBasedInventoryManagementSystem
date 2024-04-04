<?php

namespace App\Livewire;

use App\Models\Replies;
use Livewire\Component;
use Livewire\WithFileUploads;

class RepliesLivewire extends Component
{
    use WithFileUploads;

    public $report_file, $college_name;

    public function render()
    {
        return view('livewire.replies-livewire');
    }

    public function replyReports()
    {

        $this->validate(['report_file' => 'required|file|mimes:pdf', 'college_name' => 'required']);

        $send = new Replies();

        $send->user_id = auth()->user()->id;

        $send->college_name = auth()->user()->college_name;

        $send->reply_to_specified_college = $this->college_name;

        if (!is_null($this->report_file)) {

            $report_file = $this->report_file->store('public/report_files');

            $report_file = explode('/', $report_file);

            $report_file = $report_file[2];

            $send->report_file = $report_file;

        }

        $send->save();

        session()->flash('replyReportMessage', 'Report replied successfully!');

        $this->reset(['report_file', 'college_name']);
    }
}
