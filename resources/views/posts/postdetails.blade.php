@extends('layouts.master2')

@section('title')
    Post Details
@endsection

@section('content')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
    <div class="container mt-5 mb-5">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card mb-3 mt-5" style="width: 540px;">
                    <h3 class="text-center card-header">Post Details</h3>
                        <div class="row g-0">
                            <div class="col-md-5 showposts">
                                @if ($post->media_type==1)
                                    <video autoplay loop muted width="200" height="200">
                                        <source src="{{$post->media_path}}">
                                    </video>
                                @elseif($post->media_type==2)
                                    <img src="{{$post->media_path}}" alt="post" width="200" height="200">
                                @endif
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <p class="card-text"><span class="post-caption" style="color: green">Caption: </span>{{$post->post_caption}}</p>
                                    <p class="card-text"><span class="post-creation" style="color: green">Posted At: </span>{{$post->created_at->format('d/m/Y h:i:s A')}}</p>
                                    <div>
                                        <span><a href="{{route('post_edit',['epid'=>$post->id])}}" title="Edit" class="btn btn-sm btn-primary me-3"><i class="fa-solid fa-pencil"></i></a></span>
                                        {{-- <span><a href="{{route('delpost',['dpid'=>$post->id])}}" class="btn btn-sm btn-danger">Delete</a></span> --}}
                                        <form method="POST" action="{{route('delpost',['dpid'=>$post->id])}}" style="display:inline !important;">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE" style="display: inline !important;">
                                            <button type="submit" class="btn btn-sm btn-danger me-3" style="display: inline !important;" data-toggle="tooltip" title='Delete'><i class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </div>
                                    <div class="mt-3">
                                        <a href="" class="btn btn-sm btn-primary like" data-pid={{$post->id}} data-uid={{Auth::user()->id}} title="Like">Like</a>
                                        <a href="" class="btn btn-secondary btn-sm like" title="Dislike">Dislike</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div>
                    <form action="{{route('comment')}}" method="POST" id="comment">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <label for="comment">Add Comment</label>
                            <textarea class="form-control" name="comment" id="comment" rows="2" placeholder="Comment Here"></textarea>
                            <button type="submit" class="btn btn-primary mt-2">Comment</button>
                        </div>
                    </form>
                </div>
                <div class="mt-4">
                    <h4 style="color: green">All Comments</h4>
                    <hr>
                    @foreach ($comments as $comment)
                    <p><span style="color: green">Commented By: </span>{{$comment->user->name}}</p>
                    <p>{{$comment->comment_body}}</p>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- comment modal --}}
    {{-- <div class="modal fade" tabindex="-1" id="commentmodal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Comment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{route('comment')}}" method="POST" id="comment">
                  @csrf
                  <div class="form-group">
                      <textarea class="form-control" name="body" id="body" rows="5"></textarea>
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="modalsave">Comment</button>
            </div>
          </div>
        </div>
    </div> --}}
@endsection

@section('js')
    <script>
        var token='{{csrf_token()}}'
        var urlcomment='{{route('comment')}}'
        var urllike='{{route('like')}}'
    </script>
@endsection
