<?php

include '../../templates/header.php';

if (!$UserController->isUserLoggedIn()) {
    header('Location: ../login.php');
}

//segundo factor de autenticacioin

$user = $UserController->getUser();

$hasTwoFactorActive = true;

if ($user['two_secret'] == null) {
    $hasTwoFactorActive = false;
    $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
    $secret = $g->generateSecret();
    $qrCode = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate($user['name'], $secret, 'mochitoMan');
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
                <h4>Activar Factor de auntenticacion</h4> <br>
                <p>1. si desea activar el segundo factor de autenticacion, por favor escanee el codigo QR</p>
                <p>2. debes tener la app de autenticacion instalada en tu dispositivo</p>
                <p>3. el codigo QR se mostrara en la pantalla de la app</p>
                <img src="<?= $qrCode ?>" alt="Codigo QR">
            </div><br>

            <div class="columna1">
                <div class="columna2">
                    <form id="activate-second-factor">
                        <input type="texto" placeholder="Codigo" id="codigo" required>
                        <button type="submit">Activar doble factor</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
