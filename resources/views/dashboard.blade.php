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
    {{-- Create POST starts --}}
    <section class="row new post">
        <div class="col-md-6 col-md-offset-3">
            <header class="my-4" style="color: lightgreen"><h3>What do you have to say?</h3></header>
                <form action="{{route('post.create')}}" method="post" id="createpost">
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
    {{-- Create Post ENDS --}}

    {{-- Post Display Starts --}}
    <section class="row_posts">
        <div class="col-md-6 col-md-3-offset">
            <header class="my-3" style="color: lightgreen"><h3>What other people say</h3></header>
            @foreach ($posts as $post)
                <article class="post" data-anuj={{ $post->id }}>
                    <h4 class="mt-4" style="color: blueviolet">Description:</h4>
                    <p>{{$post->body}}</p>
                    <div class="info">
                        <small>Posted by {{$post->user->name}} on {{$post->updated_at->format('d/m/Y h:i:s A')}}</small>
                    </div>
                    <div class="interaction">
                        <a href="" class="btn btn-sm btn-primary like">{{Auth::user()->liked()->where('post_id',$post->id)->first() ? Auth::user()->liked()->where('post_id',$post->id)->first()->like == 1 ? 'You liked this Post':'Like': 'Like'}}</a>
                         |
                        <a href="" class="btn btn-secondary btn-sm like">{{Auth::user()->liked()->where('post_id',$post->id)->first() ? Auth::user()->liked()->where('post_id',$post->id)->first()->like == 0 ? 'You disliked this Post':'Dislike': 'Dislike'}}</a>
                        @if (Auth::user()==$post->user)
                            |
                            <a href="" class="btn btn-sm btn-success edit">Edit</a> |
                            <a href="{{route('post.delete',['post_id'=>$post->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    {{-- Post Display Ends --}}

    {{-- edit modal starts--}}
    <div class="modal fade" tabindex="-1" id="editmodal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Post</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" id="posteditform">
                  @csrf
                  {{-- <input type="hidden" id="id" name="id" /> --}}
                  <div class="form-group">
                      <label for="body">Edit the Post</label>
                      <textarea class="form-control" name="body" id="body" rows="5"></textarea>
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="modalsave">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      {{-- edit modal ends --}}


{{-- <script>
    function posteditfunction(id) { 
        $.get('post/'+id, function(post){
            $("#edit").val(post_id);
            $("#posteditmodal").modal("hide");
        })
     }
</script> --}}

@endsection
@section('pagejs')
    <script>
        var token = '{{ csrf_token() }}';
        var urlEdit='{{route('edit')}}';
        var urlLike = '{{ route('like') }}';
    </script>
@endsection
</body>
</html>