@extends('layouts.master2')

@section('title')
    Edit Post
@endsection

@section('content')
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col mt-5">
            <h3 class="text-center">Edit Post</h3>
            <form action="{{route('postedit',['epid'=>$post->id])}}" method="POST" id="addpost" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="caption" class="form-label">Caption</label>
                    <textarea name="caption" class="form-control border-1" placeholder="Enter Some Caption for Your Post" id="caption" cols="30" rows="2">{{$post->post_caption}}</textarea>
                    @if ($errors->has('caption'))
                        <span class="text-danger">*{{ $errors->first('caption') }}</span>
                    @endif
                </div>

                <div class="mb-3 mt-3">
                    <label for="post_image" class="form-label">Post Image</label>
                    <input type="file" class="form-control border-1" name="post_image" id="post_image">
                    @if ($errors->has('post_image'))
                        <span class="text-danger">*{{ $errors->first('post_image') }}</span>
                    @endif
                </div>

                <div class="mb-3 mt-3">
                    <label for="post_country" class="form-label">Select Country</label>
                    <select name="post_country" id="post_country" class="form-select">
                        <option selected disabled>Select Country</option>
                        @foreach ($country as $cntry)
                            <option value="{{$cntry->id}}" @if ($post->country_id===$cntry->id){{'selected'}}@endif >{{$cntry->country_name}}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('post_country'))
                        <span class="text-danger">*{{ $errors->first('post_country') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update Post</button>
                <a href="{{route('getpostdetails',['pid'=>$post->id])}}" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection