@extends('includes.master')

@section('content')
<form action="{{route('user.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email">
        @if ($errors->has('email'))
            <span class="text-danger">*{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="mb-3">
      <label for="Password" class="form-label">Password</label>
      <input type="password" class="form-control" name="Password" id="Password">
        @if ($errors->has('Password'))
            <span class="text-danger">*{{ $errors->first('Password') }}</span>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection