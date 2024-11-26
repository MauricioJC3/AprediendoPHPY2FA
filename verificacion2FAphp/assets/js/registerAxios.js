document.getElementById('register-form').onsubmit = (e) => {
    e.preventDefault();


    const errorMensaje = document.getElementById('erro_mensaje');
    errorMensaje.classList.add('d-none');

    const fullname = document.getElementById('fullname').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmpassword = document.getElementById('confirmpassword').value;

    if (!fullname || !email || !password || !confirmpassword) {
        alert('Todos los campos son obligatorios');
        return;
    }

    if (password !== confirmpassword) {
        alert('Las contraseñas no coinciden');
        return;
    }

    axios.post('../api/register.php', {
        name: fullname,
        email: email,
        password: password
    })
    .then((response) => {
        window.location = '../src/user/panel.php';
    })
    .catch((error) => {
        errorMensaje.innerText = error.response.data;
        errorMensaje.classList.remove('d-none');
    })
}