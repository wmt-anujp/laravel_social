@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
<section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
        <header class="mt-4"><h3>Your Account</h3></header>
        <form action="{{ route('account.save') }}" class="my-4" method="post" id="account" enctype="multipart/form-data">
            <div class="form-group my-2">
                @csrf
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="name">
            </div>
            <div class="form-group my-2">
                <label for="image">Image (only .jpg)</label>
                <input class="form-control" type="file" name="image" id="image">
            </div>
            <button type="submit" class="btn btn-primary mt-1">Save Account</button>
        </form>
    </div>
</section>
    @if (Storage::disk('local')->has($user->name . '-' . $user->id . '.jpg'))
        <section class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                <img src="{{ route('account.image', ['filename' => $user->name . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">
            </div>
        </section>
    @endif
@endsection