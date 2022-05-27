<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
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
Route::post('login', [UserController::class, 'userlogin'])->name('userlogin');

// logout
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('dashboard', [UserController::class, 'getdashboard'])->name('dashboard');

    // user account details
    Route::get('useraccount', [UserController::class, 'getuseraccount'])->name('useraccount');

    // edit account page
    Route::get('edit_account', [UserController::class, 'geteditaccountform'])->name('editaccountform');

    // edit account in database
    Route::post('editaccount', [UserController::class, 'editaccount'])->name('editaccount');

    // your posts section
    Route::get('your_post', [PostController::class, 'yourpost'])->name('yourposts');

    // add post form
    Route::get('add_post', [PostController::class, 'addpostform'])->name('add_post');

    // add new post database
    Route::post('addpost', [PostController::class, 'addnewpost'])->name('addnewpost');

    // show post details
    Route::get('postdetails/{pid}', [PostController::class, 'getpostdetails'])->name('getpostdetails');

    // delete user post
    Route::delete('deletepost/{dpid}', [PostController::class, 'deletepost'])->name('delpost');

    // edit post
    Route::get('post_edit/{epid}', [PostController::class, 'getpostedit'])->name('post_edit');

    // edit post in database
    Route::post('postedit/{epid}', [PostController::class, 'postedit'])->name('postedit');

    // comment 
    Route::post('comment', [PostController::class, 'addComments'])->name('comment');

    // specific post
    Route::post('your_post', [PostController::class, 'specificpost'])->name('specificpost');

    // like dislike
    Route::post('like', [PostController::class, 'postlike'])->name('like');
});
