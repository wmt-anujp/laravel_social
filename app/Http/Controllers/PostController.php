<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Http\Requests\AddPostFormRequest;
use App\Http\Requests\EditPostFormRequest;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Post;
use App\Models\Like;
use App\Models\User;
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
        $user_id = Auth::user()->id;
        $country_id = $request->post_country;
        $post_caption = $request->input('caption');
        $files = $request->file('post_image');
        $filename = $files->getClientOriginalName();
        $folder = "public/posts/User-" . $user_id . "_" . Auth::user()->username;
        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0775, true, true);
        }
        $media_path = $files->storePubliclyAs($folder, $filename);

        if (substr($files->getMimeType(), 0, 5) == 'image') {
            $media_type = 2;
        } else {
            $media_type = 1;
        }
        Post::create([
            'user_id' => $user_id,
            'country_id' => $country_id,
            'post_caption' => $post_caption,
            'media_path' => $media_path,
            'media_type' => $media_type,
        ]);
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
            // $old_post_delete = explode("/", $old_post);
            // dd($old_post_delete);
            if (Storage::exists($old_post)) {
                Storage::delete($old_post);
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

    public function postlike(Request $request)
    {
        $post_id = $request['postId'];
        $user_id = $request['userId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        $user = User::find($user_id);
        if (!$post) {
            return null;
        }
        // $user = Auth::user()->id;
        $like = Like::select('*')->where('post_id', $post_id)->where('user_id', $user_id)->first();
        // dd($like);
        $user = Like::updateOrCreate(['post_id' => $post_id, 'user_id' => $user_id], ['like_dislike' => $is_like]);
        // dd($user);
        return true;
        if ($like) {
            $already_like = $like->like_dislike;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->user_id = $user->id;
        $like->post_id = $post_id;
        $like->like_dislike = $is_like;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }

    public function getuserfeed(Request $request)
    {
        $post = Post::with('country')->groupBy('country_id')->get();
        if ($request->country == 'all') {
            $posts = $post;
        } else {
            $posts = $post->where('country_id', $request->country);
        }
        return view('posts.feed', array('post' => $post, 'posts' => $posts));
    }

    public function feedpostdetails(Request $request, $id)
    {
        $postss = Post::find($id);
        return view('posts.feedpostdetails', ['postss' => $postss]);
    }
}
