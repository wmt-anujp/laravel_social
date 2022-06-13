@extends('layouts.master2')
@section('title')
    Your Posts
@endsection
@section('csrf')
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
@endsection

@section('content')
<div class="container px-5 mb-5">
    <div class="row mt-5">
        <div class="col-md-12">
            <a href="{{route('post.index')}}" class="btn btn-primary mt-5">New Post</a>
        </div>
    </div>
    <div class="row g-2 mt-5 justify-content-start">
            @foreach ($post as $pst)
                @if ($pst->media_type===1)
                    <div class="col-12 col-md-3">
                        <a href="">
                            <video autoplay loop muted width="200" height="200" style="border: 4px solid black">
                                <source src="{{$pst->media_path}}">
                            </video>
                        </a>
                        <p><span style="color: green">Caption: </span>{{$pst->post_caption}}</p>
                    </div>
                @elseif($pst->media_type===2)
                    <div class="col-12 col-md-3">
                        <a href="">
                            <img src="{{$pst->media_path}}" alt="Posts" width="200" height="200" style="border: 4px solid black">
                        </a>
                        <p><span style="color: green">Caption: </span>{{$pst->post_caption}}</p>
                    </div>
                @endif
            @endforeach
    </div>
</div>
@endsection