<?php

namespace App\Livewire;

use App\Models\Replies;



use Livewire\Component;

class ViewMessagingReportFilesLivewire extends Component
{
    public $reportId = [];

    public function render()
    {

        if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )') {

            return view('livewire.view-messaging-report-files-livewire', ['Reports' => Replies::with(['user'])->where('reply_to_specified_college', 'College of Health and Allied Science ( CHAS )')->paginate(15)]);
        }

        if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ') {

            return view('livewire.view-messaging-report-files-livewire', ['Reports' => Replies::with(['user'])->where('reply_to_specified_college', 'College of Natural Mathematical Science ( CNMS ) ')->paginate(15)]);
        }

        if (auth()->user()->college_name == 'Not set') {
            return view('livewire.view-messaging-report-files-livewire', ['Reports' => Replies::with(['user'])->where('college_name', 'Not set')->paginate(15)]);
        }
    }


}
