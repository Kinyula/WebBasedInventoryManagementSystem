<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ReportRequest;
use Livewire\WithPagination;

class ViewRequestsLivewire extends Component
{

    use WithPagination;

    protected $paginationTheme = 'tailwind';
    
    public function render()
    {

        if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ') {

            return view('livewire.view-requests-livewire', ['Requests' => ReportRequest::with(['user'])->where('college_name', auth()->user()->college_name)->paginate(15)]);
        }

        if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )') {

            return view('livewire.view-requests-livewire', ['Requests' => ReportRequest::with(['user'])->where('college_name', auth()->user()->college_name)->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Education ( CoED )') {

            return view('livewire.view-requests-livewire', ['Requests' => ReportRequest::with(['user'])->where('college_name', auth()->user()->college_name)->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Earth Sciences and Engineering ( CoESE )') {

            return view('livewire.view-requests-livewire', ['Requests' => ReportRequest::with(['user'])->where('college_name', auth()->user()->college_name)->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )') {

            return view('livewire.view-requests-livewire', ['Requests' => ReportRequest::with(['user'])->where('college_name', auth()->user()->college_name)->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )') {

            return view('livewire.view-requests-livewire', ['Requests' => ReportRequest::with(['user'])->where('college_name', auth()->user()->college_name)->paginate(15)]);

        }

        if (auth()->user()->college_name == 'College of Business and Economics ( CoBE )') {

            return view('livewire.view-requests-livewire', ['Requests' => ReportRequest::with(['user'])->where('college_name', auth()->user()->college_name)->paginate(15)]);

        }


        if (auth()->user()->college_name == 'Not set') {

            return view('livewire.view-requests-livewire', ['Requests' => ReportRequest::with(['user'])->paginate(15)]);

        }
    }

    public function updateSuccessConfirmStatus($id) {



        $requestUpdate = ReportRequest::findOrFail($id);

        $requestUpdate->confirm_status = 'Received';

        $requestUpdate->update();

        session()->flash('success','Successfully updated');
    }

    public function updateErrorConfirmStatus($id) {



        $requestUpdate = ReportRequest::findOrFail($id);

        $requestUpdate->confirm_status = 'Not received';

        $requestUpdate->update();



        session()->flash('error','Successfully updated');
    }
}
