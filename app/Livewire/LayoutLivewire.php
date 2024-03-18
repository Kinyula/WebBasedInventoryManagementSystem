<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class LayoutLivewire extends Component
{

    function hey(){
        $this->modal('hey');
    }
    public function render()
    {
        return view('livewire.layout-livewire', ['profileImage' => User::where('id', auth()->user()->id)->first()]);
    }
}
