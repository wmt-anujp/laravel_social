<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\SubscriberController;
use App\Mail\NewMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('subscribe', [SubscriberController::class, 'subscribe']);

Route::get('test', function () {
    $user = ['name' => 'Priyansh Gupta', 'info' => 'Security Analyst'];
    Mail::to('anuj_18505@ldrp.ac.in')->send(new NewMail($user));
    dd('Successfully sent mail');
});

Route::get('send-email', [MailController::class, 'sendEmail']);
