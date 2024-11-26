<?php

include '../../templates/header.php';

if (!$UserController->isUserLoggedIn()) {
    header('Location: ../login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padina de inicio</title>
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/general.css">
</head>
<body>
    <?php include '../../templates/nav.php' ?>

    <div class="container">
        <div class="row">
            <div class="columna6">
                <h3>Panel de usuario</h3>
                <hr>
                <div class="carta">
                    <p><a href="../../api/logout.php">Logout</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
