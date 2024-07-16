<?php

namespace App\Livewire;

use App\Exports\RepairCiveExport;
use App\Models\CiveResource;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class MaintananceStatusCiveLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $civeResourceSearch = '';
    public function render()
    {
        return view('livewire.maintanance-status-cive-livewire',[
            'Resources' => CiveResource::searchRepair($this->civeResourceSearch)->with(
                ['user', 'category', 'allocation']
            )->where('repair_status', 'Repair')->paginate(15),
        ]);
    }

    public function exportRepair()
    {
        session()->flash('success','Repair assets for CIVE has been successfully exported');

        return Excel::download(new RepairCiveExport, 'Repair-cive-status-resources.xlsx');
    }
}
