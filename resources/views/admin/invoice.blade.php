<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>

        <h1>Invoice</h1>
        <hr>
        <br>
        <br>
        <table>
            <tr>
                <td><h3>Customer name</h3></td>
                <td>: {{$data->name}}</td>
            </tr>

            <tr>
                <td><h3>Customer address</h3></td>
                <td>: {{$data->receiver_address}}</td>
            </tr>

            <tr>
                <td><h3>Phone</h3></td>
                <td>: {{$data->phone}}</td>
            </tr>

            <tr>
                <td><h3>Product title</h3></td>
                <td>: {{$data->product->title}}</td>
            </tr>

            <tr>
                <td><h3>Product price</h3></td>
                <td>: {{$data->product->price}}</td>
            </tr>

            <tr>
                <td><h3>Status</h3></td>
                <td>: {{$data->status}}</td>
            </tr>
        </table>

        <br>
        <img src="products/{{$data->product->image}}" width="300" height="300" alt="">
        
    </center>
</body>
</html>