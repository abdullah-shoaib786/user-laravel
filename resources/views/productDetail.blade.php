@extends('main')

@section('content')
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <style>
        img.product-img {
            height: 250px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="product-img" src="{{asset($product->gallery)}}" alt="Los Angeles" >

        </div>
        <div class="col-sm-6">
            <h1>{{$product->name}}</h1>
            <h3>Price: {{$product->price}}</h3>
            <p>Description: {{$product->description}}</p>
            <p>Category: {{$product->category}}</p>
            <br><br>
            <form action="/addToCart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <button class="btn btn-primary" type="submit">Add to Cart</button>
            </form>

            <br><br>
            <button class="btn btn-success">Buy Now</button>


        </div>
    </div>
</div>
</body>
</html>
@stop


