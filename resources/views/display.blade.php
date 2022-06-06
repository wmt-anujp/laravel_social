@extends('includes.master')

@section('content')
    <h4>All Countries</h4>
    <div class="container mt-5">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Country Name</th>
                <th scope="col">Country Code</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($country as $countries)
                    <tr>
                        <th>{{$countries->id}}</th>
                        <td>{{$countries->country_name}}</td>
                        <td>{{$countries->code}}</td>
                    </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <div class="d-flex justify-content-center">
        {!! $country->links() !!}
    </div>
@endsection