<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\PhoneNumber;

class ViewPhoneNumbersLivewire extends Component
{
    public function render()
    {
        return view('livewire.view-phone-numbers-livewire',  ['PhoneNumbers' => PhoneNumber::with(['user'])->where('user_id', auth()->user()->id)->get()]);
    }

    public function deletePhoneNumber($id)
    {
        $delete_phone_number = PhoneNumber::where("id", $id)->exists() ? PhoneNumber::findOrFail($id)->delete() : false;
        
        session()->flash('deletePhoneNumber', 'Phone is deleted successfully.');
    }
}
