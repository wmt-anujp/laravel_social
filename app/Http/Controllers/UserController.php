<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditAccountFormRequest;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\SignUpFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        $dob = $request->dob;
        $files = $request->file('profile');
        $filename = $files->getClientOriginalName();
        $folder = 'public/profile';
        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0775, true, true);
        }
        $filepath = $files->storePubliclyAs($folder, $filename);
        $user = User::create([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'dob' => $dob,
            'profile_photo' => $filepath,
        ]);
        Auth::login($user);
        return redirect()->route('yourposts')->with('success', 'Your account has been created successfully');
    }

    public function userlogin(LoginFormRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            Session::put('logged', $email);
            return redirect()->route('userfeed')->with('success', 'You are logged in successfully');
        }
        return redirect()->back()->with('error', 'Please enter valid credentials');
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            Session::flush();
            return redirect()->route('userlogin');
        }
    }

    public function getuseraccount()
    {
        return view('useraccount', ['user' => Auth::user()]);
    }

    public function geteditaccountform()
    {
        return view('editaccount', ['user' => Auth::user()]);
    }

    public function editaccount(EditAccountFormRequest $request)
    {
        $user = Auth::user();
        dd($request->all());
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $files = $request->file('profile');
        $folder = 'public/profile';
        $old_file = Auth::user()->profile_photo;
        $oldfiledelete = explode('/', $old_file);
        if (Storage::exists('public/' . $oldfiledelete[1] . '/' . $oldfiledelete[2])) {
            Storage::delete('public/' . $oldfiledelete[1] . '/' . $oldfiledelete[2]);
        }
        $filename = $files->getClientOriginalName();
        if (Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0775, true, true);
        }
        $files->storeAs($folder, $filename);
        $user->profile_photo = $filename;
        $user->update();
        return redirect()->route('useraccount')->with('success', 'Profile Updated');
    }
}
// $user = User::create([
        //     'name' => $name,
        //     'username' => $username,
        //     'email' => $email,
        //     'password' => $password,
        //     'dob' => $dob,
        //     'profile_photo' => $filename,
        // ]);