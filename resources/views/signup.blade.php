@extends('includes.master')

@section('title')
    Signup
@endsection

@section('content')
<div class="row">
    {{-- signup starts --}}
    <div class="col-md-6 my-4">
        <form action="{{route('signupform.store')}}" method="POST" id="signup">
            @csrf
            <div class="form-group my-4">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Your Name">
            </div>
            {{-- <div class="form-group my-4">
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" id="email" placeholder="Enter Your Email ID">
            </div>
            <div class="form-group my-4">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Enter Your Password">
            </div> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    {{-- signup ends --}}
</div>
@endsection