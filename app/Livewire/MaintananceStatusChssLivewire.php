<?php

namespace App\Livewire;

use App\Exports\RepairChssExport;
use App\Models\ChssResource;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;

class MaintananceStatusChssLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $chssResourceSearch = '';

    public function render()
    {
        return view('livewire.maintanance-status-chss-livewire',
    [
        'Resources' => ChssResource::searchRepair($this->chssResourceSearch)->with(
            ['user', 'category', 'allocation']
        )->where('repair_status', 'Repair')->paginate(15),
    ]);
    }

    public function exportRepair()
    {
        session()->flash('success','Repair assets for CHSS has been successfully exported');

        return Excel::download(new RepairChssExport, 'Repair-chss-status-resources.xlsx');
    }
}
