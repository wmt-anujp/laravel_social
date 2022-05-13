@extends('layouts.master')

@section('title')
    Sign-Up
@endsection
@section('content')
@include('includes.message-block')
    <div class="row">
        {{-- signup starts --}}
        <div class="col-md-6 my-4">
            <h3>Sign Up</h3>
            <form action="{{route('signup')}}" method="POST" id="signup">
                @csrf
                <div class="form-group my-4 {{$errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
                    {{-- @if ($errors->has('email'))
                        <p><span class="text-danger">{{$errors->first('email')}}*</span></p>
                    @endif --}}
                </div>
                <div class="form-group my-4 {{$errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{Request::old('name')}}">
                    {{-- @if ($errors->has('name'))
                        <p><span class="text-danger">{{$errors->first('name')}}*</span></p>
                    @endif --}}
                </div>
                <div class="form-group my-4 {{$errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{Request::old('password')}}">
                    {{-- @if ($errors->has('password'))
                        <p><span class="text-danger">{{$errors->first('password')}}*</span></p>
                    @endif --}}
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        {{-- signup ends --}}
        {{-- login starts --}}
        <div class="col-md-6 my-4">
            <h3>Log In</h3>
            <form action="{{route('signin')}}" method="POST" id="login">
                @csrf
                <div class="form-group my-4 {{$errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
                    {{-- @if ($errors->has('email'))
                        <p><span class="text-danger">{{$errors->first('email')}}*</span></p>
                    @endif --}}
                    @foreach ($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
                <div class="form-group my-4 {{$errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{Request::old('password')}}">
                    {{-- <span style="color: red">
                        @error('password')
                            {{$message}}
                        @enderror
                    </span> --}}
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        {{-- login ends --}}
    </div>
@endsection