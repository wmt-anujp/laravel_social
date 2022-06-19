<?php

use App\Http\Controllers\SubscriberController;
use App\Mail\NewMail;
use Illuminate\Support\Facades\Mail;
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

Route::get('subscribe', [SubscriberController::class, 'subscribe']);

Route::get('test', function () {
    $user = ['name' => 'Priyansh Gupta', 'info' => 'Security Analyst'];
    Mail::to('anuj_18505@ldrp.ac.in')->send(new NewMail($user));
    dd('Successfully sent mail');
});
