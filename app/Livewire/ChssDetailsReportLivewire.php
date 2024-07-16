<?php

namespace App\Livewire;

use App\Models\ChssResource;
use Livewire\Component;
use Livewire\WithPagination;

class ChssDetailsReportLivewire extends Component
{
    public $chssDetailSearch = '';
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    
    public function render()
    {
        return view('livewire.chss-details-report-livewire',

        [
            'Details' => ChssResource::search($this->chssDetailSearch)->with(['category'])->paginate(15),
        ]

);
    }
}
