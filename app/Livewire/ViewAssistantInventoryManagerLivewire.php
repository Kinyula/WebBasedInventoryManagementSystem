<?php

namespace App\Livewire;

use App\Exports\AssistantInventoryManagerExport;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ViewAssistantInventoryManagerLivewire extends Component
{
    use WithPagination;

    public $assistantSearch = '';

    protected $paginationTheme = 'tailwind';

    public function render()
    {

        if (auth()->user()->role_id === '0') {
            return view('livewire.view-assistant-inventory-manager-livewire', ['Assistants' => User::search($this->assistantSearch)->with(['phone'])->where('role_id', '=', '1')->paginate(15)]);
        }
    }

    public function exportAssistantInventoryManagers()
    {

        return Excel::download(new AssistantInventoryManagerExport, 'UDOM-assistant-inventory-managers.csv');

        session()->flash('exportMessage', 'UDOM Assistant Inventory Managers are exported successfully.');
    }

    public function deleteAssistant($id)
    {
        $delete_assistant = User::where("id", $id)->exists() ? User::findOrFail($id)->delete() : false;

        session()->flash('deleteAssistant', 'Assistant is deleted successfully.');
    }
}
