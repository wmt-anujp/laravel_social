@extends('includes.master')

@section('content')
    <div class="mt-5">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
              </tr>
            </thead>
            <tbody>
                {{-- @foreach ($userdata as $users) --}}
                    <td>{{$userdata->name}}</td>
                    <td>{{$userdata->email}}</td>
                    <td>{{$userdata->mobile}}</td>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
@endsection