@extends('layouts.master2')

@section('title')
    Your Posts
@endsection

@section('content')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="container px-5 mb-5">
    <div class="row px-5 mt-5">
        <div class="col-12 col-md-2 mt-5">
            <img src="{{Auth::user()->profile_photo}}" alt="User_profile" width="150" height="150" class="rounded-circle">
        </div>
        <div class="col-12 col-md-8 mt-5">
            <h4 class="ms-md-5 mt-3">{{ Auth::user()->username }}</h4>
            <p class="ms-md-5">{{ Auth::user()->name }}</p>
        </div>
        <div class="col-12 col-md-2 mt-md-5 text-center">
            <a href="{{ route('add_post') }}" class="btn btn-primary mt-5">Add Post</a>
        </div>
    </div>

    <div class="row g-5 mt-5 justify-content-start">
        <div class="col-12">
            <form action="{{route('specificpost')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-2">
                        <select name="filter" id="filter" class="form-select" style="width: 150px">
                            <option value="all">All Post</option>
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Show</button>
                    </div>
               </div>
            </form>
        </div>
                    {{-- {{dd($media)}} --}}
                    {{-- @php
                    $path = $pst->media_path;
                    $tempextension = explode("/", $path);
                    $finalextension = explode('.', $tempextension[4]);
                    if ($finalextension[1] == "mp4" || $finalextension[1] == "ogg" || $finalextension[1] == "ogv" ||$finalextension[1] == "avi" || $finalextension[1] == "mpeg" || $finalextension[1] == "mov" ||$finalextension[1] == "wmv" || $finalextension[1] == "flv" || $finalextension[1] == "mkv") {
                        $media = 1;
                    } else {
                        $media = 2;
                    }
                    @endphp --}}
            @foreach ($post as $pst)
                @if ($pst->media_type===1)
                    <div class="col-12 col-md-3">
                        <a href="{{route('getpostdetails',['pid'=>$pst->id])}}">
                            <video autoplay loop muted width="200" height="200" style="border: 4px solid black">
                                <source src="{{$pst->media_path}}">
                            </video>
                        </a>
                    </div>
                @elseif($pst->media_type===2)
                    <div class="col-12 col-md-3">
                        <a href="{{route('getpostdetails',['pid'=>$pst->id])}}">
                            <img src="{{$pst->media_path}}" alt="Posts" width="200" height="200" style="border: 4px solid black">
                        </a>
                    </div>
                @endif
            @endforeach
    </div> 
</div>
@endsection