@extends('includes.master')

@section('content')
    <div>
        <h5>Welcome to Dashboard</h5>
        <a href="{{route('logout')}}" class="btn btn-sm btn-danger">Logout</a>
    </div>
@endsection