@extends('includes.master')

@section('content')
    <div>
        <h5>Welcome to home</h5>
        <a href="{{route('logout')}}" class="btn btn-sm btn bg-danger">Logout</a>
    </div>
@endsection