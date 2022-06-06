<?php

use App\Http\Controllers\Admin\Auth\adminController;
use App\Http\Controllers\Buyer\Auth\buyerController;
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

Route::namespace('Admin')->middleware('backbutton')->group(function () {
    Route::namespace('Auth')->middleware('guest')->group(function () {
        Route::get('admin-Login', [adminController::class, 'index'])->name('login');
        Route::post('admin-Login', [adminController::class, 'adminLogin'])->name('admin.Login');
        Route::get('admin-Logout', [adminController::class, 'adminLogout'])->withoutMiddleware('guest')->name('admin.Logout');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('admin-Dashboard', [adminController::class, 'getAdminDashboard'])->name('admin.Dashboard');
    });
});

Route::namespace('Buyer')->middleware('backbutton')->group(function () {
    Route::namespace('Auth')->middleware('guest')->group(function () {
        Route::get('buyer-Login', [buyerController::class, 'index'])->name('buyer.Logins');
        Route::post('buyer-Login', [buyerController::class, 'buyerLogin'])->name('buyer.Login');
        Route::get('buyer-Logout', [buyerController::class, 'buyerLogout'])->withoutMiddleware('guest')->name('buyer.Logout');
    });

    Route::middleware('buyersauth:buyer')->group(function () {
        Route::get('buyer-home', [buyerController::class, 'getHome'])->name('buyer.home');
    });
});
