@extends('layouts.master2')
@section('title')
    Edit Account
@endsection

@section('content')
<section class="row justify-content-center mt-5 mb-5">
    <div class="col-md-6 col-md-offset-3 mt-5">
        <header class="mt-3 text-center"><h3>Update Account</h3></header>
        <form action="{{route('user.store')}}" method="POST" id="editaccount" class="mt-5" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="name">
                @if ($errors->has('name'))
                    <span class="text-danger">*{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group mb-4">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="{{ $user->username }}" id="uname">
                @if ($errors->has('username'))
                    <span class="text-danger">*{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="form-group mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" id="email" disabled>
                @if ($errors->has('email'))
                    <span class="text-danger">*{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group mb-4">
                <label for="profile">Profile Image</label>
                <span>
                    <i class="fa-solid fa-circle-info text-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="*Image Size Must be Less Than 3 MB" style="font-size: 20px"></i>
                </span>
                <input type="file" name="profile" class="form-control" id="profile">
                @if ($errors->has('profile'))
                    <span class="text-danger">*{{ $errors->first('profile') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary me-2">Update Account</button>
            <a class="btn btn-danger" href="{{ route('user.Account') }}">Cancel</a>
        </form>
    </div>
</section>
@endsection

@section('js')
    <script>
        $("#email").prop('disabled', true);
    </script>
    <script src="{{URL::to('src/js/User/UserValidation.js')}}"></script>
@endsection