<?php

namespace App\Livewire;

use App\Models\Supplier;
use App\Models\SupplierContactPhoneNumber;
use Livewire\Component;

class AddSupplierPhoneNumbersLivewire extends Component
{

    public $SupplierName, $PhoneNumber;


    public function render()
    {
        return view('livewire.add-supplier-phone-numbers-livewire', ['Suppliers' => Supplier::get()]);
    }

    public function addNewPhoneNumber(){

        $this->validate(['PhoneNumber' => 'required|digits:10', 'SupplierName' => 'required|string']);

        $phoneNumber = new SupplierContactPhoneNumber();
        $phoneNumber->supplier_id = $this->SupplierName;
        $phoneNumber->phone_number = $this->PhoneNumber;

        $phoneNumber->save();

        session()->flash('phone', 'Phone number is added successfully.');
        $this->PhoneNumber = '';
    }
}
