@extends('layouts.master2')
@section('title')
    Post Details
@endsection
@section('content')
<div class="container mt-5 mb-5">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card mb-3 mt-5" style="width: 540px;">
                <h3 class="text-center card-header">Post Details</h3>
                    <div class="row g-0">
                        <div class="col-md-5 showposts">
                            @if ($post->media_type==1)
                                <video autoplay loop muted width="200" height="200">
                                    <source src="{{$post->media_path}}">
                                </video>
                            @elseif($post->media_type==2)
                                <img src="{{$post->media_path}}" alt="post" width="200" height="200">
                            @endif
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <p class="card-text"><span class="post-caption" style="color: green">Caption: </span>{{$post->post_caption}}</p>
                                <p class="card-text"><span class="post-creation" style="color: green">Posted At: </span>{{$post->created_at->format('d/m/Y h:i:s A')}}</p>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="mt-4">
                <h4 style="color: green">All Comments</h4>
                <hr>
                @foreach ($comments as $comment)
                    <p><span style="color: green">Commented By: </span>{{$comment->user->name}}</p>
                    <p>{{$comment->comment}}</p>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection