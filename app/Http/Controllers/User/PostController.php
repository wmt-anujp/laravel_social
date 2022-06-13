<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\NewPostFormRequest;
use App\Http\Traits\ImageTrait;
use App\Models\User\Comment;
use App\Models\User\Like;
use App\Models\User\Post;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('user.userNewPost');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewPostFormRequest $request)
    {
        try {
            $file = $request->file('media');
            if (substr($file->getMimeType(), 0, 5) == 'image') {
                $media_type = 2;
            } else {
                $media_type = 1;
            }
            $folder = 'User-' . Auth::guard("user")->id();
            $media = $this->imageUpload($request, 'media', $folder);
            Post::create([
                'user_id' => Auth::guard('user')->id(),
                'post_caption' => $request->caption,
                'media_path' => $media,
                'media_type' => $media_type,
            ]);
            return redirect()->route('user.Post')->with('success', 'Posted Successfully');
        } catch (\Exception $exception) {
            // dd($exception);
            return redirect()->back()->with('error', 'Temprary Server Error.');
        }
    }

    public function newComment(Request $request)
    {
        try {
            if (!Auth::guard('user')->user()) {
                return back();
            }
            Comment::create([
                'user_id' => $request->userId,
                'post_id' => $request->postId,
                'comment' => $request->comment,
            ]);
            return redirect()->back()->with('success', 'Comment Added');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Comment Not added.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        $comment = $posts->comment;
        return view('user.userPostDetails', ['post' => $posts, 'comments' => $comment]);
    }

    public function userLike(Request $request)
    {
        try {
            // dd("enter");
            Like::create([
                'user_id' => $request->userId,
                'post_id' => $request->postId,
                'post_Likes' => $request->like,
            ]);
            return back()->with('success', 'Post liked');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Like Not added.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
