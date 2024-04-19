<?php

declare(strict_types=1);

function outputEmail()
{
    if (isset($_SESSION['user_id'])) {
        echo "Welcome " . $_SESSION['user_name'];
    } else {
        echo "You are not logged in";
    }
}

function checkLoginErrors() {
    if (isset($_SESSION['errors_login'])) {
        $errors = $_SESSION['errors_login'];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<p class='text-red-600 mb-2'>" . $error . "</p>";
        }

        unset($_SESSION['errors_login']);
    }
    elseif (isset($_GET['login']) && $_GET['login'] == 'success') {
        echo '<br>';
        echo '<p>Login success!</p>';
    }
}