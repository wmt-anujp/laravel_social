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
        $user = new User();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->dob = $request->dob;
        $files = $request->file('profile');
        $folder = 'public/profile';
        $filename = $files->getClientOriginalName();
        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0775, true, true);
        }
        $files->storeAs($folder, $filename);
        $user->profile_photo = $filename;
        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Your account has been created successfully');
        // dd($user);
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
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $files = $request->file('profile');
        $folder = 'public/profile';
        $old_file = Auth::user()->profile_photo;
        // dd($old_file);
        $oldfiledelete = explode('/', $old_file);
        // dd($oldfiledelete[2] . '/' . $oldfiledelete[3]);
        if (Storage::exists('public/' . $oldfiledelete[2] . '/' . $oldfiledelete[3])) {
            Storage::delete('public/' . $oldfiledelete[2] . '/' . $oldfiledelete[3]);
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