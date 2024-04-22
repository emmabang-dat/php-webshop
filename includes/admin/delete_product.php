<?php
session_start();
require_once "../dbh.inc.php";

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../../products.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM products WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ../../products.php");
    exit();
} else {
    header("Location: ../../products.php");
    exit();
}
