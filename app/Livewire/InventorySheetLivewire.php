<?php

namespace App\Livewire;

use App\Exports\ChasInventorySheetExport;
use App\Exports\ChasInventorySheetExportSpecific;
use Livewire\Component;
use App\Models\ChasResource;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class InventorySheetLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    public $chasdetailSearch = '';


    public function render()
    {
        return view('livewire.inventory-sheet-livewire',


        [
            'Details' => ChasResource::searchResourceInventory($this->chasdetailSearch)->with(['category'])->whereNot('category_id', '=', '8')->paginate(15),
        ]

    );
    }

    public function exportChasInventorySheetExcel(){

        if (empty($this->chasdetailSearch)) {
            // dd("empty");

            return Excel::download(new ChasInventorySheetExport, 'CHAS-INVENTORY-SHEET.xlsx');

        } else {
            // dd($this->chasdetailSearch);
            return Excel::download(new ChasInventorySheetExportSpecific($this->chasdetailSearch), 'CHAS-INVENTORY-SHEET-SPECIFIC.xlsx');

        }



    }
}
