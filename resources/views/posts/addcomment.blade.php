@extends('layouts.master2')

@section('title')
    Add Comment
@endsection
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-success">Add Comments</h3>
                    <br/>
                    <p>
                        <img src={{ $post->media_path }} alt="" srcset="">
                    </p>
                    <p><span style="color: green">Caption:</span>
                    {{ $post->post_caption }}</p>
                    <hr>
                    <form method="post" action="{{route('comment')}}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="comment" id="comment" placeholder="Comment Here"></textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                        </div>
                        <div class="form-group mt-2">
                            <input type="submit" class="btn btn-success" value="Add Comment">
                            <a href="{{route('getpostdetails',['pid',$post->id])}}" type="button" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
