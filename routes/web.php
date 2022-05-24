<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('signup');
});

// new account route
Route::get('signup', [UserController::class, 'signuppage'])->name('signuppage')->middleware('access');
Route::post('signup', [UserController::class, 'usersignup'])->name('usersignup');

// login
Route::get('login', [UserController::class, 'loginpage'])->name('loginpage')->middleware('access');
Route::post('login', [UserController::class, 'userlogin'])->name('login');

Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('dashboard', [UserController::class, 'getdashboard'])->name('dashboard');
});
