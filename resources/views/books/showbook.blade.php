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
                <table class="table border-2 border-light mt-5 table-dark" id="showbook">
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
                                <td style="width: 100px" class="border-1 border-light"><span><img src="{{asset(Storage::disk('local')->url('public/bookimg/'.$books->book_image))}}" alt="book image" width="100" height="100"></span></td>
                                <td class="border-1 border-light">{{$books->book_title}}</td>
                                <td>
                                    @foreach ($books->authors as $a)
                                        {!!Str::ucfirst($a->auth_fname)." ".Str::ucfirst($a->auth_lname)."<br>"!!}
                                    @endforeach
                                </td>
                                <td class="border-1 border-light">{{$books->book_price}}</td>
                                <td class="border-1 border-light">{{$books->book_isbn}}</td>
                                @if (Auth::user()->id==$books->user_id)
                                    @if ($books->book_status==1)
                                        <td class="border-1 border-light">
                                            <button class="btn btn-sm btn-outline-success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">Active</button>
                                        </td>
                                        @else
                                            <td class="border-1 border-light">
                                                <button class="btn btn-sm btn-outline-secondary toggle-class">Inactive</button>
                                            </td>
                                    @endif
                                    <td class="border-1 border-light">
                                        <div class="d-flex flex-row justify-content-evenly">
                                            <a href="#" class="btn btn-sm btn-secondary">Edit</a>
                                            <a href="{{route('deletebook',['bookdelid'=>$books->id])}}" class="btn btn-sm btn-danger">Delete</a>
                                            <a class="btn btn-sm btn-info bookdetails" data-bid={{$books->id}}>Book Details</a>
                                        </div>
                                    </td>
                                    @else
                                        <td>Access Denied</td>
                                        <td>Access Denied</td>
                                @endif
                              </tr>
                          @endforeach
                      </tbody>
                </table>
            </div>
        </div>
    </div>

{{-- book details modal starts--}}
 <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Book Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
               <table class="table table-striped table-dark table-hover">
                    <tr>
                        <td colspan="2" class="text-center">
                            <img src="" alt="Book Image" id="book_img" class="border border-2 border-light" width="200" height="200">
                        </td>
                    </tr>
                    <tr>
                       <td>Book Title</td>
                       <td id="book_title"></td>
                   </tr>
                   <tr>
                       <td>Book Pages</td>
                       <td id="book_pages"></td>
                   </tr>
                   <tr>
                       <td>Book Language</td>
                       <td id="book_lang"></td>
                   </tr>
                   <tr>
                       <td>Book ISBN</td>
                       <td id="book_isbn"></td>
                   </tr>
                   <tr>
                       <td>Book Description</td>
                       <td id="book_desc"></td>
                   </tr>
                   <tr>
                       <td>Book Price</td>
                       <td id="book_price"></td>
                   </tr>
                   <tr>
                       <td>Book Status</td>
                       <td id="book_status"></td>
                   </tr>
               </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- book details modal ends --}}

<script type="text/javascript">
    $("#showbook").DataTable();
        // $('#showbook').DataTable({
        // 'columns': [
        //     { data: 'id' }, // index - 0
        //     { data: 'book_image' }, // index - 1
        //     { data: 'book_title' }, // index - 2
        //     { data: 'user_id' }, // index - 3
        //     { data: 'book_price' } // index - 4
        //     { data: 'book_isbn' } // index - 5
        //     { data: 'book_status' } // index - 6
        //     { data: 'Action' } // index - 7
        // ],
        // "columnDefs": [{
        //     "targets": [6,7]
        //     "orderable":false,
        // }]
    // });

    // BOOK full details
    var bdetailsurl="{{route('bookdetails')}}"
    var status=""
    var bookimagepath="{{asset(Storage::disk('local')->url('public/bookimg/'))}}"+"/"
    $(".bookdetails").click(function(event) {
            event.preventDefault();
            bookID=$(this).attr("data-bid");
            console.log(bookID);
            $.ajax({
                url:bdetailsurl,
                method: "POST",
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    bookid:bookID,
                },
                success: function (data) {
                    console.log(data);
                    $('#book_img').attr('src',bookimagepath+data['book_image']);
                    $('#book_title').html(data['book_title']);
                    $('#book_pages').html(data['book_pages']);
                    $('#book_lang').html(data['book_language']);
                    $('#book_isbn').html(data['book_isbn']);
                    $('#book_desc').html(data['book_desc']);
                    $('#book_price').html(data['book_price']);
                    if(data['book_status']==1){
                        status="Active"
                    }
                    else{
                        status="Inactive"
                    }
                    $('#book_status').html(status);
                    $("#bookModal").modal("show");
                }
            });
        });
</script>
@endsection