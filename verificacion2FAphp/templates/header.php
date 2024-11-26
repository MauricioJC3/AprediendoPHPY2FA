<?php

if(!isset($_SESSION)) {
    session_start();
}


//Rutas de vendor para archivos fuera de carpetas comom archivos de vendor dentro de carpetas
if (file_exists('../vendor/autoload.php')) {
    require '../vendor/autoload.php';
} elseif (file_exists('./vendor/autoload.php')) {
    require './vendor/autoload.php';
} elseif(file_exists('../../vendor/autoload.php')) {
    require '../../vendor/autoload.php';
}

$UserController = new App\Controllers\UserController();