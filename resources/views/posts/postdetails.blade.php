@extends('layouts.master2')

@section('title')
    Post Details
@endsection

@section('content')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card mb-3 mt-5" style="width: 540px;">
                    <h3 class="text-center card-header">Post Details</h3>
                        <div class="row g-0">
                            <div class="col-md-5 showposts">
                                {{-- {{dd($post->id)}}; --}}
                                <img src="{{$post->media_path}}" alt="post" width="200" height="200">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <p class="card-text"><span class="post-caption" style="color: green">Caption: </span>{{$post->post_caption}}</p>
                                    <p class="card-text"><span class="post-creation" style="color: green">Posted At: </span>{{$post->created_at->format('d/m/Y h:i:s A')}}</p>
                                    <div class="">
                                        <span><a href="{{route('post_edit',['epid'=>$post->id])}}" class="btn btn-sm btn-primary me-3">Edit Post</a></span>
                                        {{-- <span><a href="{{route('delpost',['dpid'=>$post->id])}}" class="btn btn-sm btn-danger">Delete</a></span> --}}
                                        <form method="POST" action="{{route('delpost',['dpid'=>$post->id])}}" style="display:inline !important;">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE" style="display: inline !important;">
                                            <button type="submit" class="btn btn-sm btn-danger" style="display: inline !important;" data-toggle="tooltip" title='Delete'>Delete Post</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
