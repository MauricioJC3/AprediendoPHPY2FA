document.getElementById('login-form').onsubmit = (e) => {
    e.preventDefault();

    const errorMensaje = document.getElementById('erro_mensaje');
    errorMensaje.classList.add('d-none');

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (!email || !password) {
        alert('Los campos no coinciden');
        return;
    }


    axios.post('../api/login.php', {
        email: email,
        password: password
    })
    .then((response) => {
        if (response.data.secondFactor) 
        {
            window.location = './login_seconFcator.php';
        } else {
            window.location = '../src/user/panel.php';
        }
        
    })
    .catch((error) => {
        errorMensaje.innerText = error.response.data;
        errorMensaje.classList.remove('d-none');
    })
};