@extends('layouts/master')
@include('includes/header')
@section('title')
    List of Authors
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-6 offset-3 text-center mt-5">
            <h3 class="mt-5">List of Authors</h3>
        </div>
        <div class="col-3 mt-5 text-end">
            <a type="button" href="{{route('addauthorform')}}" class="mt-5 btn btn-success">
                Add Author <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>
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
                                   <td class="border-1 border-light"><p data-anuj={{$authr->id}}>{{ucfirst($authr->auth_fname)}} {{ucfirst($authr->auth_lname)}}</p></td>
                                   <td class="border-1 border-light">{{\Carbon\Carbon::createFromTimestamp(strtotime($authr->auth_dob))->format('d-m-Y')}}</td>
                                   <td class="border-1 border-light">{{$authr->auth_gen}}</td>
                                   <td class="border-1 border-light">{{$authr->auth_address}}</td>
                                   @if (Auth::user()->id==$authr->user_id)
                                       <td class="border-1 border-light">
                                        <input data-id="{{$authr->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $authr->auth_status ? 'checked' : '' }}>
                                       </td>
                                       <td class="text-center border-1 border-light">
                                        <div class="d-flex flex-row justify-content-evenly">
                                            <span><a href="" class="btn btn-sm btn-info">Update</a></span>
                                            <span><a href="" class="btn btn-sm btn-danger">Delete</a></span>
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
@endsection

@section('js')
<script>
    $(document).ready( function () {
        $('#showauthor').DataTable();
    } );
</script>
@endsection