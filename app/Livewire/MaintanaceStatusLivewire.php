<?php

namespace App\Livewire;

use App\Exports\RepairExport;
use App\Models\ChasResource;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class MaintanaceStatusLivewire extends Component
{
    use WithPagination;


    public $chasResourceSearch = '';

    public function render()
    {
        if (auth()->user()->department == 'DICT') {
            return view('livewire.maintanace-status-livewire', [
                'Resources' => ChasResource::searchRepair($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->where('repair_status', 'Repair')->whereIn('category_id',['5', '17'])->paginate(15)
            ]);
        }

        elseif (auth()->user()->post == 'accountant') {
            return view('livewire.maintanace-status-livewire', [
                'Resources' => ChasResource::searchRepair($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->where('repair_status', 'Repaired')->paginate(15)
            ]);
        }

        else {
            return view('livewire.maintanace-status-livewire', [
                'Resources' => ChasResource::searchRepair($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->where('repair_status', 'Repair')->paginate(15)
            ]);
        }


    }

    public function exportRepair()
    {
        session()->flash('success','Repair assets for CHAS has been successfully exported');
        return Excel::download(new RepairExport, 'Repair-status-resources.xlsx');
    }
}
