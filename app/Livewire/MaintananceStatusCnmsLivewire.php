<?php

namespace App\Livewire;

use App\Exports\RepairCnmsExport;
use App\Models\CnmsResource;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class MaintananceStatusCnmsLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $cnmsResourceSearch = '';

    public function render()
    {


        return view('livewire.maintanance-status-cnms-livewire', [
            'Resources' => CnmsResource::searchRepair($this->cnmsResourceSearch)->with(
                ['user', 'category', 'allocation']
            )->where('repair_status', 'Repair')->paginate(15),
        ]);
    }

    public function exportRepair()
    {
        session()->flash('success','Repair assets for CNMS has been successfully exported');
        
        return Excel::download(new RepairCnmsExport, 'Repair-cnms-status-resources.xlsx');
    }
}
