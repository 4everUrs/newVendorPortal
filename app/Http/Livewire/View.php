<?php

namespace App\Http\Livewire;

use Livewire\Component;

class View extends Component
{
    public function render()
    {
        return view('livewire.view')->layout('welcome');
    }
}