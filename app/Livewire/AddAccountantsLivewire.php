<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use App\Exports\AccountantExport;
use App\Imports\AccountantImport;
use Livewire\WithPagination;

class AddAccountantsLivewire extends Component
{

    use WithFileUploads;
    use WithPagination;



    public $role_id = 2, $username, $email, $password,

         $profile_image, $accountant, $accountantSearch = '';

         public function mount(){

            $this->password = time();
        }

    public function render()
    {
        if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )') {
            return view('livewire.add-accountants-livewire', [
                'Accountants' => User::search($this->accountantSearch)->where('role_id', '=', '2')->where('post', 'accountant')->where('college_name', auth()->user()->college_name)->paginate(15)
            ]);
        }

        elseif (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ') {
            return view('livewire.add-accountants-livewire', [
            
                'Accountants' => User::search($this->accountantSearch)->where('role_id', '=', '2')->where('post', 'accountant')->where('college_name',auth()->user()->college_name)->paginate(15)
            ]);
        }

    }


    public function addAccountants()
    {

        $this->validate([
            'username' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',


        ]);


        $accountant = new User();

        $accountant->username = $this->username;

        $accountant->email = $this->email;

        $accountant->college_name = auth()->user()->college_name;

        $accountant->post = 'accountant';

        $accountant->password = Hash::make($this->password);

        $accountant->role_id = $this->role_id;

        if (!is_null($this->profile_image)) {
            $profile_image = $this->profile_image->store('public/profile_images');

            $profile_image = explode('/', $profile_image);
            $profile_image = $profile_image[2];

            $accountant->profile_image = $profile_image;
        } else {
            $accountant->profile_image = 'user3.png';
        }


        $accountant->save();

        $this->reset(['email', 'profile_image', 'username', 'password']);

        session()->flash('addAnAccountant', 'An accountant is added successfully.');
    }

    public function importAccountants()
    {

        $this->validate(['accountants' => 'required|mimes:xlsx,xls,csv']);

        // dd($this->assistantInventoryManager);

        $filePath = $this->assistantInventoryManager->store('public/accountants');


        // dispatch(new AssistantImportProcess($filePath))->delay(now()->addSeconds(5));



        // if (File::exists($filePath)) {
        //     File::delete()
        // }

        Excel::queueImport(new AccountantImport, $filePath);


        $this->reset(['accountant']);

        session()->flash('message', 'Done...');

    }


    public function exportAccountants()
    {

        return Excel::download(new AccountantExport, 'UDOM-accountant-inventory-managers.csv');

        session()->flash('exportMessage', 'UDOM Accountant Inventory Managers are exported successfully.');
    }

    public function deleteAccountant($id)
    {
        $assistant = User::findOrFail($id);

        $accountant_profile = $assistant->profile_image;

        if (File::exists(public_path('storage/profile_images/'.$accountant_profile))) {

            File::delete(public_path('storage/profile_images/'.$accountant_profile));


        }

        $assistant->delete();

        session()->flash('deleteAccountant', 'Accountant is deleted successfully.');



    }
}
