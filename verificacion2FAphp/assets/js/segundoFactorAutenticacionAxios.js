document.getElementById('segundoFactorAutenticacion').onsubmit = (e) => {
    e.preventDefault();

    const errorMensaje = document.getElementById('erro_mensaje');
    errorMensaje.classList.add('d-none');

    const code = document.getElementById('code').value;

    if (!code) {
        alert('Los campos no coinciden');
        return;
    }


    axios.post('../api/LoginsecondFactorcode.php', {
        code: code,
    })
    .then((response) => {
        window.location = '../src/user/panel.php';
    })
    .catch((error) => {
        errorMensaje.innerText = error.response.data;
        errorMensaje.classList.remove('d-none');
    })
};