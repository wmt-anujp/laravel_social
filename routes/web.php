<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\TraitsController;
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
})->name('welcomes');

// Route::resource('signupform', TraitsController::class);

Route::resource('display-data', DataController::class);

// Route::get('traits', [TraitsController::class, 'getTraits'])->name('traits');

// Route::get("list-products", [DataController::class, 'listProducts']);
// Route::get("list-blogs", [DataController::class, 'listBlogs']);
