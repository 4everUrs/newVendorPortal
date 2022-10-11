<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterUserController extends Controller
{
    public function create(Request $request)
    {

        $validatedData = Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => 'required|string',
            'current_team_id' => 'required',
            'role_id' => 'required',
            'password' => 'required|confirmed',

        ])->validate();
        dd($validatedData);
        User::create($validatedData);
    }
}
