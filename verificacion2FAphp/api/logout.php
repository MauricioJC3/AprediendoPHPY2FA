<?php

session_start();

require('../vendor/autoload.php');

$UserController = new App\Controllers\UserController();

$UserController->logout();

header('Location: ../src/login.php');