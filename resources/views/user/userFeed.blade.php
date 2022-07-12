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
                    <div class="row">
                        <div class="col-2 me-4">
                            <select class="form-select d-inline" style="width: 200px" name="sorting" id="sorting">
                                <option disabled selected>Select Sorting</option>
                                    <option value="created_at_accending" @if ("created_at_accending"===$params) selected @endif>Created By Ascending order</option>
                                    <option value="created_at_descending" @if ("created_at_descending"===$params) selected @endif>Created By Descending order</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">{{__('message.Sort')}}</button>
                        </div>
                    </div>
                </form>
        </div>
        {{-- @if (count($allpost)>0) --}}
        <div class="d-flex flex-wrap">
            {{-- {{dd($allpost)}} --}}
        @foreach ($allpost as $posts)
                @if ($posts->media_type===2)
                    <div class="col-12 col-md-3 mt-5 postBox" id="postdiv">
                        <span style="color: green">Caption: </span>{{ $posts->post_caption }}
                        <a href="{{route('post.show',['post'=>$posts->id])}}">
                            <img src="{{$posts->media_path}}" alt="post-images" width="200" height="200" style="border: 4px solid lightblue">
                        </a>
                        <p>
                            <span style="color: green">Posted By: </span>{{$posts->user->name}} {!!'<br>On '.$posts->created_at->format('d-m-Y h:i:s A')!!}<br>
                            {{-- ---------------------------Like starts------------------------------------ --}}
                            
                            <input data-user={{$user->id}} data-post={{$posts->id}} class="toggle-classs" type="checkbox" data-onstyle="danger" data-offstyle="primary" data-toggle="toggle" data-on={{__("message.Unlike")}} data-off={{__("message.Like")}} @foreach ($posts->UserLikes as $p) {{ $p->pivot->post_Likes ? 'checked' : '' }} @endforeach>

                            {{-- ---------------------------Like  ends------------------------------------- --}}
                            <a data-post={{$posts->id}} data-user={{$user->id}} class="btn btn-secondary commentbtn">{{__('message.Comment')}}</a>
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
                            {{-- ---------------------------Like starts------------------------------------- --}}

                            <input data-user={{$user->id}} data-post={{$posts->id}} class="toggle-classs" type="checkbox" data-onstyle="danger" data-offstyle="primary" data-toggle="toggle" data-on={{__("message.Unlike")}} data-off={{__("message.Like")}} @foreach ($posts->UserLikes as $p) {{ $p->pivot->post_Likes ? 'checked' : '' }} @endforeach>

                            {{-- ---------------------------Like ends------------------------------------- --}}
                            <a href="" data-post={{$posts->id}} data-user={{$user->id}} class="btn btn-secondary commentbtn" >{{__('message.Comment')}}</a>
                        </p>
                    </div>
                @endif
            @endforeach
        {{-- @endif --}}
        </div>
    </div>
    <div id="morePosts">
    </div>
    <div class="text-center m-3">
        {{-- @if(count($allpost)>0) --}}
        {{-- <button class="btn btn-dark" id="load-more" data-paginate="2">Load More</button>
        <p class="invisible">No more posts...</p> --}}
        {{-- @endif --}}
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
    <div class="d-flex justify-content-center">
        {!! $allpost->links('vendor.pagination.customlink') !!}
    </div>
@endsection

@section('js')
    <script>
        var token="{{csrf_token()}}";
        var urlComment="{{route('add.Comment')}}";
        var like, userId, postId;
        $('.toggle-classs').change(function(){
            like=$(this).prop('checked') === true ? 1 : 0;
            userId= $(this).data('user');
            postId=$(this).data('post');
            $.ajax({
                type:"post",
                // dataType:"json",
                url:"{{route('add.Like')}}",
                data:{
                    userId:userId,
                    postId:postId,
                    like:like,
                },
                success: function(data){
                    console.log(data);
                },
                error:function(error){
                    console.log(error);
                    alert('Didn\'t liked this post');
                }
            });
        });

        // load more
        $("#postdiv").slice(0,3).show();
        $("#load-more").on("click",function(){
            $("#postdiv:hidden").slice(0,3).show();
            if($("#postdiv:hidden").length==0)
            {
                $("#load-more").fadeOut();
            }
        });
    </script>
    <script src="{{URL::to('src/js/User/commentModal.js')}}"></script>
    <script src="{{URL::to('src/js/User/loadMore.js')}}"></script>
    <script src="{{URL::to('src/js/User/loadMoreData.js')}}"></script>
@endsection