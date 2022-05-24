<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function signuppage()
    {
        return view('signup');
    }

    public function usersignup(SignUpFormRequest $request)
    {
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $dob = $request->input('dob');
        $profileimg = $request->file('profile');
        // $user = new User();
        $user = User::create([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'dob' => $dob,
            'profile_photo' => $profileimg,
        ]);
        Auth::login($user);
        Session::put('logged', $email);
        return redirect()->route('dashboard')->with('success', 'Your Account has been created');
    }

    public function loginpage()
    {
        return view('login');
    }

    public function getdashboard()
    {
        return view('dashboard');
    }
}
