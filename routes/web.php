<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\User\Auth\ULoginController;
use Illuminate\Auth\Events\Login;
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
    return view('welcome');
});

Route::namespace('Admin')->group(function () {
    Route::namespace('Auth')->middleware('guest')->group(function () {
        Route::get('adminlogin', [LoginController::class, 'index'])->name('login');
        Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [LoginController::class, 'getdashboard'])->name('admindashboard');
    });

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::namespace('User')->group(function () {
    Route::namespace('Auth')->middleware('guest')->group(function () {
        Route::get('userlogin', [ULoginController::class, 'index'])->name('userlogins');
        Route::post('user-login', [ULoginController::class, 'userlogin'])->name('userlogin');
    });

    Route::middleware('auth:user')->group(function () {
        Route::get('home', [ULoginController::class, 'gethome'])->name('userhome');
    });

    Route::get('logout', [ULoginController::class, 'logout'])->name('logout');
});
