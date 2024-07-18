<?php

namespace App\Livewire;

use App\Models\ChasResource;
use Livewire\Component;
use Livewire\WithPagination;
class RepairAssetsLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.repair-assets-livewire',
    [
        'Repair' => ChasResource::with(['cate'])
    ]);
    }
}
