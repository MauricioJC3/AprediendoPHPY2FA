
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Navbar</title>
    <link rel="stylesheet" href="assets/css/navbar.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">Mi Logo</div>
        

        <ul class="menu">

            <?php if ($UserController->isUserLoggedIn()): ?>
                <li><a href="./panel.php"><?= $_SESSION['email'] ?></a></li>
                <li><a href="../../api/logout.php">Cerrar sesión</a></li>
            <?php else: ?>

            <li><a href="./src/login.php">iniciar sesión</a></li>
            <li><a href="./src/register.php">registrarse</a></li>
            <?php endif; ?>

        </ul>
        <div class="menu-toggle">&#9776;</div>
    </nav>

    <script>
        // Toggle para la navegación en móviles
        const menuToggle = document.querySelector('.menu-toggle');
        const menu = document.querySelector('.menu');
        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('active');
        });
    </script>
</body>
</html>
