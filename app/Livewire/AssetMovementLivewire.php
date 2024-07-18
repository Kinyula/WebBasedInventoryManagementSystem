<?php

namespace App\Livewire;

use App\Models\AreaOfAllocation;
use App\Models\AssetMovementWithinCollege;
use App\Models\ChasResource;
use Livewire\Component;
use App\Jobs\ExportChasQrCodesJob;
use App\Jobs\ExportChasResourcesPdfJob;
use Illuminate\Support\Facades\DB;

class AssetMovementLivewire extends Component
{

    public $chasResourceSearch = '';

    public $resourceId = [];

    protected $paginationTheme = 'tailwind';

    protected $listeners = ['export' => '$refresh', 'saved' => '$refresh'];

    public $pdfFiles = [];

    public $allChecked = false;

    public $room, $floor, $building;



    public function markAll()
    {
        if ($this->allChecked) {
            // Mark all checkboxes
            $this->resourceId = ChasResource::search($this->chasResourceSearch)
                ->where('movement_status', '=', 'Not moved')
                ->pluck('id')
                ->toArray();
        } else {
            // Unmark all checkboxes
            $this->resourceId = [];
        }
    }

    public function moveSelected()
    {
        if (empty($this->resourceId)) {
            session()->flash('error', 'No items selected please select to continue.');
            return;
        }

        DB::transaction(function () {
            ChasResource::whereIn('id', $this->resourceId)

                ->update([
                    'movement_status' => 'Moved',
                    'building' => $this->building,
                    'specific_area' => $this->floor,
                    'room' => $this->room
                ]);
        });

        session()->flash('done', 'Moved successfully.');
        // Reset selection and checkbox state
        $this->resourceId = [];
        $this->allChecked = false;


    }

    public function render()
    {
        return view('livewire.asset-movement-livewire',[

            'Resources' => ChasResource::searchMoved($this->chasResourceSearch)->where('allocation_status', '=', 'Allocated')->where('movement_status', '=', 'Not moved')->paginate(15),
            'MovedAssetToAreas' => ChasResource::searchUnmoved($this->chasResourceSearch)->where('allocation_status', '=', 'Transfered')->where('movement_status', '=', 'Moved')->paginate(15),

        ]);

    }



}
