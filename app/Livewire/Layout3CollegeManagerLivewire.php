<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Layout3CollegeManagerLivewire extends Component
{
    public function render()
    {
        return view('livewire.layout3-college-manager-livewire', ['profileImage' => User::where('id', auth()->user()->id)->first() ]);
    }
}
