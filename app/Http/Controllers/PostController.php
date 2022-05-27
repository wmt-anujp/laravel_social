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
    public function yourpost()
    {
        $post = Post::orderBy('created_at', 'desc')->where('user_id', Auth::user()->id)->get();
        // $post->last()->media_path;
        // foreach ($post as $pst) {
        //     $pst[0]->media_path;
        // }
        // dd($pst);
        // dd($post[0]);
        // $path = $post->media_path;
        // $tempextension = explode("/", $path);
        // $finalextension = explode('.', $tempextension[4]);
        // if ($finalextension[1] == "mp4" || $finalextension[1] == "ogg" || $finalextension[1] == "ogv" || $finalextension[1] == "avi" || $finalextension[1] == "mpeg" || $finalextension[1] == "mov" || $finalextension[1] == "wmv" || $finalextension[1] == "flv" || $finalextension[1] == "mkv") {
        //     $media = 1;
        // } else {
        //     $media = 2;
        // }
        // dd($media_type);
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

    public function getpostdetails($id)
    {
        $post = Post::find($id);
        $comment = Comment::all();
        dd($post->comments);
        // $comment = Comment::find($id);
        // dd($comment);
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

    // public function getcomment($id)
    // {
    //     $post = Post::find($id);
    //     return view('posts.addcomment', ['post' => $post]);
    // }

    // public function addcomment(Request $request)
    // {
    //     $comment = new Comment();
    //     $comment['user_id'] = Auth::user()->id;
    //     $comment['post_id'] = $request->input('post_id');
    //     $comment['comment_body'] = $request->input('comment');
    //     // dd($comment);
    //     $comment->save();
    //     return redirect()->route('yourposts');
    // }
}
