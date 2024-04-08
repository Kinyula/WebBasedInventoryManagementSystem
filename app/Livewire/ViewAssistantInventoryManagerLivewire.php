<?php

namespace App\Livewire;

use App\Exports\AssistantInventoryManagerExport;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\File;
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
        $assistant = User::findOrFail($id);

        $assistant_profile = $assistant->profile_image;

        if (File::exists(public_path('storage/profile_images/'.$assistant_profile))) {

            File::delete(public_path('storage/profile_images/'.$assistant_profile));

            $assistant->delete();
        }

        session()->flash('deleteAssistant', 'Assistant is deleted successfully.');
    }
}
