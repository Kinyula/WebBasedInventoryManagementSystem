<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class ViewCollegeInventoryManagerLivewire extends Component
{

    use WithPagination;

    public $collegeManagerSearch = '';

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.view-college-inventory-manager-livewire', ['CollegeManagers' => User::search($this->collegeManagerSearch)->with(['phone', 'resources_to_college'])->where('role_id', '2')->paginate(15)]);
    }

    public function deleteCollegeManager($id)
    {
        $delete_college_manager = User::where("id", $id)->exists() ? User::findOrFail($id)->delete() : false;
        session()->flash('deleteCollegeManager', 'College manager is deleted successfully.');
    }
}
