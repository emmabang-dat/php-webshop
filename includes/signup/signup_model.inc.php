<?php

declare(strict_types=1);


function getEmail(object $pdo, string $email)
{
    $query = "SELECT email FROM users WHERE email = :email;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":email", $email);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function setUser(object $pdo, string $email, string $password, string $name, string $phone, string $address)
{
    $query = "INSERT INTO users (email, password, name, phone, address, role) VALUES (:email, :password, :name, :phone, :address, 'user');";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":email", $email);
    $statement->bindParam(":name", $name);
    $statement->bindParam(":phone", $phone);
    $statement->bindParam(":address", $address);
    $statement->bindParam(":password", $password);
    $statement->execute();
}
