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
    <title>Webshop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-gray-200 text-gray-900 flex justify-center items-center m-0">
    <div class="w-1/2 flex flex-col items-center">
        <?php
        if (!isset($_SESSION['user_id'])) { ?>
            <h1 class="text-gray-800 font-semibold text-3xl py-8">Login </h1>

            <form action="includes/login/login.inc.php" method="post" class="bg-white p-5 mb-5 rounded shadow w-full">
                <label class="block mb-2" for="email">Email</label>
                <input type="text" name="email" id="email" class="w-full p-2 mb-2 rounded border border-gray-300">
                <label class="block mb-2" for="password">Password</label>
                <input type="password" name="password" id="password" class="w-full p-2 mb-2 rounded border border-gray-300">
                <button type="submit" class="w-full p-2 rounded bg-blue-600 text-white cursor-pointer hover:bg-blue-700">Login</button>
            </form>
        <?php }
        ?>

        <?php
        checkLoginErrors();
        ?>

        <h1 class="text-gray-800 font-semibold text-3xl mb-8">Signup</h1>

        <form action="includes/signup/signup.inc.php" method="post" class="bg-white p-5 mb-5 rounded shadow w-full">
            <?php
            signupInput();
            ?>
            <button type="submit" class="w-full p-2 rounded bg-blue-600 text-white cursor-pointer hover:bg-blue-700">Signup</button>
        </form>

        <?php
        checkSignupErrors();
        ?>
    </div>
</body>

</html>