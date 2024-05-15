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

        $supplier = Supplier::findOrFail($id);

        $this->company_name = $supplier->company_name;
        $this->company_location = $supplier->company_location;
        $this->contact = $supplier->phone_number;
        $this->service = $supplier->services_offered;

        $supplier->update();


    }
}
