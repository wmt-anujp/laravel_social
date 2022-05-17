@extends('layouts/master')
@section('title')
    List of Books
@endsection
@include('includes/header')
@section('content')
    @include('toastr')
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <div class="row">
        <div class="col-6 offset-3 text-center mt-5">
            <h3 class="mt-5">List of Books</h3>
        </div>
        <div class="col-3 mt-5 text-end">
            <a type="button" href="{{route('addbookform')}}" class="mt-5 btn btn-success">
                Add Book
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive mt-5">
                <table class="table table-bordered border-light mt-5 table-dark" id="showbook">
                    <thead>
                        <tr class="text-center">
                          <th class="border-1 border-light">Sr.</th>
                          <th class="border-1 border-light">Image</th>
                          <th class="border-1 border-light">Title</th>
                          <th class="border-1 border-light">Author</th>
                          <th class="border-1 border-light">Price</th>
                          <th class="border-1 border-light">ISBN</th>
                          <th class="border-1 border-light">Status</th>
                          <th class="border-1 border-light">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
            </div>
        </div>
    </div>

    @section('js')
        <script type="text/javascript">
            $("#showbook").DataTable();
        </script>
    @endsection

@endsection