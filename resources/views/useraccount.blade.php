@extends('layouts/master2')

@section('title')
    User Account
@endsection

@section('content')
<section class="row justify-content-center">
    <div class="col-md-6  col-md-offset-3" style="margin-top:150px">
        <div class="card mt-5" style="max-width: 540px;">
            <div class="card-header">
                <h3 class="text-center">Your Account</h3>
            </div>
            <div class="row g-0">
                <div class="col-12 col-md-5 d-flex justify-content-center  justify-content-sm-start">
                    <img src="{{asset(Auth::user()->profile_photo)}}" alt="Profile Image" class="mt-3 mt-sm-0 img-fluid" width='250' height='100'>
                </div>
                <div class="col-12 col-md-7">
                    <div class="card-body mt-2  d-flex flex-column justify-content-center align-items-center align-items-sm-start  justify-content-sm-start">
                        <p><i class="fa-solid fa-user text-primary"></i><span class="card-title ms-2 h5">{{$user->name}}</span>
                        </p>
                        <p><i class="fa-solid fa-user-tie text-primary"></i><span class="card-title ms-2 h5">{{$user->username}}</span>
                        </p>
                        <p><i class="fa-solid fa-envelope text-primary"></i><span class="card-text ms-2">{{$user->email}}</span>
                        </p>
                        <p><a href="{{route('editaccountform')}}" class="btn btn-primary mt-4"><i class="fa-solid fa-pen-to-square me-2"></i>Edit Profile</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection