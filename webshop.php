<?php
require_once "includes/config_session.inc.php";
require_once "includes/login/login_view.inc.php";
require_once "navbar.php";

require_once "includes/dbh.inc.php";

// Fetch categories
$query = $pdo->query("SELECT * FROM categories");
$categories = $query->fetchAll(PDO::FETCH_ASSOC);

// Check if a category has been selected
if (isset($_GET['category'])) {
    // Fetch subcategories for the selected category
    $query = $pdo->prepare("SELECT * FROM subcategories WHERE category_id = ?");
    $query->execute([$_GET['category']]);
    $subcategories = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    $subcategories = [];
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

<body class="bg-gray-200 text-gray-900 flex justify-center items-center m-0">
    <div class="w-1/2 flex flex-col items-center bg-gray-100 rounded-lg p-5 mt-36 mb-5">
        <h2 class="text-gray-800 font-semibold text-2xl my-4">The Petshop</h2>
        <h3 class="text-gray-800 font-semibold text-4xl my-4 p-24">
            <?php
            outputEmail();
            ?>
        </h3>

        <h1>Choose a category</h1>

        <!-- Category dropdown -->
        <form method="get">
            <select name="category" id="category" onchange="this.form.submit()">
                <option value="">Select a category</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['id'] ?>" <?= isset($_GET['category']) && $_GET['category'] == $category['id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </form>

        <!-- Subcategory dropdown -->
        <form method="get" action="products.php">
            <select name="subcategory" id="subcategory" onchange="this.form.submit()">
                <option value="">Select a subcategory</option>
                <?php foreach ($subcategories as $subcategory) : ?>
                    <option value="<?= $subcategory['id'] ?>"><?= $subcategory['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>

</body>

</html>