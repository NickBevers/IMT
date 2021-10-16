<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        return view('user');
    }

    public function signup() {
        return view('signup');
    }

    public function login() {
        return view('login');
    }

    public function handleLogin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        echo "login ok";

    }

    public function store(Request $request) {
        $user = new \App\Models\User();
        $user->first_name = $request->input('firstname');
        $user->last_name = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->wallet = $request->input('firstname'); // didn't knew what to put into
        $user->profile_picture = $request->input('profile_picture', 'ellen.png'); // default picture
        //$user->password_verify = $request->input('password_verify');
        $user->save();

    }
}

//Add failfase in case of no user