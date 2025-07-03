<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
</head>
<body>
    <h1>Products</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{route('products.create')}}">Create a Product</a>
        </div>
        <div>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td>
                            <a href="{{route('products.update', ['products' => $product])}}">Update</a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('products.delete', ['products' => $product]) }}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" />
                            </form>
                            <!-- <a href="{{route('products.delete', ['products' => $product])}}">Delete</a> -->
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>