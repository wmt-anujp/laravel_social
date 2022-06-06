@extends('includes.master')
@section('title')
    Home
@endsection
@section('content')
    <div class="mt-5">
        <h5>Welcome to User's home</h5>
        <a href="{{route('buyer.Logout')}}" class="btn btn-sm btn-danger">Logout</a>
    </div>
@endsection