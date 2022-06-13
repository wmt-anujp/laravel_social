@extends('layouts.master2')
@section('title')
    New Post
@endsection

@section('content')
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col mt-5">
            <h3 class="text-center">Add Post</h3>
            <form action="{{route('post.store')}}" method="POST" id="newpost" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="caption" class="form-label">Caption</label>
                    <textarea name="caption" class="form-control border-1" placeholder="Enter Caption for Your Post" id="caption" cols="30" rows="2">{{old('caption')}}</textarea>
                    @if ($errors->has('caption'))
                        <span class="text-danger">*{{ $errors->first('caption') }}</span>
                    @endif
                </div>
                <div class="mb-3 mt-3">
                    <label for="media" class="form-label">Post Image</label>
                    <input type="file" class="form-control border-1" name="media" id="media">
                    @if ($errors->has('media'))
                        <span class="text-danger">*{{ $errors->first('media') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary" id="addpost">Add Post</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
      $('#addpost').on('submit', function () {
        $('#newpost').attr('disabled', 'disabled');
      });
    });
</script>
<script src="{{URL::to('src/js/User/PostValidation.js')}}"></script>
@endsection