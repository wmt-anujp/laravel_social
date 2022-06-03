<?php

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

use App\Comment;
use App\Like;
use App\Post;
use App\Tag;
use App\User;

Route::get('/', function () {

    $user = User::with(['profile', 'posts'])->get();

    /**
     * Has One
     */
    $temp = User::where('id', 1)->first();
    $profile = $temp->profile;

    /**
     * Belong To
     */
    $belongTo = Post::with('user')->get();
    $Post = Post::where('id', 1)->with(['user'])->first();
    $singlePost = Post::where('id', 1)->with(['user.profile'])->first();


    /**
     * Has Many
     */
    $hasMany = User::where('id', 1)->first()->posts;
    // dd($hasMany);

    /**
     * Many to Many
     */
    $manyToMany = Post::with('tags')->get();
    // dd($manyToMany);


    // users->posts->comments
    $user = User::with('posts.comments')->get();
    // dd($user);

    // 1 user->1 post->all comments
    $userc = User::where('id', 1)->with('post.comments')->first();
    // dd($userc);

    // 1 user->posts->comments
    $userco = User::where('id', 1)->with('posts.comments')->first()->toArray();
    // dd($userco);

    // 1 post->likes
    $likes = Post::where('id', 1)->with('likes')->first();
    // dd($likes);

    // 1 user how much posts
    // $uspt = User::where('id', 1)->get();
    $uspt = User::where('id', 1)->withCount('posts')->get();
    // dd($uspt);

    // like->user
    $uslike = Like::where('id', 1)->with('user')->get();
    // dd($uslike);

    // likes->user
    $likeus = Like::where('id', 2)->with('post')->get();
    // dd($likeus);


    // tags->post
    $tags = Tag::with('posts')->get();
    // dd($tags);

    // 1 comments->posts
    $commts = Comment::where('id', 2)->with('post')->first();
    // dd($commts);

    // comments->posts
    // $cmt = Comment::get()->with('post');
    // dd($cmt);


    // return view('welcome');
});

Route::namespace('Admin')->group(function () {
    Route::namespace('Auth')->middleware('guest')->group(function () {
        Route::get('/login', 'LoginController@index');
        Route::post('/admin/login', 'LoginController@login')->name('admin.login');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/admin/dashboard', 'Auth\LoginController@home')->name('admin.home');
    });
});
