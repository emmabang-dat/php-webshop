<?php
require_once "navbar.php";
require_once "includes/config_session.inc.php";
require_once "includes/dbh.inc.php";

// Fetch categories
$query = $pdo->query("SELECT * FROM categories");
$categories = $query->fetchAll(PDO::FETCH_ASSOC);

// Fetch subcategories
$query = $pdo->query("SELECT * FROM subcategories");
$subcategories = $query->fetchAll(PDO::FETCH_ASSOC);
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

        <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if ($_SESSION['role'] !== 'admin') {
        ?>
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="mb-4 text-xl font-bold text-gray-700">Access Denied</h2>
                <p class="text-gray-600">You do not have permission to access this page.</p>
            </div>
        <?php
            exit();
        }
        ?>
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

                <label for="category_id" class="block mt-3 text-sm text-gray-600">Category</label>
                <select id="category_id" name="category_id" class="w-full px-3 py-2 mt-1 text-sm text-gray-700 border rounded-lg focus:outline-none" onchange="updateSubcategories()">
                    <option value="">Select a category</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="subcategory_id" class="block mt-3 text-sm text-gray-600">Subcategory</label>
                <select id="subcategory_id" name="subcategory_id" class="w-full px-3 py-2 mt-1 text-sm text-gray-700 border rounded-lg focus:outline-none">
                    <option value="">Select a subcategory</option>
                    <!-- Subcategories will be populated here by JavaScript -->
                </select>

                <input type="submit" value="Add Product" class="w-full px-3 py-2 mt-3 text-sm font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none">
            </form>
        </div>
    </div>

    <script>
        // Subcategories data
        var subcategories = <?php echo json_encode($subcategories); ?>;

        // Function to update subcategories based on selected category
        function updateSubcategories() {
            var categoryId = document.getElementById('category_id').value;
            var subcategorySelect = document.getElementById('subcategory_id');

            // Clear subcategories select
            subcategorySelect.innerHTML = '<option value="">Select a subcategory</option>';

            // Add subcategories of selected category
            subcategories.forEach(function(subcategory) {
                if (subcategory.category_id == categoryId) {
                    var option = document.createElement('option');
                    option.value = subcategory.id;
                    option.text = subcategory.name;
                    subcategorySelect.add(option);
                }
            });
        }
    </script>

</body>

</html>