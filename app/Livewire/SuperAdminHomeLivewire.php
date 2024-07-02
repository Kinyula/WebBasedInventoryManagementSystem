<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StaffExportFile;
use Illuminate\Support\Facades\File;

class SuperAdminHomeLivewire extends Component
{
    use WithPagination;
    public $staffSearch = '', $id;


    public function render()
    {
        return view('livewire.super-admin-home-livewire', [
            'store' => User::where('post', 'store')->count(),
            'accountant' => User::where('post', 'accountant')->count(),
            'vc' => User::where('post', 'Vice Chansellor ( VC )')->count(),
            'dof' => User::where('post', 'Director of Finance ( DoF )')->count(),
            'cso' => User::where('post', 'Chief Supplier Officer ( CSO )')->count(),
            'principal' => User::where('post', 'Principal')->count(),
            'hod' => User::where('post', 'Head of department ( HOD )')->count(),
            'Staffs' => User::search($this->staffSearch)->paginate(15),


        ]);
    }



    public function exportStaffs()
    {

        return Excel::download(new StaffExportFile, 'UDOM-staffs.csv');

        session()->flash('exportMessage', 'UDOM staffs are exported successfully.');
    }

    public function deleteStaff($id){

        $user = User::findOrFail($id);

        $user_profile = $user->profile_image;

        if (File::exists(public_path('storage/profile_images/'.$user_profile))) {

            File::delete(public_path('storage/profile_images/'.$user_profile));


        }

        $user->delete();

        session()->flash('deleteUser', 'Staff is deleted successfully.');
    }
}
