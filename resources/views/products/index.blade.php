<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <style>
        #product-table {
        margin: 1.5rem 0;
        border: 1px solid #e5e7eb; /* Tailwind's gray-200 */
        border-radius: 8px;
        }
        
        .dataTables_filter {
        margin-bottom: 1.5rem;
        float: right;
        }

        .dataTables_filter input {
        padding: 0.5rem 0.75rem;
        border: 1px solid #d1d5db; /* gray-300 */
        border-radius: 0.375rem;
        font-size: 0.875rem;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen py-10 px-4">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">📦 Products</h1>

        @if(session()->has('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-6 text-right">
            <a href="{{ route('products.create') }}"
               class="inline-block px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
               <span class="mr-2">➕</span> Create a Product
            </a>
        </div>

        <div class="overflow-x-auto text-center">
            <table id="product-table" class="min-w-full divide-y divide-gray-200 border rounded-lg text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-gray-600">ID</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-600">Name</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-600">Qty</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-600">Price</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-600">Description</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-600">Update</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-600">Delete</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($products as $product)
                        <tr>
                            <td class="px-4 py-2">{{ $product->id }}</td>
                            <td class="px-4 py-2">{{ $product->name }}</td>
                            <td class="px-4 py-2">{{ $product->quantity }}</td>
                            <td class="px-4 py-2">{{ $product->price }}</td>
                            <td class="px-4 py-2">{{ $product->description }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('products.update', ['products' => $product]) }}"
                                   class="block w-full inline-flex justify-center py-3 px-6 border border-gray-300 shadow-md text-white bg-green-700 hover:bg-green-900 hover:shadow-lg hover:-translate-y-0.5 transform rounded-xl text-sm font-semibold transition-all duration-200 ease-in-out">Edit</a>
                            </td>
                            <td class="px-4 py-2">
                                <form method="POST" action="{{ route('products.delete', ['products' => $product]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Delete this product?')"
                                            class="block w-full inline-flex justify-center py-3 px-6 border border-red-300 shadow-md text-white bg-red-700 hover:bg-red-900 hover:shadow-lg hover:-translate-y-0.5 transform rounded-xl text-sm font-semibold transition-all duration-200 ease-in-out">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Activate DataTables -->
    <script>
        $('#product-table').DataTable({
            responsive: true,
            // dom: 'Blfrtip'
            dom: "<'flex justify-between items-center mb-4'lfB>" + 
            "<'overflow-x-auto't>" + 
            "<'flex justify-between items-center mt-4'ip>",
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            lengthMenu: [
                [5, 10, 25, 50, 100, -1], // values
                [5, 10, 25, 50, 100, "All"] // labels
            ],
            columnDefs: [
                { targets: [5, 6], orderable: false }, // disable sort on Update/Delete
                { targets: 3, render: $.fn.dataTable.render.number(',', '.', 2, '₱') } // format price
            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search here..."
            }
        });

    </script>
</body>

<!--
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
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
-->
</html>