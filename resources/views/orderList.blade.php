
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
@if(count($getOderList))

    <div class="container">
        <h1> Order List</h1><br>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Payment Method</th>
                <th>Description</th>
                <th>Image</th>
                <th>status</th>

            </tr>
            </thead>
            <tbody>
            @foreach($getOderList as $orderItems)
                <tr>
                    <td>{{$orderItems->product->name}}</td>
                    <td>{{$orderItems->payment_method}}</td>
                    <td>{{$orderItems->product->description}}</td>
                    <td><img src="{{asset($orderItems->product->gallery)}}" alt="Los Angeles" width="100" height="100"></td>
                    <td>{{$orderItems->status}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <h1>No Orders </h1>
@endif
</body>
</html>
@stop

