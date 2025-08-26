<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Create Product</h1>
    <h1>Create</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>

        @endif
    </div>

    <form action="{{route('product.update',['product'=>$product])}}" method="POST">
        @csrf
        @method('put')
        <div>
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required value="{{ $product->product_name }}">
        </div>
        <div>
            <label for="description">Description:</label>
            {{-- <textarea id="description" name="description" value="{{ $product->description }}"></textarea> --}}
            {{-- <textarea id="description" name="description">{{ old('description', $product->description) }}</textarea> --}}

               <input type="text" id="description" name="description" value="{{ $product->description }}" required>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required value="{{ $product->price }}">
        </div>
        <button type="submit">Update</button>

    </form>
</body>

</html>
