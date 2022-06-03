@extends('includes.master')

@section('content')
<div>
    <a href="{{route('welcome')}}" class="btn btn-sm btn-primary mt-5">Add user</a>
</div>
<div class="mt-5">
<table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        <th scope="col">Detials</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($userdata as $users)
            <tr>
                <th>{{$users->name}}</th>
                <td>{{$users->email}}</td>
                <td>{{$users->mobile}}</td>
                <td>
                    <form action="{{route('user.edit',$users->id)}}" method="get">
                        {{-- @csrf --}}
                        {{-- @method('PUT') --}}
                        <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('user.destroy',$users->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('user.show',$users->id)}}" method="GET">
                        <button type="submit" class="btn btn-sm btn-primary">Details</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection