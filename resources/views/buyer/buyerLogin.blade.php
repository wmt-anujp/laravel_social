@extends('includes.master')

@section('title')
    Buyer Login
@endsection

@section('content')
<div class="mt-5 mb-3">
    <h3>Buyer's Login</h3>
<form action="{{route('buyer.Login')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<a href="{{route('login')}}" class="btn btn-sm btn-info">Admin Login</a>
@endsection