<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function getdata()
    {
        return view('welcome');
    }
    public function postSignUp(Request $request)
    {
        $request->validate([
            "email" => "required|max:100|unique:users",
            "name" => "required|max:150",
            "password" => "required|min:6"
        ]);
        $email = $request->input('email');
        $name = $request->input('name');
        $password = Hash::make($request->input('password'));

        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = $password;

        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');
    }
    public function postSignIn(Request $request)
    {
        $request->validate([
            "email" => "required|max:100",
            "password" => "required|min:6"
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back();
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('register');
    }
}
