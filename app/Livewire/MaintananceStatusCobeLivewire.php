<?php

namespace App\Livewire;

use App\Models\CoBEResource;
use Livewire\Component;
use Livewire\WithPagination;

class MaintananceStatusCobeLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $cobeResourceSearch = '';

    public function render()
    {
        return view('livewire.maintanance-status-cobe-livewire',
    [
        'Resources' => CoBEResource::searchRepair($this->cobeResourceSearch)->with(
            ['user', 'category', 'allocation']
        )->where('repair_status', 'Repair')->paginate(15),
    ]);
    }
}
