<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Session;

class UserController extends Controller
{

    public function getdata()
    {
        return view('welcome');
    }

    public function userLogin()
    {
        return view('login');
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

    public function getAccount()
    {
        return view('account', ['user' => Auth::user()]);
    }

    public function postSaveAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|max:120'
        ]);
        $user = Auth::user();
        $user->name = $request['name'];
        User::where('id', $user->id)->update(['name' => $user->name]);
        $file = $request->file('image');
        $filename = $request['name'] . '-' . $user->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect()->route('account');
    }

    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
}
