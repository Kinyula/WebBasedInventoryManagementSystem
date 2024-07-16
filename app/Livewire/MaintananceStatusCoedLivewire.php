<?php

namespace App\Livewire;

use App\Models\CoEDResource;
use Livewire\Component;
use Livewire\WithPagination;

class MaintananceStatusCoedLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $coedResourceSearch = '';
    public function render()
    {
        return view('livewire.maintanance-status-coed-livewire',
    [
        'Resources' => CoEDResource::searchRepair($this->coedResourceSearch)->with(
            ['user', 'category', 'allocation']
        )->where('repair_status', 'Repair')->paginate(15),
    ]);
    }
}
