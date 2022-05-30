@extends('layouts.master2')

@section('title')
    Post Details
@endsection

@section('content')
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card mb-3 mt-5" style="width: 540px;">
                <h3 class="text-center card-header">Post Details</h3>
                <div class="row g-0">
                    <div class="col-md-6 showposts">
                        @if ($postss->media_type == 2)
                            <img src="{{$postss->media_path}}}" alt="post_image" width="200" height="200">
                        @elseif ($postss->media_type == 1)
                            <video autoplay loop muted width="200" height="200">
                                <source src="{{$postss->media_path}}}}">
                            </video>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <p class="card-text"><span class="post-caption">Caption: {{ $postss->post_caption }}</span></p>
                            <p class="card-text"><span class="post-creation">Posted On: {{ $postss->created_at->format('d/m/Y h:i:s A') }}</span></p>
                            {{-- <div class="d-flex flex-row justify-content-start">
                                @if($post->is_liked_by_auth_user())
                                    <a href="{{route('reply.dislike',['id'=>$post->id])}}" class="fa-solid fa-thumbs-down text-decoration-none  text-dark mt-2 ms-1 me-1" style="font-size:20px"></a>
                                @else
                                    <a href="{{route('reply.like',['id'=>$post->id])}}" class="fa-solid fa-thumbs-up text-decoration-none  text-dark mt-2 ms-1 me-1" style="font-size:20px"></a>
                                @endif
                                <a href="{{route('showcommentform',['cid'=>$post->id])}}" class="btn ms-3"><i class="fa-solid fa-comments"></i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection