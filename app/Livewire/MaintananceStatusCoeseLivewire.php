<?php

namespace App\Livewire;

use App\Models\CoESEResource;
use Livewire\Component;
use Livewire\WithPagination;

class MaintananceStatusCoeseLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $coeseResourceSearch = '';
    public function render()
    {
        return view('livewire.maintanance-status-coese-livewire',
    [
        'Resources' => CoESEResource::searchRepair($this->coeseResourceSearch)->with(
            ['user', 'category', 'allocation']
        )->where('repair_status', 'Repair')->paginate(15),
    ]);
    }
}
