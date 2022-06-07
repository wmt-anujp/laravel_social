<?php

use App\Http\Controllers\CountryController;
use App\Models\Country;
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
})->name('welomes');

Route::resource('display', CountryController::class);
Route::get('display', [CountryController::class, 'getData'])->name('getcountries');

Route::get('convert-to-json', function () {
    return Country::paginate(10);
});
