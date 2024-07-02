<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class SuperAdminLayoutLivewire extends Component
{
    public function render()
    {
        return view('livewire.super-admin-layout-livewire', ['profileImage' => User::where('id', auth()->user()->id)->first(),

    ]);
    }
}
