@extends('layouts.master')
@section('title')
    Login
@endsection
@section('content')
@include('includes.message-block')
    {{-- login starts --}}
<div class="row">
    <div class="col-md-6 my-4">
        <h3>Log In</h3>
            <form action="{{route('signin')}}" method="POST" id="login">
                @csrf
                <div class="form-group my-4 {{$errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
                    @if ($errors->has('email'))
                        <p><span class="text-danger">{{$errors->first('email')}}*</span></p>
                    @endif
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
    </div>
    {{-- login ends --}}
@endsection