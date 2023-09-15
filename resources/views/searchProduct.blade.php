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

        .myproducts_inner_wrapper {
            display: grid;
            grid-template-columns: 25% 25% 25% 25%;
            grid-gap: 0px;
            margin-left: 15px;
        }
        .product_item {
            background-color: #eee;
            border: 1px solid #BBB7B7;
            border-radius: 5px;
            max-width: 100%;
            max-width: 95%;
            overflow: hidden;
            margin: 20px;
        }
        .product_image_wrap img {
            max-width: 100%;
            width: 100%;
            object-fit: cover;
            height: 210px;
        }
        div.product_desc {
            padding: 20px;
        }
        .trending-products {
            text-align: center;
            margin: 30px 0px 30px 0px;
        }
    </style>
</head>
<body>

<div class="trending-wrapper">
    <div class="myproducts_inner_wrapper">
        @if(count($searchProduct))
        @foreach($searchProduct as $item)
            <div class="product_item">
                <a href={{"productDetail/".$item['id']}}><div class="product_image_wrap"><img src="{{asset($item['gallery'])}}"></div></a>
                <div class="product_desc">
                    <a href={{"productDetail/".$item['id']}}><h4 class="product_name">{{$item['name']}}</h4></a>
                </div>
            </div>
        @endforeach
        @else
            <h1>No Post Found</h1>

        @endif
    </div>
</div>

</body>
</html>
@stop
