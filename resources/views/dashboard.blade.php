@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@include('includes.message-block')
@include('includes.header')
@section('userinfo')
<div class="container mt-4">
    <div class="row">
        <div class="col" style="display:flex; align-items: center ;justify-content: center">
            <h3>Welcome, {{Auth::user()->email}}</h3>
        </div>
    </div>
@endsection
</body>
</html>