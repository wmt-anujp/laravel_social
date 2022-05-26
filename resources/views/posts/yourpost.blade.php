@extends('layouts.master2')

@section('title')
    Your Posts
@endsection

@section('content')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="container px-5">
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

    <div class="row g-5 mt-5 justify-content-center">
        {{-- <div class="col-12">
            <form action="" method="get">
                @csrf
               <div class="row">
                    <div class="col-10">
                        <select name="filter" id="filter" class="form-select">
                            <option value="all">All Post</option>
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
               </div>
            </form>
        </div> --}}
        @foreach ($post as $pst)
                <div class="col-12 col-md-3">
                    <a href="{{route('getpostdetails',['pid'=>$pst->id])}}"  class="show-post">
                        <img src="{{$pst->media_path}}" alt="Posts" width="200" height="200">
                    </a>
                </div>
        @endforeach
    </div> 
</div>
@endsection