@include('includes.message-block')
@extends('layouts.master')
@section('title')
    Sign-Up
@endsection
@section('content')
    <div class="row">
        {{-- signup starts --}}
        <div class="col-md-6 my-4">
            <h3>Sign Up</h3>
            <form action="{{route('signup')}}" method="POST" id="signup">
                @csrf
                <div class="form-group my-4 {{$errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}" placeholder="Enter Your Email ID">
                    @if ($errors->has('email'))
                        <p><span class="text-danger">{{$errors->first('email')}}*</span></p>
                    @endif
                </div>
                <div class="form-group my-4 {{$errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{Request::old('password')}}" placeholder="Enter Your Password">
                    @if ($errors->has('password'))
                        <p><span class="text-danger">{{$errors->first('password')}}*</span></p>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Enter Above password">
                    @if ($errors->has('cpassword'))
                        <span class="text-danger">*{{ $errors->first('cpassword') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div class="mt-3">
                <a href="{{route('login')}}">Already have an account?</a>
            </div>
        </div>
        {{-- signup ends --}}
    </div>
@endsection