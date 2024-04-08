<?php

namespace App\Livewire;

use App\Models\Replies;
use Illuminate\Support\Facades\File;



use Livewire\Component;

class ViewMessagingReportFilesLivewire extends Component
{
    public $reportId = [];

    public $replySearch = '';

    public function render()
    {

        if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )') {

            return view('livewire.view-messaging-report-files-livewire', ['Reports' => Replies::search($this->replySreplySearchearch)->with(['user'])->where('reply_to_specified_college', 'College of Health and Allied Science ( CHAS )')->paginate(15)]);
        }

        if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ') {

            return view('livewire.view-messaging-report-files-livewire', ['Reports' => Replies::search($this->replySearch)->with(['user'])->where('reply_to_specified_college', 'College of Natural Mathematical Science ( CNMS ) ')->paginate(15)]);
        }

        if (auth()->user()->college_name == 'Not set') {
            return view('livewire.view-messaging-report-files-livewire', ['Reports' => Replies::search($this->replySearch)->with(['user'])->where('college_name', 'Not set')->paginate(15)]);
        }
    }

    public function deleteReport($id)
    {

        $reply = Replies::findOrFail($id);

        $replyFile = $reply->report_file;

        if (File::exists(public_path('storage/report_files/' . $replyFile))) {

            File::delete(public_path('storage/report_files/' . $replyFile));

            $reply->delete();
            session()->flash('deleteReport', 'Reply is deleted successfully!');
        }
    }
}
