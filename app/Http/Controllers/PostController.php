<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function postLikePost(Request $request)
    {
        $post_id = $request['post_id'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
}
