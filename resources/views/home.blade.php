@extends('main')

@section('content')

    <!DOCTYPE html>
<html lang="en">
<head>

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
@if(count($allProducts))
<div class="trending-wrapper">
    <h3 class="trending-products">Trending Products</h3>
    <div class="myproducts_inner_wrapper">
        @foreach($allProducts as $item)
            <div class="product_item">
                <a href={{"productDetail/".$item['id']}}><div class="product_image_wrap"><img src="{{asset($item['gallery'])}}"></div></a>
                <div class="product_desc">
                    <a href={{"productDetail/".$item['id']}}><h4 class="product_name">{{$item['name']}}</h4></a>
                </div>
            </div>
        @endforeach
    </div>

</div>
    @else
no record found
    @endif

</body>
</html>


@stop
