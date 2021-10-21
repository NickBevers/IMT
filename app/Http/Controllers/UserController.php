<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use Cloudinary;

class UserController extends Controller
{
    public function index() {
        $data['title'] = "Profile";
        return view('user', $data);
    }

    public function signup() {
        $data['title'] = "Sign up";
        return view('signup', $data);
    }

    public function login() {
        $data['title'] = "Log in";
        return view('login', $data);
    }

    public function handleLogin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {
            return redirect('/');
        } else {
            $request->flash();
            $request->session()->flash('messageAuth', 'Login not succesful😪');
            return redirect('login');
        }

    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect('login');
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = new \App\Models\User();
        $user->first_name = $request->input('firstname');
        $user->last_name = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->wallet = $request->input('firstname'); // didn't knew what to put into
        $user->profile_picture = $request->input('profile_picture', 'ellen.png'); // default picture
        //$user->password_verify = $request->input('password_verify');
        $user->save();
        
        $request->flash();
        $request->session()->flash('message', 'Successfully registered🎉');
        
        return redirect('login');

    }

    public function edit(Request $request) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
        ]);
        $user =Auth::user();

        // $uploadedFileUrl = Cloudinary::upload($request->file("profilePicture")->getRealPath())->getSecurePath();

        $user->first_name = $request['firstname'];
        $user->last_name = $request['lastname'];
        $user->email = $request['email'];
        // $user->profile_picture = $uploadedFileUrl;
        
        $user->update();
        
        return redirect('user');
    }
}

//Add failsafe in case of no user