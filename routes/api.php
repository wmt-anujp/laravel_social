<?php

use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\User\Auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('userlogin', function () {
    return response()->json([
        'name' => 'anuj',
        'surname' => 'panchal',
    ]);
});

Route::post('user-register', [UserController::class, 'userSignup']);
Route::post('admin-login', [AdminController::class, 'adminLogin']);
