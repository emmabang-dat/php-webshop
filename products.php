<?php
require_once "navbar.php";
require_once "includes/dbh.inc.php";

// Fetch products from the database
$query = "SELECT * FROM products";
$stmt = $pdo->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$isAdmin = $_SESSION['role'] === 'admin';
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

    <h1 class="text-center text-3xl my-6">Products</h1>

    <div class="grid grid-cols-3 gap-4 justify-center">
        <?php foreach ($result as $product) : ?>
            <div class="col-span-1 p-4">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="w-full">
                        <img class="h-full w-full object-cover" src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                    </div>
                    <div class="w-full p-4">
                        <h2 class="text-gray-900 font-bold text-lg mb-2"><?= $product['name'] ?></h2>
                        <p class="text-gray-700 text-sm"><?= $product['description'] ?></p>
                        <p class="text-gray-900 font-bold text-lg mt-2"><?= $product['price'] ?></p>
                        <p class="text-gray-700 text-sm"><?= $product['available'] ?> Available</p>
                        <?php if ($isAdmin) : ?>
                            <a href="edit_product.php?id=<?= $product['id'] ?>">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Edit</button>
                            </a>
                            <a href="includes/admin/delete_product.php?id=<?= $product['id'] ?>" onclick="return confirm('Are you sure you want to delete this product?');">
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4">Delete</button>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>