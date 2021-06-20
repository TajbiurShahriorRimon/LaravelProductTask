<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <div align="left">
        <a href="/createProduct">Create Product</a>
    </div>
    <div>
        <table align="center" border="1">
            <tr>
                <td>Product Name</td>
                <td>Price</td>
                <td>Picture</td>
            </tr>
            @foreach($product as $productDetails)
                <tr>
                    <td>{{$productDetails['productName']}}</td>
                    <td>{{$productDetails['price']}}</td>
                    <td>
                        <img src="{{$productDetails['productPic']}}" alt="" width="200" height="100">
                    </td>
                    <td><a href="/product/edit/{{$productDetails['id']}}">Edit</a></td>
                    <td><a href="/product/delete/{{$productDetails['id']}}">Delete</a></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

</body>
</html>
