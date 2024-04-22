<?php
require_once "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200 text-gray-900">

    <div class="flex flex-col items-center justify-center min-h-screen py-2">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="mb-4 text-xl font-bold text-gray-700">Add New Product</h2>
            <form action="includes/admin/add_product.php" method="post" enctype="multipart/form-data">
                <label for="name" class="block text-sm text-gray-600">Product Name</label>
                <input type="text" id="name" name="name" required class="w-full px-3 py-2 mt-1 text-sm text-gray-700 border rounded-lg focus:outline-none" />

                <label for="image" class="block mt-3 text-sm text-gray-600">Image Path</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full px-3 py-2 mt-1 text-sm text-gray-700 border rounded-lg focus:outline-none" />

                <label for="price" class="block mt-3 text-sm text-gray-600">Price</label>
                <input type="number" id="price" name="price" step="0.01" min="0" required class="w-full px-3 py-2 mt-1 text-sm text-gray-700 border rounded-lg focus:outline-none" />

                <label for="description" class="block mt-3 text-sm text-gray-600">Description</label>
                <textarea id="description" name="description" class="w-full px-3 py-2 mt-1 text-sm text-gray-700 border rounded-lg focus:outline-none"></textarea>

                <label for="available" class="block mt-3 text-sm text-gray-600">Available</label>
                <input type="number" id="available" name="available" min="0" required class="w-full px-3 py-2 mt-1 text-sm text-gray-700 border rounded-lg focus:outline-none" />

                <input type="submit" value="Add Product" class="w-full px-3 py-2 mt-3 text-sm font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none">
            </form>
        </div>
    </div>

</body>

</html>