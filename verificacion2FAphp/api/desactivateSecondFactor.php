<?php

session_start();

require('../vendor/autoload.php');

use App\Controllers\UserController;

$UserController = new UserController();

if (!$UserController->isUserLoggedIn()) {
    http_response_code(401);	
    echo 'No existe un autenticacion';
    exit;
}

$UserController->desactivateSecondFactor();