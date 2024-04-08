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
        if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ') {

            return view('livewire.view-reports-sent-livewire', ['Reports' => SendingReport::with(['user'])->where('college_name', auth()->user()->college_name)->paginate(15)]);
        }

        if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )') {

            return view('livewire.view-reports-sent-livewire', ['Reports' => SendingReport::with(['user'])->where('college_name', auth()->user()->college_name)->paginate(15)]);
        }


        if (auth()->user()->college_name == 'College of Education ( CoED )') {

            return view('livewire.view-reports-sent-livewire', ['Reports' => SendingReport::with(['user'])->where('college_name', auth()->user()->college_name)->paginate(15)]);
        }

        if (auth()->user()->college_name == 'College of Earth Sciences and Engineering ( CoESE )') {

            return view('livewire.view-reports-sent-livewire', ['Reports' => SendingReport::with(['user'])->where('college_name', auth()->user()->college_name)->paginate(15)]);
        }

        if (auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )') {

            return view('livewire.view-reports-sent-livewire', ['Reports' => SendingReport::with(['user'])->where('college_name', auth()->user()->college_name)->paginate(15)]);
        }

        if (auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )') {

            return view('livewire.view-reports-sent-livewire', ['Reports' => SendingReport::with(['user'])->where('college_name', auth()->user()->college_name)->paginate(15)]);
        }

        if (auth()->user()->college_name == 'College of Business and Economics ( CoBE )') {

            return view('livewire.view-reports-sent-livewire', ['Reports' => SendingReport::with(['user'])->where('college_name', auth()->user()->college_name)->paginate(15)]);
        }
    }

    public function download($id){

        $file_path = SendingReport::where('id', $id)->first();

        return response()->download(public_path('storage/report_files/'.$file_path->report_file));

    }

    public function deleteReportSent($id){

        dd($id);
        $deleteReportSent = SendingReport::where('id', $id)->exists() ? SendingReport::findOrFail($id)->delete() : false;

    }
}
