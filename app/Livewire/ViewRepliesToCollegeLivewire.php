<?php

namespace App\Livewire;

use App\Models\Replies;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class ViewRepliesToCollegeLivewire extends Component
{
    public function render()
    {

        if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )') {

            return view('livewire.view-replies-to-college-livewire', ['Replies' => Replies::with(['user'])->orderByDesc('id')->where('reply_to_specified_college', 'College of Health and Allied Science ( CHAS )')->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ') {

            return view('livewire.view-replies-to-college-livewire', ['Replies' => Replies::with(['user'])->orderByDesc('id')->where('college_name', 'College of Natural Mathematical Science ( CNMS ) ')->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Education ( CoED )') {

            return view('livewire.view-replies-to-college-livewire', ['Replies' => Replies::with(['user'])->orderByDesc('id')->where('college_name', 'College of Education ( CoED )')->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Business and Economics ( CoBE )') {

            return view('livewire.view-replies-to-college-livewire', ['Replies' => Replies::with(['user'])->orderByDesc('id')->where('reply_to_specified_college', 'College of Business and Economics ( CoBE )')->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )') {

            return view('livewire.view-replies-to-college-livewire', ['Replies' => Replies::with(['user'])->orderByDesc('id')->where('reply_to_specified_college', 'College of Humanities and Social Science ( CHSS )')->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Earth Sciences and Engineering ( CoESE )') {

            return view('livewire.view-replies-to-college-livewire', ['Replies' => Replies::with(['user'])->orderByDesc('id')->where('reply_to_specified_college', 'College of Earth Sciences and Engineering ( CoESE )')->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )') {

            return view('livewire.view-replies-to-college-livewire', ['Replies' => Replies::with(['user'])->orderByDesc('id')->where('reply_to_specified_college', 'College of Informatics and Virtual Education ( CIVE )')->paginate(15)]);

        }


    }

    public function download(Replies $reply)
    {
        //update the report status
        $reply->reply_status = 'read';

        $reply->save();

        session()->flash('message', 'Done Downloaded!');

        return response()->download(public_path('storage/report_files/' . $reply->report_file));

    }


    public function deleteReplyReport($id) {

        $replies = Replies::findOrFail($id);

        $ReportFile = $replies->report_file;

        if (File::exists(public_path('storage/report_files/'.$ReportFile))) {

            File::delete(public_path('storage/report_files/'.$ReportFile));

            $replies->delete();
        }

        session()->flash('deleteReply', 'Reply is deleted successfully!');
    }
}
