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

$rawData = file_get_contents('php://input');

$data = json_decode($rawData, true);

$res = $UserController->activateSecondFactor($data['secret'], $data['code']);

if (!$res) 
{
    http_response_code(400);
    echo 'codigo incorrecto';
}else {
    http_response_code(200);
}