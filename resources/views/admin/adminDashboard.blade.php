@extends('layouts.master2')
@section('title')
   Admin Dashboard
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mt-4">
                <h3 style="color: green">Users List</h3>
            </div>
        </div>
        <div class="row mt-3">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-2 me-4">
                            <select class="form-select d-inline" style="width: 200px" name="sorting" id="sorting">
                                <option selected disabled>Select Filter</option>
                                    <option value="all" @if ("all"===$params)
                                        selected
                                    @endif>All</option>
                                    <option value="active" @if ("active"===$params)
                                        selected
                                    @endif>Active</option>
                                    <option value="inactive" @if ("inactive"===$params)
                                        selected
                                    @endif>Inactive</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-md-12 mt-2 table-responsive justify-content-center">
                <table class="table border border-2 border-dark" id="usertable">
                    <thead>
                    <tr class="text-center">
                        <th>id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    {{-- <tbody class="text-center"> --}}
                        {{-- @foreach ($users as $user)
                            <tr class="border">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <input data-user="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $user->active_status ? 'checked' : '' }}>
                                </td>
                            </tr>
                        @endforeach --}}
                    {{-- </tbody> --}}
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">
    $(function () {
        var table = $('#usertable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.datatable') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'username', name: 'username'},
                {data: 'email', name: 'email'},
                {data: 'active_status', name: 'active_status', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
    // user status
    var status=0;
    var userId=0;
    $('.toggle-class').change(function(){
        status=$(this).prop('checked')===true ? 1 : 0;
        console.log (status);
        userId= $(this).data('user');
        $.ajax({
            type:"POST",
            dataType:"json",
            url:"{{route('user.Status')}}",
            data:{
                status:status,
                userId:userId,
            },
            success: function(data){
                console.log(data);
                alert('User status Changed');
            },
            error:function(error){
                console.log(error);
                alert('User Status Not Changed');
            }
        });
    });
</script>
@endsection
