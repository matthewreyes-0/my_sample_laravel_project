<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" /> -->
    <title>Create Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-xl w-full mx-auto p-6 bg-white rounded-2xl shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">📦 Create Product</h2>
            <form method="POST" action="{{ route('products.store') }}" class="space-y-6">
                @csrf
                @method('post')
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name:</label>
                    <input type="text" name="name" id="name"
                        class="mt-1 block w-full h-12 px-4 py-2 text-base rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Add name">
                    @error('name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Product Quantity:</label>
                    <input type="text" name="quantity" id="quantity"
                        class="mt-1 block w-full h-12 px-4 py-2 text-base rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Add quantity">
                    @error('quantity')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Product Price:</label>
                    <input type="text" name="price" id="price"
                        class="mt-1 block w-full h-12 px-4 py-2 text-base rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Add price">
                    @error('price')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Product Description:</label>
                    <input type="text" name="description" id="description"
                        class="mt-1 block w-full h-12 px-4 py-2 text-base rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Add description">
                    @error('description')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                        class="w-full inline-flex justify-center py-3 px-6 border border-transparent shadow-md text-white bg-blue-600 hover:bg-blue-700 hover:shadow-lg hover:-translate-y-0.5 transform rounded-xl text-sm font-semibold transition-all duration-200 ease-in-out">
                        Save!
                    </button>
                </div>
            </form>
            <div class="mt-4">
                <a href="{{ route('products.index') }}" class="block w-full inline-flex justify-center py-3 px-6 border border-gray-300 shadow-md text-gray-700 bg-white hover:bg-gray-200 hover:shadow-lg hover:-translate-y-0.5 transform rounded-xl text-sm font-semibold transition-all duration-200 ease-in-out">Go Back</a>

            </div>

        </div>
    </div>
</body>
<!--
Previous build based from Devtamin's video.
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="ml-4 card">
        <h1 class="text-2xl font-semibold mb-6 text-gray-800">Create Product</h1>
        <div>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <form method="post" action="{{route('products.store')}}" class="bg-white p-8 rounded shadow-md w-full max-w-md">
            @csrf
            @method('post')
            <div class="card">
                <div class="card-header">Product Name:</div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="add name" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Product Quantity:</div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" name="quantity" placeholder="add quantity" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Product Price:</div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" name="price" placeholder="add price" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Product Description:</div>
                <div class="card-body">
                    <div class="form-group">
                        <textarea name="description" placeholder="add description" class="form-control"></textarea>
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
    </div>
</body>
-->
</html>