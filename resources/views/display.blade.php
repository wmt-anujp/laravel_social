@extends('includes.master')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel Traits Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->slug}}</td>
                    <td>{{$data->description}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>