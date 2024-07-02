<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class EditStaffsLivewire extends Component
{
    public $id, $password;

    public function mount()
    {

        $this->password = time();
    }
    public function render()
    {
        return view('livewire.edit-staffs-livewire', [
            'Staff' => User::findOrFail($this->id)
        ]);
    }

    public function editUserCredentials()
    {
        $edituser = User::findOrFail($this->id);

        $edituser->password = Hash::make($this->password);

        $edituser->update();

        session()->flash('userMessage','User info updated');

        $this->reset(['password']);

    }
}
