<?php

namespace App\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;


class StaffManagementLivewire extends Component
{
    public $role_id, $username, $email, $password, $post, $college, $profile_image;

    public function mount(){

        $this->password = time();
    }


    public function render()
    {
        return view('livewire.staff-management-livewire');
    }


    public function addStaffs()
    {

        $this->validate([
            'username' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'post' => 'required',

        ]);


        $staff = new User();

        $staff->username = $this->username;

        $staff->email = $this->email;


        if (!is_null($this->college)) {
            $staff->college_name = $this->college;
        } else {
            $staff->college_name = 'Not set';
        }



        $staff->post = $this->post;

        $staff->password = Hash::make($this->password);

        $staff->role_id = $this->role_id;

        if (!is_null($this->profile_image)) {
            $profile_image = $this->profile_image->store('public/profile_images');

            $profile_image = explode('/', $profile_image);
            $profile_image = $profile_image[2];

            $staff->profile_image = $profile_image;
        } else {
            $staff->profile_image = 'user3.png';
        }


        $staff->save();

        $this->reset(['email', 'profile_image', 'username', 'password', 'post', 'college', 'role_id']);

        session()->flash('addStaff', 'A staff is added successfully.');
    }

}
