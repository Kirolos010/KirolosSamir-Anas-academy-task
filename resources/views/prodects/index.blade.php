<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h1>Product List</h1>
    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} - ${{ $product->price }} ({{ $product->quantity }} available)</li>
        @endforeach
    </ul>
    <h2>Add a New Product</h2>
    {{-- to add new prodect --}}
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" required><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required><br>

        <button type="submit">Add Product</button>
    </form>
    {{-- add prodect without refres (AJAX) --}}
    <h2>Add a New Product</h2>
    <form id="productForm">
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" required><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required><br>

        <button type="submit">Add Product</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#productForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('products.store') }}',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    alert('Product added successfully!');
                    location.reload();
                },
                error: function(response) {
                    alert('Failed to add product!');
                }
            });
        });
    </script>


</body>
</html>
