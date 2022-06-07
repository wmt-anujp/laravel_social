@extends('includes.master')

@section('title')
    Image
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{route('display.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control border-1" name="image" id="image"><br>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </form>
    </div>
@endsection