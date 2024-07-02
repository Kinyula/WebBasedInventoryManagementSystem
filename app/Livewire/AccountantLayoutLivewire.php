<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class AccountantLayoutLivewire extends Component
{
    public function render()
    {
        return view('livewire.accountant-layout-livewire', ['profileImage' => User::where('id', auth()->user()->id)->first() ]);
    }
}
