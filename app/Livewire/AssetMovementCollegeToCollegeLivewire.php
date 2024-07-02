<?php

namespace App\Livewire;

use App\Models\AreaOfAllocation;
use App\Models\AssetMovement;
use Livewire\Component;
use Livewire\WithPagination;

class AssetMovementCollegeToCollegeLivewire extends Component
{

    use WithPagination;
    public $search = '', $searchAsset = '', $quantity, $resource_name, $receiver;

    public function render()
    {
        return view('livewire.asset-movement-college-to-college-livewire', [
            'Assets' => AreaOfAllocation::searchAsset($this->searchAsset)->where('status_movement', '=' , 'Not moved')->distinct('chas_resource_id')->get(),
            'Areas' => AssetMovement::search($this->search)->with(['chasAreas'])->paginate()
        ]);
    }

    public function MoveResourceToAreas(){

        $this->validate(['resource_name' => 'required', 'receiver' => 'required', 'quantity' => 'required']);

        $movement = new AssetMovement();

        $movement->area_of_allocation_id = $this->resource_name;

        $movement->quantity = $this->quantity;

        $movement->from = auth()->user()->college_name;

        $movement->to = $this->receiver;

        $movement->save();

        $this->moved();

        $this->reset(['resource_name', 'receiver', 'quantity']);

        session()->flash('success', 'Movement successfully moved');
    }

    public function moved(){
        $updateStatus = AreaOfAllocation::where('status_movement', 'Not moved')->where('college_name', auth()->user()->college_name)->take($this->quantity)->get();

        foreach ($updateStatus as $status) {

            $status->status_movement = 'Moved';

            $status->update();
        }
    }

    public function deleteChasAreaMoved($id) {

        $deleteMoved = AssetMovement::findOrFail($id) ? AssetMovement::findOrFail($id)->delete() : false;

        session()->flash('delete', 'Moved asset is deleted successfully');
    }


}
