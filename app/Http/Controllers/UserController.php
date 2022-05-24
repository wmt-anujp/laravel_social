<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
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

    public function loginpage()
    {
        return view('login');
    }

    public function getdashboard()
    {
        return view('dashboard');
    }

    public function usersignup(SignUpFormRequest $request)
    {
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $dob = $request->input('dob');
        $file = $request->file('profile');
        $filename = $file->getClientOriginalName();
        $user = new User();
        $user = User::create([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'dob' => $dob,
            'profile_photo' => $filename,
        ]);
        Auth::login($user);
        Session::put('logged', $email);
        return redirect()->route('dashboard')->with('success', 'Your Account has been created');
    }

    public function userlogin(LoginFormRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            Session::put('logged', $email);
            return redirect()->route('dashboard')->with('success', 'You are logged in successfully');
        }
        return redirect()->back()->with('error', 'Please enter valid credentials');
    }

    public function logout()
    {
        // if (Auth::check()) {
        Auth::logout();
        Session::flush();
        return redirect()->route('userlogin');
        // }
    }
}
