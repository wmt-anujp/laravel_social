<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    // $user = User::create(array(
    //     'name' => "test",
    //     'email' => 'email+1@gmail.com',
    //     'password' => bcrypt('test@123'),
    // ));

    /**
     * Mass Updates
     */
    // $userUpdate = User::where('id', 3)->update(array(
    //     'name' => 'test update'
    // ));

    // $userUpdate = User::find(3);
    // $userUpdate->update([
    //     'name' => 'observr update'
    // ]);

    $userDelete = User::where('id', 3)->delete();

    return view('welcome');
});
