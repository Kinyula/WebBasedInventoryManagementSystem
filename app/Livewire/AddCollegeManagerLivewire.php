<?php

namespace App\Livewire;

use App\Imports\CollegeInventoryManagerImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;


class AddCollegeManagerLivewire extends Component
{
    use WithFileUploads;

    public $role_id = 2, $username, $email, $password,
     $password_confirmation, $profile_image, $collegeInventoryManager;
    public function render()
    {
        return view('livewire.add-college-manager-livewire');
    }

    public function importCollegeInventoryManagers()
    {

        $this->validate(['collegeInventoryManager' => 'required|mimes:xlsx,xls,csv']);

        Excel::import(new CollegeInventoryManagerImport, $this->collegeInventoryManager);

        session()->flash('message', 'College Inventory Managers are imported successfully');
    }


    public function addCollegeInventoryManager()
    {

        $this->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',

        ]);


        $collegeInventoryManager = new User();

        $collegeInventoryManager->username = $this->username;

        $collegeInventoryManager->email = $this->email;

        $collegeInventoryManager->password = Hash::make($this->password);

        $collegeInventoryManager->role_id = $this->role_id;

        if (!is_null($this->profile_image)) {
            $profile_image = $this->profile_image->store('public/profile_images');

            $profile_image = explode('/', $profile_image);
            $profile_image = $profile_image[2];

            $collegeInventoryManager->profile_image = $profile_image;
        } else {
            $collegeInventoryManager->profile_image = 'user3.png';
        }




        $collegeInventoryManager->save();

        $this->reset(['email', 'profile_image', 'username', 'password', 'password_confirmation']);

        session()->flash('addCollegeManager', 'A college manager is added successfully.');
    }
}
