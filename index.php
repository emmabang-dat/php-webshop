<?php
require_once "includes/config_session.inc.php";
require_once "includes/signup/signup_view.inc.php";
require_once "includes/login/login_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.tailwindcss.com/2.2.19/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3>
            <?php
            outputEmail();
            ?>
        </h3>

        <?php
        if (!isset($_SESSION['user_id'])) { ?>
            <h1>Login </h1>

            <form action="includes/login/login.inc.php" method="post">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <button type="submit">Login</button>
            </form>
        <?php }
        ?>

        <?php
        checkLoginErrors();
        ?>

        <h1>Signup</h1>

        <form action="includes/signup/signup.inc.php" method="post">
            <?php
            signupInput();
            ?>
            <button type="submit">Signup</button>
        </form>

        <?php
        checkSignupErrors();
        ?>
    </div>
</body>

</html>