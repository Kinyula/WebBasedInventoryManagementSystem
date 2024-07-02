<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PhoneNumber;

class AddPhoneNumbersLivewire extends Component
{

    public $phoneNumber, $PhoneNumber;

    public function render()
    {
        return view('livewire.add-phone-numbers-livewire');
    }

    public function addNewPhoneNumber(){
        $this->validate(['PhoneNumber' => 'required|digits:10']);
        $phoneNumber = new PhoneNumber();
        $phoneNumber->user_id = auth()->user()->id;
        $phoneNumber->phone_number = $this->PhoneNumber;

        $phoneNumber->save();

        session()->flash('phone', 'Phone number is added successfully.');
        $this->PhoneNumber = '';
    }
}
