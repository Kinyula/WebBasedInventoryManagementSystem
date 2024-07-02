<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\ChasResource;
use App\Models\ConsumableItem;
use Livewire\Component;
use Livewire\WithPagination;

class ConsumableItemsLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $details, $quantity_issued, $resource_name;

    public function render()
    {
        return view('livewire.consumable-items-livewire', ['categories' => Category::first(),
        'consumableItems' => ConsumableItem::with(['chasResources'])->get(),
        'ConsumableChasItems' => ChasResource::where('category_id', '8')->distinct('resource_name')->get()
    ]);
    }

    public function createConsumableItems(){

        $this->validate(['details' => 'required',  'quantity_issued' => 'required']);

        $consumable = new ConsumableItem();

        $consumable->chas_resource_id = $this->details;

        $consumable->quantity_issued = $this->quantity_issued;


        $consumable->save();

        $this->updateIssueStatus();

        $this->reset(['details', 'quantity_issued']);

        session()->flash('success', 'Consumable item is created successfully');


    }

    public function updateIssueStatus(){

        $updateStatus = ChasResource::where('consumable_issue_status', 'Not issued yet')->where('id', $this->details)->take($this->quantity_issued)->get();

        foreach ($updateStatus as $status) {

            $status->consumable_issue_status = 'issued';

            $status->update();
        }
    }
}

