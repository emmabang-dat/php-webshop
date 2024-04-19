<?php

declare(strict_types=1);

function signupInput()
{
    // Email
    echo '<label for="email" class="block mb-2">Email</label>';
    if (isset($_SESSION["signupData"]["email"]) && !isset($_SESSION["errors_signup"]["emailTaken"]) && !isset($_SESSION["errors_signup"]["invalidEmail"])) {
        echo '<input type="text" name="email" id="email" class="w-full p-2 mb-2 rounded border border-gray-300" value="' . $_SESSION["signupData"]["email"] . '">';
    } else {
        echo '<input type="text" name="email" id="email" class="w-full p-2 mb-2 rounded border border-gray-300">';
    }

    // Password
    echo '<label for="password" class="block mb-2">Password</label>';
    echo '<input type="password" name="password" id="password" class="w-full p-2 mb-2 rounded border border-gray-300">';

    // Name
    echo '<label for="name" class="block mb-2">Name</label>';
    if (isset($_SESSION["signupData"]["name"]) && !isset($_SESSION["errors_signup"]["invalidName"])) {
        echo '<input type="text" name="name" id="name" class="w-full p-2 mb-2 rounded border border-gray-300" value="' . $_SESSION["signupData"]["name"] . '">';
    } else {
        echo '<input type="text" name="name" id="name" class="w-full p-2 mb-2 rounded border border-gray-300">';
    }

    // Phone
    echo '<label for="phone" class="block mb-2">Phone</label>';
    if (isset($_SESSION["signupData"]["phone"]) && !isset($_SESSION["errors_signup"]["invalidPhone"])) {
        echo '<input type="text" name="phone" id="phone" class="w-full p-2 mb-2 rounded border border-gray-300" value="' . $_SESSION["signupData"]["phone"] . '">';
    } else {
        echo '<input type="text" name="phone" id="phone" class="w-full p-2 mb-2 rounded border border-gray-300">';
    }

    // Address
    echo '<label for="address" class="block mb-2">Address</label>';
    if (isset($_SESSION["signupData"]["address"]) && !isset($_SESSION["errors_signup"]["invalidAddress"])) {
        echo '<input type="text" name="address" id="address" class="w-full p-2 mb-2 rounded border border-gray-300" value="' . $_SESSION["signupData"]["address"] . '">';
    } else {
        echo '<input type="text" name="address" id="address" class="w-full p-2 mb-2 rounded border border-gray-300">';
    }
}

function checkSignupErrors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<p class='text-red-600 mb-2'>" . $error . "</p>";
        }

        unset($_SESSION['errors_signup']);
    } elseif (isset($_GET['signup']) && $_GET['signup'] == 'success') {
        echo '<br>';
        echo '<p class="text-green-500">Signup success!</p>';
    }
}
