<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Price Range Slider</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* CSS cho thanh kéo */
        /* ... */

    </style>
</head>

<body>
<div class="container mt-5">
    <div class="row">
        <!-- Phần thanh kéo giữa hai giá trị -->

    <!-- Hiển thị danh sách sản phẩm -->
    <div class="row">
        <div class="col-md-12">
            <ul id="product_list">
                @foreach($products as $product)
                    <li>{{ $product->name }} - ${{ $product->price }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

</body>

</html>
