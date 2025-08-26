<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Product</h1>
<h1>index</h1>

<table border="1px">
    <tr>
        <th>id</th>
        <th>Product name</th>
        <th>Description</th>
        <th>Product price</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->product_name}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->price}}</td>
        <td>
            <a href="{{route('product.edit', ['product'=>$product])}}">Edit</a>
        </td>
        <td>
            <form action="{{route('product.delete', ['product'=>$product])}}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    @endforeach


</table>
</body>
</html>
