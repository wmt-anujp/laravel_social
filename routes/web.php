<?php

use App\Http\Controllers\Admin\AdminContoller;
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
    return view('welcome');
})->name('welcome');

Route::resource('user',UserController::class);
// Route::get('status', [UserController::class, 'getStatus'])->name('get.status');

// Route::resource('user',AdminContoller::class);


