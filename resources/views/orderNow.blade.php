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
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>Amount</td>
                    <td>{{$getCartProductsSum}}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Delivery</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td>{{$getCartProductsSum + 100}}</td>
                </tr>

            </tbody>
        </table>
        <div>
            <form action="/orderPlace" method="POST" >
                @csrf
                <div class="form-group">
                    <textarea  class="form-control"  placeholder="enter your address" name="address" ></textarea>
                </div>
                <div class="form-group">
                    <label for="payment">Payment Method</label><br>
                    <input type="radio" value="online payment" name="payment"><span>Online Payment</span><br>
                    <input type="radio" value="cash on delivery"  name="payment"><span>Payment on delivery</span><br>
                </div>
                <button type="submit" class="btn btn-primary">Order Now</button>
            </form>
        </div>
    </div>
</body>
</html>
@stop
