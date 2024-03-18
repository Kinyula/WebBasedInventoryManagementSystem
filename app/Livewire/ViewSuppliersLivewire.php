<?php

namespace App\Livewire;

use App\Models\Supplier;
use Livewire\Component;

class ViewSuppliersLivewire extends Component
{
   public $supplierSearch = '';

    public function render()
    {
        return view('livewire.view-suppliers-livewire',  ['Suppliers' => Supplier::search($this->supplierSearch)->with(['phone', 'services'])->get()]);
    }
}
