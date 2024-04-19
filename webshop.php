<?php
require_once "includes/config_session.inc.php";
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
        <h3 class="text-gray-800 font-semibold text-3xl my-8">
            <?php
            outputEmail();
            ?>
        </h3>

        <h1>Webshop succesfully</h1>

        <form action="includes/logout.inc.php" method="post" class="p-5 mb-5 rounded">
            <button type="submit" class="w-full p-2 rounded bg-blue-600 text-white cursor-pointer hover:bg-blue-700">Logout</button>
        </form>
    </div>
</body>

</html>