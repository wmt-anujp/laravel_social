<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>

@extends('layouts.master')
@include('includes.message-block')
@section('content')
    <section class="row new post">
        <div class="col-md-6 col-md-offset-3">
            <header class="my-4" style="color: lightgreen"><h3>What do you have to say?</h3></header>
                <form action="{{route('post.create')}}" method="post" id="">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Write here to Post!"></textarea>
                        @if ($errors->has('body'))
                            <p><span class="text-danger">{{$errors->first('body')}}*</span></p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary my-2">Create Post</button>
                </form>
        </div>
    </section>
    <section class="row_posts">
        <div class="col-md-6 col-md-3-offset">
            <header class="my-3" style="color: lightgreen"><h3>What other people say</h3></header>
            @foreach ($posts as $post)
                <article class="post" >
                    <p><h5 style="color: lightpink">Post Description:</h5>{{$post->body}}</p>
                    <div class="info">
                        <small>Posted by {{$post->user->name}} on {{$post->updated_at->format('d/m/Y h:i:s A')}}</small>
                    </div>
                    <div class="interaction">
                        <a href="" class="btn btn-sm btn-secondary">Like</a> |
                        <a href="" class="btn btn-secondary btn-sm">Dislike</a>
                        @if (Auth::user()==$post->user)
                            |
                            <a href="{{route('editpost',['post_id'=>$post->id])}}" class="btn btn-secondary btn-sm">Edit</a> |
                            <a href="{{route('post.delete',['post_id'=>$post->id])}}" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>


    {{-- edit modal --}}
    {{-- <div class="modal fade" tabindex="-1" id="editmodal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Post</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="">
                  <div class="form-group">
                      <label for="post-body">Edit the Post</label>
                      <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="modalsave">Save changes</button>
            </div>
          </div>
        </div>
      </div> --}}
@endsection
</body>
</html>