@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@include('includes.message-block')
@include('includes.header')
@section('userinfo')
<div class="container mt-4">
    <div class="row mt-5">
        <div class="col mt-5" style="display:flex; align-items: center ;justify-content: center">
            <h3>Welcome, {{Auth::user()->email}}</h3>
        </div>
    </div>
@endsection
</body>
</html>