<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{
    public function signup()
    {
        return view('signup');
    }

    public function userLogin()
    {
        return view('login');
    }

    public function usersignup(Request $request)
    {
        $request->validate([
            "email" => "required|max:100|unique:users",
            "password" => "required|min:6"
        ]);
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        // $user = $request->all();
        $user = new User();
        $user->email = $email;
        $user->password = $password;
        $user->save();
        // User::create($user);
        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'You have successfully signed up');
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
            return redirect()->route('dashboard')->with('success', 'Login Successfull');
        } else {
            return redirect()->back()->with('error', 'Please enter valid credentials');
        }
    }

    public function getdashboard()
    {
        return view('dashboard');
    }

    public function getLogout()
    {
        Auth::logout();
        session::flush();
        return redirect()->route('signup');
    }

    public function getAccount()
    {
        return view('account', ['user' => Auth::user()]);
    }
}
