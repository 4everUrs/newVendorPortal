<?php

namespace App\Http\Livewire;

use App\Models\VendorPo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Record extends Component
{
    public function render()
    {
        return view('livewire.record', [
            'pos' => VendorPo::where('user_id', '=', Auth::user()->id)->get(),
        ]);
    }
}
