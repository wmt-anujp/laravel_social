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
        try {
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
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temprory server error.');
        }
    }

    public function userlogin(LoginFormRequest $request)
    {
        try {
            $email = $request->input('email');
            $password = $request->input('password');
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                Session::put('logged', $email);
                return redirect()->route('userfeed')->with('success', 'You are logged in successfully');
            }
            return redirect()->back()->with('error', 'Please enter valid credentials');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temprory server error.');
        }
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
        try {
            $user = Auth::user();
            $files = $request->file('profile');
            if (isset($files)) {
                $folder = 'profile';
                Storage::disk('public')->delete($user->profile_photo);
                $filename = $files->getClientOriginalName();
                $filepath = $files->storePubliclyAs($folder, $filename, 'public');
            } else {
                $filepath = $user->profile_photo;
            }
            User::where('id', $user->id)->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $user->email,
                'profile_photo' => $filepath,
            ]);
            return redirect()->route('useraccount')->with('success', 'Profile Updated');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temprory server error.');
        }
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