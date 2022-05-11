<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getDashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    }
    public function postCreatePost(Request $request)
    {
        $request->validate([
            'body' => 'required | max:1000'
        ]);
        $post = new Post();
        $post->body = $request->input('body');
        $message = 'There was an error while creating post';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post was created successfully';
        }
        return redirect()->route('dashboard')->with(['message' => $message]);
    }
    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Successfully Deleted']);
    }

    public function showcontent($post_id)
    {
        // $post = Post::where('id', $post_id)->first();
        $post = Post::find($post_id);
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        return view('editpost', ['body' => $post]);
    }

    public function updatePost(Request $request, $post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $request->validate([
            'body' => 'required | max:1000'
        ]);

        $post->body = $request->input('body');
        $message = 'There was an error while updating';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post was updated successfully';
        }
        return redirect()->route('dashboard')->with(['message' => $message]);
    }
}
