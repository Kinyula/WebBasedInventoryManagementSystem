<?php

namespace App\Livewire;

use App\Models\Supplier;
use App\Models\SupplierOfferedService;
use Livewire\Component;

class AddSupplierServicesLivewire extends Component
{
    public $SupplierService, $Supplier;

    public function render()
    {
        return view('livewire.add-supplier-services-livewire',  ['Suppliers' => Supplier::get()]);
    }

    public function addNewSupplierService(){

        $this->validate(['SupplierService' => 'required|string', 'Supplier' => 'required|string']);

        $supplierServices = new SupplierOfferedService();

        $supplierServices->supplier_id = $this->Supplier;
        $supplierServices->services_offered = $this->SupplierService;

        $supplierServices->save();

        session()->flash('service', 'Service is added successfully.');
        $this->SupplierService = '';
        $this->Supplier = '';
    }
}
