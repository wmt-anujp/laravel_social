<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Models\Author;
use App\Models\Book;
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

// signup
Route::get('signup', [UserController::class, 'signup'])->name('signup')->middleware('access');
Route::post('signup', [UserController::class, 'usersignup'])->name('signup');

// login
Route::get('login', [UserController::class, 'userLogin'])->name('login')->middleware('access');
Route::post('signin', [UserController::class, 'usersignin'])->name('signin');

// logout
Route::get('logout', [UserController::class, 'getLogout'])->name('logout');

Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('dashboard', [UserController::class, 'getdashboard'])->name('dashboard');

    // account
    Route::get('account', [UserController::class, 'getaccount'])->name('account');

    // navbar author access
    Route::get('authorlist', [AuthorController::class, 'authorspage'])->name('addauthor');

    // addauthor button access
    Route::get('addauthor', [AuthorController::class, 'addauthorform'])->name('addauthorform');

    // adding author to database
    Route::post('addnewauthor', [AuthorController::class, 'addnewauthor'])->name('addnewauthor');

    // for author delete
    Route::get('deleteauthor/{authrdelid}', [AuthorController::class, 'authordelete'])->name('deleteauthor');

    // showing author details modal
    Route::post('authors/authordetails', [AuthorController::class, 'authordetails'])->name('authordetails');

    //navbar access of books
    Route::get('bookslist', [BookController::class, 'booklist'])->name('bookslist');

    // addbook form access
    Route::get('addbookform', [BookController::class, 'addbookform'])->name('addbookform');

    // adding book to database
    Route::post('addnewbook', [BookController::class, 'addnewbook'])->name('addnewbook');

    // delete book
    Route::get('deletebook/{bookdelid}', [BookController::class, 'bookdelete'])->name('deletebook');

    // full book details
    Route::post('bookdetails', [BookController::class, 'bookdetails'])->name('bookdetails');
});
