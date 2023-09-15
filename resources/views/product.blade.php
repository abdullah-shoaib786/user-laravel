@extends('main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        button.btn.btn-primary.add-button a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h1> Product Page</h1>
    <button type="button" class="btn btn-primary add-button" ><a href="addProduct">Add Product</a></button>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product as $data)
        <tr>
            <td>{{$data['name']}}</td>
            <td>{{$data['price']}}</td>
            <td>{{$data['category']}}</td>
            <td>{{$data['description']}}</td>
            <td><img src="{{asset($data['gallery'])}}" alt="Los Angeles" width="100" height="100"></td>
            <td><a href={{"editProduct/".$data['id']}}>Update</a><a href="{{"deleteProduct/".$data['id']}}">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
@stop
