<?php

namespace App\Livewire;

use App\Models\Supplier;
use Livewire\Component;

class AddSuppliersLivewire extends Component
{
    public $SupplierName, $SupplierLocation;

    public function render()
    {
        return view('livewire.add-suppliers-livewire');
    }

    public function addNewSupplier(){
        $this->validate(['SupplierName' => 'required|string', 'SupplierLocation' => 'required|string']);

        $NewSupplier = new Supplier();

        $NewSupplier->company_name = $this->SupplierName;
        $NewSupplier->company_location = $this->SupplierLocation;

        $NewSupplier->save();

        session()->flash('supplier', 'Supplier is added successfully');

    }
}
