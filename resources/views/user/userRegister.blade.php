@extends('layouts.master')
@section('title')
    Sign Up
@endsection
@section('css')
    <link rel="stylesheet" href="src/css/User/userSignup.css">
@endsection
@section('content')
<div class="container">
    <div class="box">
        <div class="heading"></div>
            <h5 class="mb-1">Create User Account.</h5>
            <div>
                <form action="{{route('user.Signup')}}" method="POST" id="usersignup" enctype="multipart/form-data">
                    @csrf
                    <div class="field">
                        <input type="text" class="form-control border-1" name="name" id="name" placeholder="Enter Your Name" value="{{old('name')}}">
                        @if ($errors->has('name'))
                            <span class="text-danger">*{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="field">
                        <input id="username" type="text" class="form-control border-1" id="username" name="username" placeholder="Enter Username" value="{{old('username')}}">
                        @if ($errors->has('username'))
                            <span class="text-danger">*{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="field">
                        <input type="email" name="email" id="email" class="form-control border-1" placeholder="Enter Your Email" value="{{old('email')}}">
                        @if ($errors->has('email'))
                            <span class="text-danger">*{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="field">
                        <input type="password" id="password" class="form-control border-1" name="password" placeholder="Password" maxlength="100">
                        @if ($errors->has('password'))
                            <span class="text-danger">*{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="field">
                      <input type="password" class="form-control border-1" id="cpassword" placeholder="Confirm Password" name="cpassword">
                      @if ($errors->has('cpassword'))
                          <span class="text-danger">*{{ $errors->first('cpassword') }}</span>
                      @endif
                    </div>
                    <div class="field">
                        <label for="profile" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control border-1" id="profile" name="profile">
                        @if ($errors->has('profile'))
                            <span class="text-danger">*{{ $errors->first('profile') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="login-button" title="login">Sign Up</button>
                </form>
            </div>
    </div>
    <div class="box">
        <p>Already have an account? <a class="signup" href="{{route('user.Login')}}">Log In</a></p>
    </div>
</div>
@endsection
@section('js')
    <script src="{{URL::to('src/js/User/UserValidation.js')}}"></script>
@endsection
