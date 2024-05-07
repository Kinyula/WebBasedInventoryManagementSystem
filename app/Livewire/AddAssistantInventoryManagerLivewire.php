<?php

namespace App\Livewire;


use App\Jobs\AssistantImportProcess;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AssistantInventoryManagerImport;


class AddAssistantInventoryManagerLivewire extends Component
{
    use WithFileUploads;

    public $role_id = 1, $username, $email, $password,
         $profile_image, $assistantInventoryManager;

         public function mount(){

            $this->password = time();
        }

    public function render()
    {
        return view('livewire.add-assistant-inventory-manager-livewire');
    }



    public function addAssistantInventoryManager()
    {

        $this->validate([
            'username' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',


        ]);


        $assistantInventoryManager = new User();

        $assistantInventoryManager->username = $this->username;

        $assistantInventoryManager->email = $this->email;

        $assistantInventoryManager->password = Hash::make($this->password);

        $assistantInventoryManager->role_id = $this->role_id;

        if (!is_null($this->profile_image)) {
            $profile_image = $this->profile_image->store('public/profile_images');

            $profile_image = explode('/', $profile_image);
            $profile_image = $profile_image[2];

            $assistantInventoryManager->profile_image = $profile_image;
        } else {
            $assistantInventoryManager->profile_image = 'user3.png';
        }


        $assistantInventoryManager->save();

        $this->reset(['email', 'profile_image', 'username', 'password']);

        session()->flash('addAnAssistant', 'An assistant is added successfully.');
    }

    public function importAssistantInventoryManagers()
    {

        $this->validate(['assistantInventoryManager' => 'required|mimes:xlsx,xls,csv']);


        dispatch(new AssistantImportProcess($this->assistantInventoryManager));


        Excel::import(new AssistantInventoryManagerImport, $this->assistantInventoryManager);

        session()->flash('message', 'We will notify you shortly...');
    }
}
