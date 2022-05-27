<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Http\Requests\AddPostFormRequest;
use App\Http\Requests\EditPostFormRequest;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function yourpost(Request $request)
    {
        $post = Post::orderBy('created_at', 'desc')->where('user_id', Auth::user()->id)->get();
        return view('posts.yourpost', array('user' => Auth::user(), 'post' => $post));
    }

    public function specificpost(Request $request)
    {
        // dd($id);
        // $post = Post::orderBy('created_at', 'desc')->where('user_id', Auth::user()->id)->get();
        // $post = Post::all('media_path');
        // foreach ($post as $pst) {
        //     dd($pst->media_path);
        //     if ($id == 2) {
        //     }
        // }
        $user = Auth::user();

        if ($request->filter == 'all') {
            $post = Post::orderBy('created_at', 'desc')->where('user_id', $user->id)->get();
        } elseif ($request->filter == "image") {
            $post = Post::orderBy('created_at', 'desc')->where('user_id', Auth::user()->id)->where('media_type', 2)->get();
        } else {
            $post = Post::orderBy('created_at', 'desc')->where('user_id', $user->id)->where('media_type', 1)->get();
        }
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

        if (substr($files->getMimeType(), 0, 5) == 'image') {
            $post->media_type = 2;
        } else {
            $post->media_type = 1;
        }
        $post->save();
        return redirect()->route('yourposts')->with('success', 'Post Created Successfully');
    }

    public function getpostdetails($id)
    {
        $post = Post::find($id);
        // $comment = Comment::all();
        $comment = $post->comments;
        // dd($comment);
        // $comment = Comment::find($id);
        return view('posts.postdetails', ['post' => $post, 'comments' => $comment]);
    }

    public function deletepost($id)
    {
        $post = Post::find($id);
        if (isset($post)) {
            $old_post = $post->media_path;
            // dd($old_post);
            $old_post_delete = explode("/", $old_post);
            // dd($old_post_delete);
            if (Storage::exists('public/' . $old_post_delete[2] . "/" . $old_post_delete[3] . "/" . $old_post_delete[4])) {
                Storage::delete('public/' . $old_post_delete[2] . "/" . $old_post_delete[3] . "/" . $old_post_delete[4]);
            }
        }
        $post->delete();
        return redirect()->route('yourposts')->with('success', "Post Deleted");
    }

    public function getpostedit($id)
    {
        $post = Post::find($id);
        $country = Country::all();
        return view('posts.editpost', array('post' => $post, 'country' => $country));
    }

    public function postedit(EditPostFormRequest $request, $id)
    {
        $post = Post::find($id);
        $post->post_caption = $request->input('caption');
        $post->country_id = $request->post_country;
        $files = $request->file('post_image');
        $folder = "public/posts/User-" . Auth::user()->id . "_" . Auth::user()->username . '/';
        $filename = $files->getClientOriginalName();
        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0775, true, true);
        }
        $old_post = $post->media_path;
        // dd($old_post);
        $old_post_delete = explode("/", $old_post);
        // dd($old_post_delete);
        if (Storage::exists('public/' . $old_post_delete[2] . "/" . $old_post_delete[3] . "/" . $old_post_delete[4])) {
            Storage::delete('public/' . $old_post_delete[2] . "/" . $old_post_delete[3] . "/" . $old_post_delete[4]);
        }
        $files->storeAs($folder, $filename);
        if (substr($files->getMimeType(), 0, 5) == 'image') {
            $post->media_type = 2;
        } else {
            $post->media_type = 1;
        }
        $post->media_path = $filename;
        $post->update();
        return redirect()->route('getpostdetails', ['pid' => $post->id])->with('success', 'Post was Updated');
    }

    public function addComments(AddCommentRequest $request)
    {
        // dd('hello from comment');
        $comment = new Comment();
        // $comment['post_id'] = $this->Post::user()->id;
        $comment['post_id'] = $request['post_id'];
        $comment['user_id'] = Auth::user()->id;
        $comment['comment_body'] = $request->input('comment');
        // dd($comment);
        $comment->save();
        return back();
    }
}
