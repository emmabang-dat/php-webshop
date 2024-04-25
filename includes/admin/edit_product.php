<?php
session_start();
require_once "../dbh.inc.php";

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../../products.php");
    exit();
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $query = "UPDATE products SET name = :name, description = :description, price = :price WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: ../../products.php");
    exit();
} else {
    header("Location: ../../products.php");
    exit();
}
