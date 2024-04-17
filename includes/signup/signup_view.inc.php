<?php

declare(strict_types=1);

function signupInput()
{
    if (isset($_SESSION["signupData"]["email"]) && !isset($_SESSION["errors_signup"]["emailTaken"]) && !isset($_SESSION["errors_signup"]["invalidEmail"])) {

        echo '<label for="email">Email</label>';
        echo '<input type="text" name="email" id="email" value="' . $_SESSION["signupData"]["email"] . '">';
    } else {
        echo '<label for="email">Email</label>';
        echo '<input type="text" name="email" id="email">';
    }
    
    echo '<label for="password">Password</label>';
    echo '<input type="password" name="password" id="password">';

    if (isset($_SESSION["signupData"]["name"]) && !isset($_SESSION["errors_signup"]["invalidName"])) {
        echo '<label for="name">Name</label>';
        echo '<input type="text" name="name" id="name" value="' . $_SESSION["signupData"]["name"] . '">';
    } else {
        echo '<label for="name">Name</label>';
        echo '<input type="text" name="name" id="name">';
    }

    if (isset($_SESSION["signupData"]["phone"]) && !isset($_SESSION["errors_signup"]["invalidPhone"])) {
        echo '<label for="phone">Phone</label>';
        echo '<input type="text" name="phone" id="phone" value="' . $_SESSION["signupData"]["phone"] . '">';
    } else {
        echo '<label for="phone">Phone</label>';
        echo '<input type="text" name="phone" id="phone">';
    }

    if (isset($_SESSION["signupData"]["address"]) && !isset($_SESSION["errors_signup"]["invalidAddress"])) {
        echo '<label for="address">Address</label>';
        echo '<input type="text" name="address" id="address" value="' . $_SESSION["signupData"]["address"] . '">';
    } else {
        echo '<label for="address">Address</label>';
        echo '<input type="text" name="address" id="address">';
    }
}

function checkSignupErrors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<p class='error'>" . $error . "</p>";
        }

        unset($_SESSION['errors_signup']);
    } elseif (isset($_GET['signup']) && $_GET['signup'] == 'success') {
        echo '<br>';
        echo '<p>Signup success!</p>';
    }
}
