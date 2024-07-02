<?php

namespace App\Livewire;

use App\Models\ConsumableItem;
use Livewire\Component;

class EditConsumableItemsLivewire extends Component
{
    public $id, $details, $quantity_received, $quantity_issued, $cost;
    public function render()
    {
        return view('livewire.edit-consumable-items-livewire',

        [
            'Consumable' =>     ConsumableItem::findOrFail($this->id)
        ]

    );
    }

    public function editConsumableItem(){

        $consumable = ConsumableItem::findOrFail($this->id);

        $consumable->details = $this->details;

        $consumable->quantity_received = $this->quantity_received;

        $consumable->quantity_issued = $this->quantity_issued;

        $consumable->cost = $this->cost;

        $consumable->update();

        session()->flash('success','Consumable item is updated successfully');
    }
}
