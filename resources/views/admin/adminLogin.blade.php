@extends('includes.master')

@section('title')
    Admin Login
@endsection

@section('content')
<div class="mt-5 mb-3">
    <h3>Admin Login</h3>
<form action="{{route('admin.Login')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email">
        @if ($errors->has('email'))
            <span class="text-danger">*{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="password">
        @if ($errors->has('password'))
            <span class="text-danger">*{{ $errors->first('password') }}</span>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<a href="{{route('buyer.Logins')}}" class="btn btn-sm btn-secondary">Buyer Login</a>
@endsection