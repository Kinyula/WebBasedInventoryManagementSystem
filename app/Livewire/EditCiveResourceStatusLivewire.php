<?php

namespace App\Livewire;

use App\Models\CiveResource;
use Livewire\Component;

class EditCiveResourceStatusLivewire extends Component
{
    public $resourceStatus, $id;

    public function render()
    {

        return view('livewire.edit-cive-resource-status-livewire');
    }

    public function editResourceStatus($id)
    {

        $this->validate([
            'resourceStatus' => 'required|string',

        ]);

        $civeResource = CiveResource::findOrFail($id);


        $civeResource->status = $this->resourceStatus;




        $civeResource->update();

        $this->reset(['resourceStatus']);

        session()->flash('resourceStatusMessage', 'Cive resource status is updated successfully.');
    }
}
