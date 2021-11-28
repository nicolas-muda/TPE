<?php

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define('HOME', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/home');
define('LOGIN', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/login');
define('ERROR', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/error');
define('ADMINISTRACION', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/administracion');
define('ROLES', array("usuario", "administrador"));

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
        //paginas bases por una forma de decirlo
    case 'home':
        $pelisController->showHome();
        break;
    case 'login':
        $usuariosController->showLogin();
        break;
    case 'administracion':
        $pelisController->showAdmisnitracion();
        break;
    case 'mostrardetalles':
        $pelisController->mostrarDetalles($params[1]);
        break;
        //casos relacionados con usuarios
    case 'verificar':
        $usuariosController->verificar();
        break;
    case 'rol':
        $usuariosController->cambiarRol($params[1], $params[2]);
        break;
    case 'crear':
        $usuariosController->crearUsuario();
        break;
    case 'eliminarUsuario':
        $usuariosController->eliminarUsuario($params[1]);
        break;
    case 'desconectar':
        $usuariosController->desconectar();
        break;
        //casos sobre peliculas    
    case 'crearpelicula':
        $pelisController->agregarPelicula();
        break;
    case 'editarpelicula':
        $pelisController->modificarPelicula($params[1]);
        break;
    case 'borrarpelicula':
        $pelisController->eliminarPelicula();
        break;
    case 'eliminarPortada':
        $pelisController->eliminarPortada();
        break;
    case 'peliculasFiltradas':
        $pelisController->filtrarPeliculas();
        break;
        //casos sobre generos 
    case 'crearGenero':
        $generosController->agregarGenero();
        break;
    case 'editarGenero':
        $generosController->modificarGenero();
        break;
    case 'borrarGenero':
        $generosController->eliminarGenero();
        break;
        //error URL
    default:
        $pelisController->showError();
        break;
}
