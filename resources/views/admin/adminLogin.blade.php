@extends('layouts.master')
@section('title')
    Admin Login
@endsection
@section('css')
    <link rel="stylesheet" href="src/css/Admin/adminLogin.css">
@endsection
@section('content')
<div class="container mb-5">
    <div class="box">
        <div class="heading"></div>
        <h5 class="mb-1">Admin Login</h5>
        <form class="login-form mb-3" action="{{route('admin.Login')}}" method="POST" id="adminLogin">
          @csrf
            <div class="field">
                <input id="email" type="email" name="email" placeholder="Enter Your Email">
                @if ($errors->has('email'))
                  <span class="text-danger">*{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="field">
                <input id="password" type="password" placeholder="Enter Password" name="password">
                @if ($errors->has('password'))
                  <span class="text-danger">*{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button type="submit" class="login-button" title="Log In" id="login">Log In</button>
        </form>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
  $(document).ready(function () {
    $('#adminLogin').on('submit', function () {
      $('#login').attr('disabled', 'disabled');
    });
  }); 
</script>
  <script src="{{URL::to('src/js/Admin/AdminValidation.js')}}"></script>
@endsection
