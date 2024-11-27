<?php

include '../../templates/header.php';
include '../../vendor/autoload.php';


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
    $qrCode = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate($user['name'], $secret, 'Empresa de prueba');
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


    <?php if (!$hasTwoFactorActive): ?>
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
                        <input type="texto" placeholder="Codigo" id="code" required>
                        <button type="submit">Activar doble factor</button>
                    </form>
                    <div class="menerror" id="erro_mensaje"></div>
                </div>
            </div>

        </div>
    </div>
    <?php else: ?>
        <div class="container">
            <h5>Desactivar Factor de auntenticacion</h5><hr>
            <button type="button" id="desactivar-segundo-factor">Desactivar</button>
        </div>
        <?php endif; ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.8/axios.min.js" integrity="sha512-v8+bPcpk4Sj7CKB11+gK/FnsbgQ15jTwZamnBf/xDmiQDcgOIYufBo6Acu1y30vrk8gg5su4x0CG3zfPaq5Fcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php if (!$hasTwoFactorActive): ?>
    <script>
    document.getElementById('activate-second-factor').onsubmit = (e) => {
    e.preventDefault();

    const errorMensaje = document.getElementById('erro_mensaje');
    errorMensaje.classList.add('d-none');

    const code = document.getElementById('code').value;
    const secret = "<?= $secret ?>";

    if (!code || !secret) {
        alert('Los campos no coinciden');
        return;
    }


    axios.post('../../api/activateSecondFcator.php', {
        code: code,
        secret: secret
    })
    .then((response) => {
        window.location = './panel_second_factor.php';
    })
    .catch((error) => {
        errorMensaje.innerText = error.response.data;
        errorMensaje.classList.remove('d-none');
    })
};
    </script>
     <?php else: ?>
        <script>
            document.getElementById('desactivar-segundo-factor').onclick = (e) => {
                e.preventDefault();

                axios.post('../../api/desactivateSecondFactor.php')
                .then((response) => {
                    window.location = './panel_second_factor.php';
                })
                .catch((error) => {
                    console.log(error);
                })
            }
        </script>
        <?php endif; ?>
</body>
</html>
