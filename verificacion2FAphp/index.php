<?php

include './templates/header.php';
require './vendor/autoload.php';

$UserController = new App\Controllers\UserController();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padina de inicio</title>
    <link rel="stylesheet" href="assets/css/general.css">
</head>
<body>
    <?php include './templates/nav.php' ?>

    <div class="container">
        <div class="row">
            <div class="columna6">
                <h3>Nueva cuenta o inicia sesión</h3>
                <hr>
                <div class="carta">
                    <p><a href="src/login.php">Inicio de sesión</a></p>
                    <p><a href="src/register.php">Register</a></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
