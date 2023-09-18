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
@if(count($getCartProducts))
<div class="container">
    <h1> Cart List</h1><br>
    <a class="btn btn-primary" href="orderNow">Order Now</a><br><br>
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
        @foreach($getCartProducts as $cartItems)
            <tr>
                <td>{{$cartItems->name}}</td>
                <td>{{$cartItems->price}}</td>
                <td>{{$cartItems->category}}</td>
                <td>{{$cartItems->description}}</td>
                <td><img src="{{asset($cartItems->gallery)}}" alt="Los Angeles" width="100" height="100"></td>
                <td><a class="btn btn-warning" href="{{"removeToCart/".$cartItems->cart_id}}">Remove To Cart</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
    <h1>No Products In The Cart List </h1>
@endif
</body>
</html>
@stop
