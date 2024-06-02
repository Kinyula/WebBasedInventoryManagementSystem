<?php

namespace App\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\AssistantInventoryManagerImport;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AssistantInventoryManagerExport;
use App\Jobs\AssistantImportProcess;


class AddAssistantInventoryManagerLivewire extends Component
{
    use WithFileUploads;

    use WithPagination;

    public $assistantSearch = '';

    protected $paginationTheme = 'tailwind';

    public $role_id = 1, $username, $email, $password,
         $profile_image, $assistantInventoryManager;

         public function mount(){

            $this->password = time();
        }

    public function render()
    {
        return view('livewire.add-assistant-inventory-manager-livewire',[

            'Assistants' => User::search($this->assistantSearch)->with(['phone'])->where('role_id', '=', '1')->paginate(15)

        ]);
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

        // dd($this->assistantInventoryManager);

        $filePath = $this->assistantInventoryManager->store('public/assistants');


        // dispatch(new AssistantImportProcess($filePath))->delay(now()->addSeconds(5));



        // if (File::exists($filePath)) {
        //     File::delete()
        // }

        Excel::queueImport(new AssistantInventoryManagerImport, $filePath);


        $this->reset(['assistantInventoryManager']);

        session()->flash('message', 'Done...');

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


        }

        $assistant->delete();

        session()->flash('deleteAssistant', 'Assistant is deleted successfully.');



    }
}
