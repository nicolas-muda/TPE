<?php
require_once('libs/router/Router.php');
require_once('app/controller/apiController.php');

// crea el router
$router = new Router();


// traigo todos los comentarios de la pelicula
$router->addRoute('comentario/:idpelicula', 'GET', 'comentariosApiController', 'obtenerComentarios');
// traigo todos los comentarios de la pelicula
$router->addRoute('comentario/:idpelicula/:criterio/:orden', 'GET', 'comentariosApiController', 'comentariosOrdenados');
// traigo todos los comentarios de la pelicula que tengan x puntuacion
$router->addRoute('comentario/:idpelicula/:puntuacion', 'GET', 'comentariosApiController', 'obtenerComentariosPuntuacion');
//agrego comentario en la pelicula
$router->addRoute('comentario/:idpelicula', 'POST', 'comentariosApiController', 'agregarComentario');
//borro comentario de la pelicula
$router->addRoute('comentario/:idcomentario', 'DELETE', 'comentariosApiController', 'borrarComentario');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
