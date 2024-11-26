<?php

include '../templates/header.php';

if ($UserController->isUserLoggedIn()) {
    header('Location: ./user/panel.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Estilos compartidos */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1e1e2f, #27293d);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }
        .form-container {
            background-color: #2d2f41;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            max-width: 350px;
            width: 100%;
            text-align: center;
        }
        .form-container input {
            width: 100%;
            padding: 0.8rem;
            margin: 0.5rem 0;
            border-radius: 8px;
            border: none;
            outline: none;
            background-color: #3a3c54;
            color: #fff;
            font-size: 1rem;
        }
        .form-container input:focus {
            box-shadow: 0 0 8px #5d9cec;
        }
        .form-container button {
            width: 100%;
            padding: 0.8rem;
            margin-top: 1rem;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #5d9cec, #5643fa);
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
        }
        .form-container button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .toggle-link {
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .erro_mensaje {
            color: red;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Register</h1>
        <form id="register-form">
            <input type="text" placeholder="Full Name" id="fullname">
            <input type="email" placeholder="Email" id="email">
            <input type="password" placeholder="Password" id="password">
            <input type="password" placeholder="Confirm Password" id="confirmpassword">
            <button type="submit">Register</button>
        </form>
        <div class="erro_mensaje" id="erro_mensaje"></div>
        <p class="toggle-link">Already have an account? <a href="login.html">Login</a></p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.8/axios.min.js" integrity="sha512-v8+bPcpk4Sj7CKB11+gK/FnsbgQ15jTwZamnBf/xDmiQDcgOIYufBo6Acu1y30vrk8gg5su4x0CG3zfPaq5Fcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="../assets/js/registerAxios.js"></script>


</body>
</html>
