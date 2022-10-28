<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{

    public function render()
    {

        return view('livewire.register')->layout('auth.register');
    }
    public function create(Request $request)
    {
        $password = $request->validate([
            'password' => 'required|confirmed'
        ]);
        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->phone = $request->phone;
        $data->password = Hash::make($request['password']);
        $data->current_team_id = '38';
        $data->role_id = '3';
        $data->type = 'Client';
        $data->save();
        toastr()->addSuccess('Account Register Successfully');
        return redirect()->route('login');
    }
}
