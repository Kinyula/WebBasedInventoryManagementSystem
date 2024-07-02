<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class EditCollegeNameLivewire extends Component
{
    public $collegeName, $id;

    public function render()
    {
        return view('livewire.edit-college-name-livewire', ['CollegeInventoryManagers' => User::with(['phone'])->where('role_id', '2')->get()]);
    }

    public function editCollegeName($id)
    {

        $this->validate([
            'collegeName' => 'required|string',

        ]);

        $college_manager = User::findOrFail($id);


        $college_manager->college_name = $this->collegeName;

        $college_manager->update();

        $this->reset(['collegeName']);

        session()->flash('addCollegeNameStatuses', 'College name is updated successfully.');
    }
}
