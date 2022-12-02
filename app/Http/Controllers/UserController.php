<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function signup()
    {
        return view('signup');
    }

    // new signup
    public function usersignup(Request $request)
    {
        $request->validate([
            "email" => "required|max:100|unique:users",
            "password" => "required|min:6"
        ]);
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $user = User::create([
            'email' => $email,
            'password' => $password,
        ]);
        Auth::login($user);
        Session::put('logged', $email);
        return redirect()->route('dashboard')->with('success', 'You have successfully signed up');
    }

    public function userLogin()
    {
        return view('login');
    }

    public function usersignin(Request $request)
    {
        $request->validate([
            "email" => "required|max:100",
            "password" => "required|min:6"
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            Session::put('logged', $email);
            return redirect()->route('dashboard')->with('success', 'Login Successfull');
        }
        return redirect()->back()->with('error', 'Please enter valid credentials');
    }

    public function getdashboard()
    {
        return view('dashboard');
    }

    public function getLogout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }

    public function getAccount()
    {
        return view('account', ['user' => Auth::user()]);
    }
}
