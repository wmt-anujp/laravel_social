@extends('includes.master')

@section('content')
    <div>
        <h5>Welcome to Admin's Dashboard</h5>
        <a href="{{route('admin.Logout')}}" class="btn btn-sm btn-danger">Logout</a>
    </div>
@endsection