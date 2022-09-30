<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Content extends Component
{
    public function render()
    {
        return view('livewire.content')->layout('welcome');
    }
}