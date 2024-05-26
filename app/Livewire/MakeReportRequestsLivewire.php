<?php

namespace App\Livewire;

use App\Models\ReportRequest;
use Livewire\Component;

class MakeReportRequestsLivewire extends Component
{

    public $request;

    public function render()
    {
        return view('livewire.make-report-requests-livewire');
    }

    public function requestSent(){

        $this->validate(['request' => 'required|string']);

        $request = new ReportRequest();

        $request->user_id = auth()->user()->id;

        $request->college_name = auth()->user()->college_name;

        $request->request = $this->request;

        $request->save();

        $this->reset(['request']);

        session()->flash('message', 'Request submitted successfully!');

    }
}
