@extends('layouts/master')
@include('includes/header')
@section('title')
    List of Authors
@endsection

@section('content')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
    <div class="row">
        <div class="col-6 offset-3 text-center mt-5">
            <h3 class="mt-5">List of Authors</h3>
        </div>
        <div class="col-3 mt-5 text-end">
            <a type="button" href="{{route('addauthorform')}}" class="mt-5 btn btn-success">
                Add Author <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>
    {{-- List of Authors starts --}}
    <div class="row">
        <div class="col-12">
            <div class="table-responsive mt-5">
                <table class="table border-2 border-light mt-5 table-dark" id="showauthor">
                    <thead>
                        <tr class="text-center">
                          <th class="border-1 border-light">Sr.</th>
                          <th class="border-1 border-light">Name</th>
                          <th class="border-1 border-light">DOB</th>
                          <th class="border-1 border-light">Gender</th>
                          <th class="border-1 border-light">Address</th>
                          <th class="border-1 border-light">Status</th>
                          <th class="border-1 border-light">Action</th>
                        </tr>
                      </thead>
                        <tbody>
                            @foreach ($author as $a=>$authr)
                                <tr class="text-center">
                                   <td class="border-1 border-light">{{$a+1}}</td>
                                   <td class="border-1 border-light"><p id="random" data-anuj={{$authr->id}}>{{ucfirst($authr->auth_fname)}} {{ucfirst($authr->auth_lname)}}</p></td>
                                   <td class="border-1 border-light">{{\Carbon\Carbon::createFromTimestamp(strtotime($authr->auth_dob))->format('d-m-Y')}}</td>
                                   <td class="border-1 border-light">{{$authr->auth_gen}}</td>
                                   <td class="border-1 border-light">{{$authr->auth_address}}</td>
                                   @if (Auth::user()->id==$authr->user_id)
                                    @if ($authr->auth_status==1)
                                       <td class="border-1 border-light">
                                           <button class="btn btn-sm btn-outline-success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">Active</button>
                                        {{-- <input data-id="{{$authr->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $authr->auth_status ? 'checked' : '' }}> --}}
                                        </td>
                                        @else
                                        <td>
                                            <button class="btn btn-sm btn-outline-secondary toggle-class">Inactive</button>
                                        </td>
                                    @endif
                                       <td class="text-center border-1 border-light">
                                        <div class="d-flex flex-row justify-content-evenly">
                                            <span><a href="" class="btn btn-sm btn-secondary">Edit</a></span>
                                            <span><a href="{{route('deleteauthor',['authrdelid'=>$authr->id])}}" class="btn btn-sm btn-danger">Delete</a></span>
                                            <span><a href="#" class="btn btn-sm btn-info authordetails">Author Details</a></span>
                                        </div>
                                    </td>
                                    @else
                                    <td class="border-1 border-light">Access Denied</td>
                                    <td class="border-1 border-light">Access Denied</td>
                                   @endif
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- list of authors ends --}}

    {{-- modal for displaying author details starts --}}
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Author Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <table class="table table-striped table-dark table-hover">
                       <tr>
                           <td style="width:300px;">Author's First Name: </td>
                           <td><span id="fname"></span></td>
                       </tr>
                       <tr>
                           <td>Author's Last Name: </td>
                           <td><span id="lname"></span></td>
                       </tr>
                       <tr>
                           <td>Author's Date of Birth: </td>
                           <td><span id="dob"></span></td>
                       </tr>
                       <tr>
                           <td>Author's Gender: </td>
                           <td><span id="gen"></span></td>
                       </tr>
                       <tr>
                           <td>Author's Address: </td>
                           <td><span id="address"></span></td>
                       </tr>
                       <tr>
                           <td>Author's Mobile: </td>
                           <td><span id="mobile"></span></td>
                       </tr>
                       <tr>
                           <td>Author's Description: </td>
                           <td><span id="desc"></span></td>
                       </tr>
                       <tr>
                           <td>Author's Status: </td>
                           <td><span id="status"></span></td>
                       </tr>
                   </table>
    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal for displaying author details ends --}}

@section('js')
<script type="text/javascript">
    $('#showauthor').DataTable();
</script>

<script type="text/javascript">
$(document).ready( function () {
    // $.ajaxsetup({
    //     headers:{
    //         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    //     }
    // });
        
    // author full details
    var detailsurl="{{route('authordetails')}}";
    var status="";
    $('.authordetails').click(function (event) {
        event.preventDefault();
        $("#Modal").modal("show");
        authorID=$('#random').attr("data-anuj");
        // console.log(authorID);
        $.ajax({
            url:detailsurl,
            method:"POST",
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            data:{
                authorid:authorID,
            },
            success:function(data){
                // console.log('success:',data['auth_fname']);
                $("#fname").html(data['auth_fname']);
                $("#lname").html(data['auth_lname']);
                $('#dob').html($.date(data['auth_dob']));
                $('#gen').html(data['auth_gen']);
                $('#address').html(data['auth_address']);
                $('#mobile').html(data['auth_mobile']);
                $('#desc').html(data['auth_desc']);
                if(data['auth_status']==1){
                    status="Active"
                }
                else{
                    status="Inactive"
                }
                $(".status").html(status);
                $("#Modal").modal("show");
            }
        })
    });
});
</script>
@endsection
@endsection