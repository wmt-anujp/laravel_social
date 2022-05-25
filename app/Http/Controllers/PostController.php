<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPostFormRequest;
use App\Models\Country;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function yourpost()
    {
        $post = Post::orderBy('created_at', 'desc')->get()->where('user_id', Auth::user()->id);
        return view('posts.yourpost', array('user' => Auth::user(), 'post' => $post));
    }

    public function addpostform()
    {
        $country = Country::all();
        return view('posts.addnewpost', ['country' => $country]);
    }

    public function addnewpost(AddPostFormRequest $request)
    {
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->country_id = $request->post_country;
        $post->post_caption = $request->input('caption');
        $files = $request->file('post_image');
        $folder = "public/posts/User-" . Auth::user()->id . "_" . Auth::user()->username . '/';
        $filename = $files->getClientOriginalName();
        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0775, true, true);
        }
        $files->storeAs($folder, $filename);
        $post->media_path = $filename;
        $post->save();
        return redirect()->route('yourposts')->with('success', 'Post Created Successfully');
    }
}
