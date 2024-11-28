<?php

include '../templates/header.php';

if ($UserController->isUserLoggedIn()) {
    header('Location: ./user/panel.php');
}

if (isset($_SESSION['isLoggedIn']) && !$_SESSION['isLoggedIn']) {
      $UserController->logout();
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <div class="form-container">
        <h1>Login</h1>
        <form id="login-form">
            <input type="email" placeholder="Email" id="email" required>
            <input type="password" placeholder="Password" id="password" required>
            <button type="submit">Login</button>
        </form>
        <div class="erro_mensaje" id="erro_mensaje"></div>
        <p class="toggle-link">Don't have an account? <a href="register.php">Register</a></p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.8/axios.min.js" integrity="sha512-v8+bPcpk4Sj7CKB11+gK/FnsbgQ15jTwZamnBf/xDmiQDcgOIYufBo6Acu1y30vrk8gg5su4x0CG3zfPaq5Fcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="../assets/js/loginAxios.js"></script>
</body>
</html>
