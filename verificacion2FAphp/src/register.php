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
    <link rel="stylesheet" href="../assets/css/register.css">
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
