@extends('layouts.master2')

@section('title')
    Feed
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="mt-5">
                <label for="country" class="mb-2 d-block">Select Country</label>
                    <form action="{{route('userfeed')}}" method="get">
                        {{-- @csrf --}}
                        <div class="row">
                            <div class="col-2 me-4">
                                <select class="form-select d-inline" style="width: 200px" name="country" id="country">
                                    <option value="all">All Country Posts</option>
                                    @foreach ($country as $cntry)
                                        <option value="{{$cntry->id}}" @if($cntry->id == $params) selected @endif>{{$cntry->country_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary">Show</button>
                            </div>
                        </div>
                    </form>
            </div>
            @foreach ($allpost as $pt)
                @if ($pt->media_type===2)
                    <div class="col-3 col-md-3 mt-5">
                        <div>
                            <p><span style="color: green">Caption: </span>{{ $pt->post_caption }}</p>
                        </div>
                        <a>
                            <img src="{{$pt->media_path}}" alt="post-images" width="200" height="200" style="border: 4px solid lightblue">
                        </a>
                        <div><small><span style="color: green">Posted By: </span>{{$pt->user->name}} {!!'<br>On '.$pt->created_at->format('d-m-Y h:i:s A')!!}</small></div>
                    </div>
                @elseif ($pt->media_type === 1)
                    <div class="col-3 mt-5">
                        <div>
                            <p><span style="color: green">Caption: </span>{{ $pt->post_caption }}</p>
                        </div>
                        <a>
                            <video autoplay loop muted width="200" height="200" style="border: 4px solid lightblue">
                                <source src="{{$pt->media_path}}">
                            </video>
                        </a>
                        <div><small><span style="color: green">Posted By: </span>{{$pt->user->name}} {!!'<br>On '.$pt->created_at->format('d-m-Y h:i:s A')!!}</small></div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
