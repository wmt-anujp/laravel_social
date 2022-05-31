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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection