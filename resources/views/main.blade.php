<?php
    use App\Http\Controllers\ProductController;
    $totalCart = ProductController::cartItemCount();
?>

    <style>
        a.profile img {
            height: 36px;
            border-radius: 22px;
            width: 36px;
        }
        span.cart-btn {
            background-color: red;
            color: white;
            border-radius: 31px;
            padding: 1px 7px;
            position: absolute;
            font-size: 11px;
            right: 13px;
            top: -4px;
        }
        .nav-link {
            display: block;
            padding: .5rem 1rem;
            position: relative;
        }
        i.fa.fa-cart-plus {
            font-size: 30px;
            margin-right: 15px;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/home">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/product">My Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/orderList">Orders</a>
            </li>
{{--            @if(Request::path() == 'home')--}}
            <form action="/searchProduct">
                <input type="text" placeholder="Search.." name="product" class="search-bar">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
{{--            @endif--}}

        </ul>
        <a class="nav-link"href="/cartList" ><i class="fa fa-cart-plus"></i><span class="cart-btn">{{$totalCart}}</span></a>
        <span class="navbar-text">
            <a href="logout"> logout</a>
    </span>
    </div>
</nav>
<div>
    @yield('content')

</div>


