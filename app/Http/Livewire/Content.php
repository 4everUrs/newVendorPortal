<?php

namespace App\Http\Livewire;

use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;

class Content extends Component
{
    public $user_agent, $ips;
    public function render()
    {
        return view('livewire.content')->layout('welcome');
    }
    public function mount(Request $request)
    {
        $this->ips = $request->ip();
        $this->user_agent = $request->userAgent();
        Visitor::create([
            'ip' => $this->ips,
            'user_agent' => $this->user_agent,
            'month' => Carbon::parse(now())->format('M'),
            'year' => Carbon::parse(now())->format('Y'),
        ]);
    }
}
