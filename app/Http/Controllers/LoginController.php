<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::user()->role_id != 3) {
            Auth::logout();
            Session::flush();
            return redirect('/login')->withErrors(['msg' => 'Invalid Credentials']);
        } else {
            return redirect('/home');
        }
    }
}
