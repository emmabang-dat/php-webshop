<?php
require_once "includes/config_session.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav class="bg-red-400 p-2 mt-0 w-full fixed top-0 left-0 right-0 z-10">
        <div class="container mx-auto flex flex-wrap items-center">
            <div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-semibold">
                <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
                    <span class="text-3xl pl-2">Webshop</span>
                </a>
            </div>
            <div class="flex w-full p-4 content-center justify-between md:w-1/2 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li><a class="mr-6 text-white hover:text-gray-300 text-lg <?php if (basename($_SERVER['PHP_SELF']) == 'webshop.php') {
                                                                                    echo 'underline';
                                                                                } ?>" href="webshop.php">Home</a></li>
                    <li><a class="mr-6 text-white hover:text-gray-300 text-lg <?php if (basename($_SERVER['PHP_SELF']) == 'products.php') {
                                                                                    echo 'underline';
                                                                                } ?>" href="products.php">Products</a></li>
                    <li <?php if (basename($_SERVER['PHP_SELF']) == 'cart.php') {
                            echo 'underline';
                        } ?>>
                        <a href="cart.php">
                            <img src="includes/cart/MaterialSymbolsShoppingCartOutlineSharp.png" alt="Cart Icon" class="w-6 h-6 mr-6" />
                        </a>
                    </li>
                    <li><a class="mr-6 text-white hover:text-gray-300 text-lg <?php if (basename($_SERVER['PHP_SELF']) == 'admin.php') {
                                                                                    echo 'underline';
                                                                                } ?>" href="admin.php">Administration</a></li>
                </ul>
                <form action="includes/logout.inc.php" method="post">
                    <button type="submit" class="p-2 rounded bg-blue-600 text-white cursor-pointer hover:bg-blue-700">Logout</button>
                </form>
            </div>
        </div>
    </nav>
</body>

</html>