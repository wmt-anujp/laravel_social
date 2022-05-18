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
    <div class="row mt-5">
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
                          @foreach ($book as $b=>$books)
                              <tr class="text-center">
                                <td class="border-1 border-light">{{$b+1}}</td>
                                <td style="width: 100px" class="border-1 border-light"><a href="#" data-anuj={{$books->id}} class="text-decoration-none text-light bookdisplay"><img src="{{asset(Storage::disk('local')->url('public/bookimg/'.$books->book_image))}}" alt="book image" width="100" height="100"></a></td>
                                <td>{{$books->book_title}}</td>
                                <td>
                                    @foreach ($books->authors as $a)
                                        {!!Str::ucfirst($a->auth_fname)." ".Str::ucfirst($a->auth_lname)."<br>"!!}
                                   @endforeach
                                </td>
                                <td>{{$books->book_price}}</td>
                                <td>{{$books->book_isbn}}</td>
                                @if (Auth::user()->id==$books->user_id)
                                    @if ($books->book_status==1)
                                    <td>
                                        <button class="btn btn-sm btn-outline-success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">Active</button>
                                    </td>
                                    @else
                                        <td>
                                            <button class="btn btn-sm btn-outline-secondary toggle-class">Inactive</button>
                                        </td>
                                    @endif
                                @endif
                                <td>
                                    <div class="d-flex flex-row justify-content-evenly">
                                        <span><a href="#" class="btn btn-sm btn-secondary">Edit</a></span>
                                        <span><a href="{{route('deletebook',['bookdelid'=>$books->id])}}" class="btn btn-sm btn-danger">Delete</a></span>
                                        <span><a href="#" class="btn btn-sm btn-info bookdetails">Book Details</a></span>
                                    </div>
                                </td>
                              </tr>
                          @endforeach
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