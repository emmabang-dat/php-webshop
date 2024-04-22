<?php
require_once "includes/config_session.inc.php";
require_once "includes/login/login_view.inc.php";
require_once "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200 text-gray-900 flex justify-center items-center m-0">
    <div class="w-1/2 flex flex-col items-center">
        <h3 class="text-gray-800 font-semibold text-4xl my-8 p-24">
            <?php
            outputEmail();
            ?>
        </h3>

        <h1>Webshop succesfully</h1>


    </div>
</body>

</html>