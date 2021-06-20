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
<form action="/createProduct" enctype="multipart/form-data" method="post">
    <table>
        <tr>
            <td>Product name</td>
            <td>
                <input type="text" name="productName">
            </td>
        </tr>
        <tr>
            <td>Product Price</td>
            <td>
                <input type="text" name="productPrice">
            </td>
        </tr>
        <tr>
            <td>Product Pic</td>
            <td>
                <input type="file" name="productPic">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Create" name="createBtn">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
