@extends('layouts.master2')
@section('title')
    Dashboard
@endsection

@section('content')
<div class="d-flex justify-content-center">
    <div style="position: absolute;top:50%;">
        <h1>Welcome, {{Auth::user()->name}}</h1>
    </div>
</div>
@endsection