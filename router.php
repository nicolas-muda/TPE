<?php

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define('HOME', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/home');
define('LOGIN', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/login');


require_once('app/controller/pelisController.php');
require_once('app/controller/generosController.php');
require_once('app/controller/usuariosController.php');

$pelisController = new PelisController();
$generosController = new GeneroController();
$usuariosController = new UsuariosController();

if (!empty($_GET['action'])) {
    $accion = $_GET['action'];
} else {
    $accion = 'home';
}

$params = explode('/', $accion);

switch ($params[0]) {

    case 'login':
        $usuariosController->showLogin();
        break;
    case 'verificar':
        $usuariosController->verificar();
        break;
    case 'desconectar':
        $usuariosController->desconectar();
        break;
    case 'home':
        $pelisController->showHome();
        break;
    case 'crearpelicula':
        $pelisController->agregarPelicula();
        break;
    case 'editarpelicula':
        $pelisController->modificarPelicula();
        break;
    case 'borrarpelicula':
        $pelisController->eliminarPelicula();
        break;
    case 'crearGenero':
        $generosController->agregarGenero();
        break;
    case 'editarGenero':
        $generosController->modificarGenero();
        break;
    case 'borrarGenero':
        $generosController->eliminarGenero();
        break;
    default:
        $pelisController->showError();
        break;
}
