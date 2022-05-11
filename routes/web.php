<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
})->name('register');

// for signup
// Route::get('/', [UserController::class, 'getdata'])->name('register');
Route::post('postsignup', [UserController::class, 'postSignUp'])->name('signup');
// Route::get('postsignup', [UserController::class, 'getdata'])->name('register');

// for login
Route::post('postsignin', [UserController::class, 'postSignIn'])->name('signin');

// for dashboard
Route::get('dashboard', [PostController::class, 'getDashboard'])->name('dashboard')->middleware('auth');

// logout
Route::get('logout', [UserController::class, 'getLogout'])->name('logout');

// for creating post
Route::post('/createpost', [PostController::class, 'postCreatePost'])->name('post.create')->middleware('auth');

// deleting post
Route::get('/delete-post/{post_id}', [PostController::class, 'getDeletePost'])->name('post.delete')->middleware('auth');

// show content in update post
Route::get('/editpost/{post_id}', [PostController::class, 'showcontent'])->name('editpost');

// update post
Route::post('/updatepost/{post_id}', [PostController::class, 'updatePost'])->name('updatepost');

// profile access
Route::get('account', [UserController::class, 'getAccount'])->name('account');

// update profile
Route::post('updateaccount', [UserController::class, 'postSaveAccount'])->name('account.save');

// image file access
Route::get('userimage/{filename}', [UserController::class, 'getUserImage'])->name('account.image');
