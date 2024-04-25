<?php
require_once "navbar.php";
require_once "includes/dbh.inc.php";

function getProductById($productId, $pdo)
{
    $sql = "SELECT * FROM products WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $productId]);
    $product = $stmt->fetch();
    return $product;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete'])) {
        $productId = $_POST['productId'];

        if (isset($_SESSION['cart'][$productId])) {
            if ($_SESSION['cart'][$productId]['quantity'] > 1) {
                $_SESSION['cart'][$productId]['quantity']--;
            } else {
                unset($_SESSION['cart'][$productId]);
            }
        }
    } else {
        $productId = $_POST['productId'];
        $quantity = $_POST['quantity'];
        $product = getProductById($productId, $pdo);

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = array("name" => $product['name'], "price" => $product['price'], "image" => $product['image'], "quantity" => $quantity);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200">
    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) : ?>
        <div class="container mx-auto px-4">
            <div class="py-8">
                <div class="flex justify-between mb-4 pt-32">
                    <h2 class="text-2xl font-semibold">Shopping Cart</h2>
                </div>
                <?php
                $totalPrice = 0;
                foreach ($_SESSION['cart'] as $productId => $product) :
                    $totalPrice += $product['price'] * $product['quantity'];
                ?>
                    <div class="flex shadow-md mb-4 bg-white rounded-lg">
                        <img class="h-24 w-24 object-cover p-2" src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                        <div class="p-4 flex-1">
                            <h3 class="font-semibold text-lg"><?= $product['name'] ?></h3>
                            <p class="text-gray-600">Price: <?= $product['price'] ?></p>
                            <p class="text-gray-600">Quantity: <?= $product['quantity'] ?></p>
                            <form action="cart.php" method="post">
                                <input type="hidden" name="productId" value="<?= $productId ?>">
                                <input type="hidden" name="delete" value="1">
                                <input type="submit" value="Delete" class="mt-2 px-4 py-2 bg-red-500 text-white rounded">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="flex justify-between pt-4">
                    <h2 class="text-2xl font-semibold">Total Price</h2>
                    <h2 class="text-2xl font-semibold"><?= $totalPrice ?></h2>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="container mx-auto px-4">
            <div class="py-8">
                <div class="flex justify-between mb-4 pt-32">
                    <h2 class="text-2xl font-semibold">Your cart is empty</h2>
                </div>
            </div>
        </div>
    <?php endif; ?>
</body>

</html>