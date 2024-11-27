document.getElementById('activate-second-factor').onsubmit = (e) => {
    e.preventDefault();

    const errorMensaje = document.getElementById('erro_mensaje');
    errorMensaje.classList.add('d-none');

    const codigo = document.getElementById('codigo').value;
    const secret = '<?= $secret ?>';

    if (!codigo || !secret) {
        alert('Los campos no coinciden');
        return;
    }


    axios.post('../api/activateSecondFcator.php', {
        codigo: codigo,
        secret: secret
    })
    .then((response) => {
        console.log(response)
        //window.location = '../src/user/panel.php';
    })
    .catch((error) => {
        errorMensaje.innerText = error.response.data;
        errorMensaje.classList.remove('d-none');
    })
};