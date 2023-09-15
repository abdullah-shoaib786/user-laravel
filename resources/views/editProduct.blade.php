
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
</head>
<body>

<div class="container">
    <h2>Edit Product</h2>
    <form action="/updateProduct" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="hidden" class="form-control" id="id" placeholder="" name="product_id" value="{{$data['id']}}">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="image" placeholder="" name="image" value="{{$data['gallery']}}">
        </div>
        <div class="form-group">
            <label for="email">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="product_name" value="{{$data['name']}}">
        </div>
        <div class="form-group">
            <label for="email">Price:</label>
            <input type="text" class="form-control" id="price" placeholder="Enter Product Price" name="product_price" value="{{$data['price']}}">
        </div>
        <div class="form-group">
            <label for="email">Category:</label>
            <input type="text" class="form-control" id="category" placeholder="Enter Product Category" name="product_category" value="{{$data['category']}}">
        </div>
        <div class="form-group">
            <label for="email">Description:</label>
            <input type="text" class="form-control" id="description" placeholder="Enter Product Description" name="product_description" value="{{$data['description']}}">
        </div>
        <div class="form-group">
            <label for="email">Product Image:</label>
            <img src="{{asset($data['gallery'])}}" alt="Los Angeles" width="100" height="100">
        </div>
        <div class="form-group">
            <label class="form-label" for="customFile">Update Product Image</label>
            <input type="file" name="product_image" class="form-control" id="customFile" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
