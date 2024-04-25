<?php
require_once "navbar.php";
require_once "includes/dbh.inc.php";

$isAdmin = $_SESSION['role'] === 'admin';
$editId = isset($_GET['edit']) ? $_GET['edit'] : null;

// Fetch products from the database
if (isset($_GET['subcategory'])) {
    $query = "SELECT * FROM products WHERE subcategory_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['subcategory']]);
} else {
    $query = "SELECT * FROM products";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
}
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


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

    <h1 class="text-center text-gray-800 font-semibold text-4xl my-8 pt-24">Products</h1>

    <div class="grid grid-cols-3 gap-4 justify-center">
        <?php foreach ($result as $product) : ?>
            <?php if ($isAdmin && $product['id'] == $editId) : ?>
                <!-- Show editable fields -->
                <form action="includes/admin/edit_product.php" method="post" class="flex flex-col">
                    <div class="row-span-1 p-4">
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                            <div class="w-full">
                                <div class="w-full">
                                    <img class="h-full w-full object-cover" src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                                </div>
                                <div class="w-full p-4 flex flex-col">
                                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                    <input type="text" class="text-gray-900 font-bold text-lg mb-2" name="name" value="<?= $product['name'] ?>">
                                    <input type="text" class="text-gray-700 text-sm" name="description" value="<?= $product['description'] ?>">
                                    <input type="text" class="text-gray-900 font-bold text-lg mt-2" name="price" value="<?= $product['price'] ?>">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php else : ?>
                <div class="col-span-1 p-4">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="w-full flex justify-center items-center">
                            <img class="h-60 w-60 object-cover p-4" src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                        </div>
                        <div class="w-full p-4">
                            <h2 class="text-gray-900 font-bold text-lg mb-2"><?= $product['name'] ?></h2>
                            <p class="text-gray-700 text-sm"><?= $product['description'] ?></p>
                            <p class="text-gray-900 font-bold text-lg mt-2"><?= $product['price'] ?></p>
                            <?php if ($isAdmin) : ?>
                                <a href="products.php?edit=<?= $product['id'] ?>">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Edit</button>
                                </a>
                                <a href="includes/admin/delete_product.php?id=<?= $product['id'] ?>" onclick="return confirm('Are you sure you want to delete this product?');">
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4">Delete</button>
                                </a>
                            <?php endif; ?>
                            <?php if (!$isAdmin) : ?>
                                <form action="cart.php" method="post">
                                    <input type="hidden" name="productId" value="<?= $product['id'] ?>">
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Add to cart</button>
                                    <input type="number" name="quantity" value="1" min="1" max="10" class="bg-gray-200 font-bold py-2 px-4 rounded ml-4 mt-4">
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

</body>

</html>