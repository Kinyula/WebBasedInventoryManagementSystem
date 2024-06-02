<?php

namespace App\Livewire;

use App\Models\Supplier;
use Livewire\Component;

class UpdateSuppliersLivewire extends Component
{

    public $id, $company_name, $company_location, $contact, $service, $supplier;

    public function mount(){

        $this->supplier = Supplier::with(['phone', 'services'])->findOrFail($this->id);
    }
    public function render()
    {
        return view('livewire.update-suppliers-livewire');
    }

    public function updateSupplier($id){

        $this->validate(['company_name' => 'required', 'company_location' => 'required', 'contact' => 'required', 'service' => 'required', 'supplier' => 'required']);

        $supplier = Supplier::findOrFail($id);

        $supplier->company_name = $this->company_name;
        $supplier->company_location = $this->company_location;
        $supplier->phone_number = $this->contact;
        $supplier->services_offered = $this->service;

        $supplier->services->phone->update();
    }
}
