@extends('includes.master')

@section('content')
<form action="{{route('user.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="name" class="form-control" id="name" name="name">
        @if ($errors->has('name'))
            <span class="text-danger">*{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email">
        @if ($errors->has('email'))
            <span class="text-danger">*{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="mb-3">
      <label for="mobile" class="form-label">Mobile</label>
      <input type="text" class="form-control" name="mobile" id="mobile">
        @if ($errors->has('mobile'))
            <span class="text-danger">*{{ $errors->first('mobile') }}</span>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection