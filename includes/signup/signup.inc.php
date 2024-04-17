<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    try {
        require_once "../dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_controller.inc.php";

        // ERROR HANDLERS

        $errors = [];

        if (isInputEmpty($email, $password)) {
            $errors["emptyInput"] = "Fill in all fields!";
        }
        if (isEmailInvalid($email)) {
            $errors["invalidEmail"] = "Invalid email used!";
        }

        if (isEmailTaken($pdo, $email)) {
            $errors["emailTaken"] = "Email already registered!";
        }

        if (!validName($name)) {
            $errors["invalidName"] = "Invalid name!";
        }

        if (!validPhone($phone)) {
            $errors["invalidPhone"] = "Invalid phone number!";
        }

        if (!validAddress($address)) {
            $errors["invalidAddress"] = "Invalid address!";
        }

        require_once "../config_session.inc.php";

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "email" => $email,
                "name" => $name,
                "phone" => $phone,
                "address" => $address
            ];
            $_SESSION["signupData"] = $signupData;

            header("location: ../../index.php");
            die();
        }

        createUser($pdo, $email, $password, $name, $phone, $address);

        header("location: ../../index.php?signup=success");
        $pdo = null;
        $statement = null;

        die();
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("location: ../../index.php");
    die();
}
