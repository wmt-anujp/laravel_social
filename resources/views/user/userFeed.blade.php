@extends('layouts.master2')
@section('title')
    Feed
@endsection
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="container px-5 mt-5">
    <div class="row mt-5 justify-content-start">
        <div class="mt-5">
                <form action="{{route('user.Feed')}}" method="get">
                    {{-- @csrf --}}
                    <div class="row">
                        <div class="col-2 me-4">
                            <select class="form-select d-inline" style="width: 200px" name="sorting" id="sorting">
                                <option disabled selected>Select Sorting</option>
                                    <option value="created_at" @if ("created_at"===$params) selected @endif>Created At
                                    </option>
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">Sort</button>
                        </div>
                    </div>
                </form>
        </div>
        @if (count($allpost)>0)
            @foreach ($allpost as $posts)
                @if ($posts->media_type===2)
                    <div class="col-12 col-md-3 mt-5 postBox">
                        <span style="color: green">Caption: </span>{{ $posts->post_caption }}
                        <a href="{{route('post.show',['post'=>$posts->id])}}">
                            <img src="{{$posts->media_path}}" alt="post-images" width="200" height="200" style="border: 4px solid lightblue">
                        </a>
                        <p>
                            <span style="color: green">Posted By: </span>{{$posts->user->name}} {!!'<br>On '.$posts->created_at->format('d-m-Y h:i:s A')!!}<br>
                            {{-- ---------------------------Like------------------------------------- --}}
                            {{dd($like[1]->post_Likes)}}
                            
                            <input data-user={{$user->id}} data-post={{$posts->id}} class="toggle-class" type="checkbox" data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Like" data-off="Unlike" {{ $like[0]->post_Likes ? 'checked' : '' }}>

                            {{-- ---------------------------Like------------------------------------- --}}
                            <a href="" data-post={{$posts->id}} data-user={{$user->id}} class="btn btn-secondary commentbtn">Comment</a>
                        </p>
                    </div>
                @elseif($posts->media_type===1)
                    <div class="col-3 col-md-3 mt-5">
                        <span style="color: green">Caption: </span>{{ $posts->post_caption }}
                        <a href="{{route('post.show',['post'=>$posts->id])}}">
                            <video autoplay loop muted width="200" height="200" style="border: 4px solid lightblue">
                                <source src="{{$posts->media_path}}">
                            </video>
                        </a>
                        <p>
                            <span style="color: green">Posted By: </span>{{$posts->user->name}} {!!'<br>On '.$posts->created_at->format('d-m-Y h:i:s A')!!}<br>
                            {{-- ---------------------------Like------------------------------------- --}}

                            <input data-user={{$user->id}} data-post={{$posts->id}} class="toggle-class" type="checkbox" data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Like" data-off="Unlike" {{ $like[0]->post_Likes ? 'checked' : '' }}>

                            {{-- ---------------------------Like------------------------------------- --}}
                            <a href="" data-post={{$posts->id}} data-user={{$user->id}} class="btn btn-secondary commentbtn" >Comment</a>
                        </p>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
    <div class="row">
        @if(count($allpost)>0)
        <p class="text-center mt-4 mb-5"><button class="load-more btn btn-dark" data-totalResult="{{ App\Models\User\Post::count() }}">Load More</button></p>
        @endif
    </div>
</div>
    {{-- comment modal starts--}}
    <div class="modal fade" tabindex="-1" id="cmntmodal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Comment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="cmntform">
                    @csrf
                    <div class="form-group">
                        <label for="comment">Add Comment</label>
                        <textarea class="form-control" name="comment" placeholder="Enter Comment" id="comment" rows="5"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="modalsave">Add Comment</button>
            </div>
          </div>
        </div>
    </div>
    {{-- comment modal ends --}}
@endsection
@section('js')
    <script>
        var token="{{csrf_token()}}";
        var urlComment="{{route('add.Comment')}}";
    </script>
    <script>
        var like, userId, postId;
        $('.toggle-class').change(function(){
            like=$(this).prop('checked')===true?0:1
            // like=$(this).val();
            console.log(like);
            userId= $(this).data('user');
            postId=$(this).data('post');
            $.ajax({
                type:"GET",
                dataType:"json",
                url:"{{route('add.Like')}}",
                data:{
                    like:like,
                    userId:userId,
                    postId:postId,
                },
                success: function(data){
                    console.log(data);
                    // alert('Liked post');
                },
                error:function(error){
                    console.log(error);
                    // alert('Didn\'t liked this post');
                }
            });
        });
    </script>
    <script src="{{URL::to('src/js/User/commentModal.js')}}"></script>
    <script src="{{URL::to('src/js/User/loadMoreData.js')}}"></script>
@endsection