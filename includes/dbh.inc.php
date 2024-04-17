<?php

$host = "localhost";
$dbName = "phpwebshopdb";
$dbUsername = "root";
$dbPassword = "";


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("connection failed:"  . $e->getMessage());
}
