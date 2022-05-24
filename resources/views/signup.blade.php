@extends('layouts.master')
@section('title')
    Sign Up
@endsection
@section('content')
<head>
    <style>
    body {
    font-family: sans-serif;
    background-color: #fafafa;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
    Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    box-sizing: border-box;
}

a {
  text-decoration: none;
}

.container {
  max-width: 1000px;
  margin: 0 auto;
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
  margin-top: 3rem;
  font-size: 14px;
}

.box {
  max-width: 350px;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  background-color: #ffff;
  border: 1px solid #e6e6e6;
  border-radius: 1px;
  margin: 0 0 10px;
  padding: 10px 0;
  flex-grow: 1;
}

.heading {
  margin: 22px auto 12px;
  background-image: url("https://www.instagram.com/static/bundles/es6/sprite_core_b20f2a3cd7e4.png/b20f2a3cd7e4.png");
  background-position: -98px 0;
  height: 51px;
  width: 177px;
  overflow: hidden;
}

.field {
  margin: 10px 0;
  position: relative;
  font-size: 14px;
  width: 100%;
  text-overflow: ellipsis;
}

input {
  padding: 9px 0px 7px 9px;
  font-size: 12px;
  width: 16rem;
  /* height: 1.2rem; */
  outline: none;
  background: #fafafa;
  border-radius: 3px;
  border: 1px solid #efefef;
}

/* label intial position*/

label {
  pointer-events: none;
  /* padding-bottom: 15px; */
  /* transform: translateY(10px); */
  line-height: 6px;
  transition: all ease-out 0.1s;
  font-size: 16px;
  color: #999;
  /* padding-top: 4px; */
}

/* input::placeholder {
  visibility: hidden;
} */

/* label final position */
input:not(:placeholder-shown) + label {
  transform: translateY(0);
  font-size: 11px;
}

.login-button {
  text-align: center;
  width: 100%;
  padding: 0.5rem;
  border: 1px solid transparent;
  background-color: #3897f0;
  color: #fff;
  font-weight: 600;
  font-size: 14px;
  cursor: pointer;
}

.separator {
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #999;
  margin-top: 6px;
}

.separator .line {
  height: 1px;
  width: 40%;
  background-color: #dbdbdb;
}

.other {
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
}

.fb-login-btn {
  margin: 1rem;
  border: 0;
  cursor: pointer;
  font-size: 14px;
  color: #385185;
  font-weight: 600;
  background: transparent;
}

.fb-icon {
  color: #385185;
  font-size: 1rem;
  padding-right: 1px;
}

.forgot-password {
  font-size: 11px;
  color: #003569;
}

.signup {
  color: #3897f0;
  font-weight: 600;
}
    </style>
</head>
<div class="container">
    <div class="box">
        <div class="heading"></div>
        {{-- <div class="px-3"> --}}
            <h5 class="mb-1">Create Account.</h5>
            <div>
                <form class="login-form" action="{{route('usersignup')}}" method="POST" id="signup" enctype="multipart/form-data">
                    @csrf
                    <div class="field">
                        <input type="text" class="form-control border-1" name="name" id="name" placeholder="Enter Your Name" value="{{old('name')}}">
                        @if ($errors->has('name'))
                            <span class="text-danger">*{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="field">
                        <input id="username" type="text" class="form-control border-1" name="username" placeholder="Enter Username" value="{{old('username')}}">
                        @if ($errors->has('username'))
                            <span class="text-danger">*{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="field">
                        <input type="email" name="email" id="email" class="form-control border-1" placeholder="Enter Your Email">
                        @if ($errors->has('email'))
                            <span class="text-danger">*{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="field">
                        <input type="password" id="password" class="form-control border-1" name="password" placeholder="Password">
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
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control border-1" id="dob" name="dob" min="1925-01-01" max="2005-01-01" value="{{old('dob')}}" .>
                        @if ($errors->has('dob'))
                            <span class="text-danger">*{{ $errors->first('dob') }}</span>
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
        {{-- </div> --}}
    </div>
    <div class="box">
        <p>Already have an account? <a class="signup" href={{route('loginpage')}}>Log In</a></p>
    </div>
</div>
@endsection
