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
<form action="" enctype="multipart/form-data" method="post">
    <table>
        <tr>
            <td>Product name</td>
            <td>
                <input type="text" name="productName" value="{{$product->productName}}">
            </td>
        </tr>
        <tr>
            <td>Product Price</td>
            <td>
                <input type="text" name="productPrice" value="{{$product->price}}">
            </td>
        </tr>
        <tr>
            <td>Product Pic</td>
            <td>
                <input type="text" name="productPic" readonly value="{{$product->productPic}}"> <br>
                <img src="{{asset($product->productPic)}}" alt="" width="200" height="100">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="file" name="updateProductPic">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Update" name="updateBtn">
            </td>
        </tr>
    </table>
</form>
{{--
<img src="user/home.png" alt="" width="200" height="100">
--}}
</body>
</html>
