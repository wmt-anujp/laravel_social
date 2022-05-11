<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
</head>
<body>

@extends('layouts.master')
@include('includes.message-block')
@section('content')
    <section class="row new post">
        <div class="col-md-6 col-md-offset-3">
            <header class="my-3" style="color: lightgreen"><h3>Update Post</h3></header>
                <form action="{{route('updatepost',['post_id'=>$body->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Write here to Post!">{{$body->body}}</textarea>
                        @if ($errors->has('body'))
                            <p><span class="text-danger">{{$errors->first('body')}}*</span></p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary my-2">Update Post</button>
                </form>
        </div>
    </section>
@endsection
    
</body>
</html>