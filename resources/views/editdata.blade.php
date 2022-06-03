@extends('includes.master')

@section('content')

<div class="mt-5">
<form action="{{route('user.update',$userdata->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="name" class="form-control" id="name" name="name" value="{{$userdata->name}}">
        @if ($errors->has('name'))
            <span class="text-danger">*{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="{{$userdata->email}}">
        @if ($errors->has('email'))
            <span class="text-danger">*{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="mb-3">
      <label for="mobile" class="form-label">Mobile</label>
      <input type="text" class="form-control" name="mobile" id="mobile" value="{{$userdata->mobile}}">
        @if ($errors->has('mobile'))
            <span class="text-danger">*{{ $errors->first('mobile') }}</span>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection