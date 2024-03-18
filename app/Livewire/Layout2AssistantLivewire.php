<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Layout2AssistantLivewire extends Component
{
    public function render()
    {
        return view('livewire.layout2-assistant-livewire', ['profileImage' => User::where('id', auth()->user()->id)->first() ]);
    }
}
