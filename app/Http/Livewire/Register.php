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
        // $data = $this->validate($request, [
        //     'name' => 'required|string',
        //     'email' => 'required|email',
        //     'phone' => 'required"integer',
        //     'password' => 'required|confirmed',
        //     'current_team_id' => 'required',
        //     'role_id' => 'required'
        // ]);
        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->phone = $request->phone;
        $data->password = Hash::make($request->password);
        $data->current_team_id = $request->current_team_id;
        $data->role_id = $request->role_id;
        $data->save();
        toastr()->addSuccess('Account Register Successfully');
        return redirect()->route('login');
    }
}
