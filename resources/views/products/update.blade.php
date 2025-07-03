<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
    <h1>Update Product</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('products.edit', ['products' => $product])}}">
        @csrf
        @method('post')
        <div class="card">
            <div class="card-header">Product Name:</div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" name="name" placeholder="add name" class="form-control" value="{{ $product->name }}">
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Product Quantity:</div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" name="quantity" placeholder="add quantity" class="form-control" value="{{ $product->quantity }}">
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Product Price:</div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" name="price" placeholder="add price" class="form-control" value="{{ $product->price }}">
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Product Description:</div>
            <div class="card-body">
                <div class="form-group">
                    <textarea name="description" placeholder="add description" class="form-control">{{ $product->description }}</textarea>
                </div>
            </div>
        </div>
        <div>
            <div class="card-body">
                <div class="form-group">
                    <button type="submit" class="form-control">Save!</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>