<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

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

    // public function showcontent($post_id)
    // {
    //     $post = Post::where('id', $post_id)->first();
    //     $post = Post::find($post_id);
    //     if (Auth::user() != $post->user) {
    //         return redirect()->back();
    //     }
    //     return view('editpost', ['body' => $post]);
    // }

    // POST UPDATE STARTS
    public function updatePost(Request $request)
    {
        // $post = Post::where('id', $postid)->first();
        $request->validate([
            'body' => 'required | max:1000'
        ]);
        $post = Post::find($request['postId']);
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->update();
        // $updatemessage = 'There was an error while updating';
        // if ($request->user()->posts()->save($post)) {
        //     $updatemessage = 'Post was updated successfully';
        // }
        return response()->json(['new-body' => $post->body], 200);
        // return redirect()->route('dashboard')->with(json(['new-body' => $post->body], 200]));
    }
    // POST UPDATE ENDS

    // post like starts
    public function postLike(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        //$user = User::with('liked')->where('id', Auth::user()->id)->first();
        // return $user;
        // $user = Auth::user();
        // exit();
        //$like =  User::has('liked')->where('post_id', $post_id)->first();
        $like =  Like::select('*')->where('post_id', $post_id)->where('user_id', Auth::user()->id)->first();
        //dd($like);
        $user = Like::updateOrCreate(['post_id' => $post->id, 'user_id' => Auth::user()->id], [
            'like' => $is_like
        ]);
        // $like = new Like();
        // $like->like = $is_like;
        // $like->user_id = Auth::user()->id;
        // $like->post_id = $post->id;
        // $like->save();
        return true;
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
    // post like ends
}
