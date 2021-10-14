<?php
require_once('app/models/pelisModel.php');
require_once('app/view/pelisView.php');
require_once('app/models/generosModel.php');

//controlador de ultra pelis
class PelisController
{
    private $peliculasModel;
    private $peliculasView;
    //llamo al pelis model, al view y al generos model para obtener sus funciones
    public function __construct()
    {
        $this->peliculasModel = new PelisModel();
        $this->peliculasView = new PelisView();
        $this->generosModel = new GeneroModel();
    }

    /*muestro el home, primero obtengo todas las peliculas con el getpeliculas y
    luego se las paso al mostrar home para que las muestre en la tabla*/
    public function showHome($mensaje = '')
    {
        $peliculas = $this->peliculasModel->getPeliculas();
        $categorias = $this->generosModel->consultarGeneros();
        $this->peliculasView->mostrarHome($peliculas, $categorias, $mensaje);
    }

    //va al mostrar error cuando hay un problema en la URL
    public function showError()
    {
        $this->peliculasView->mostrarError();
    }

    //crea una pelicula pero primero verifica si hay un usuario activo
    public function agregarPelicula()
    {
        $controlar = $this->controlarSesion();
        if (!$controlar) {
            $this->checkearUsuario();
        }
        $nombre = $_POST['nombre'];
        $puntuacion = $_POST['puntuacion'];
        $duracion = $_POST['duracion'];
        $descripcion = $_POST['descripcion'];
        $id_genero = $_POST['genero'];
        $this->peliculasModel->crearPelicula($nombre, $puntuacion, $duracion, $descripcion, $id_genero);
        $this->showHome();
    }

    //modifico una pelicula
    public function modificarPelicula()
    {
        $controlar = $this->controlarSesion();
        if (!$controlar) {
            $this->checkearUsuario();
        }
        $nombre = $_POST['nombre'];
        $puntuacion = $_POST['puntuacion'];
        $duracion = $_POST['duracion'];
        $descripcion = $_POST['descripcion'];
        $id_genero = $_POST['genero'];
        $this->peliculasModel->editarPelicula($nombre, $puntuacion, $duracion, $descripcion, $id_genero);
        $this->showHome();
    }

    //elimino una pelicula
    public function eliminarPelicula()
    {
        $controlar = $this->controlarSesion();
        if (!$controlar) {
            $this->checkearUsuario();
        }
        $nombre = $_POST['nombre'];
        $this->peliculasModel->borrarPelicula($nombre);
        $this->showHome();
    }

    private function checkearUsuario()
    {
        header('location:' . LOGIN);
        die();
    }

    private function controlarSesion()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if (empty($_SESSION['id'])) {
            return false;
        } else {
            return true;
        }
    }
}
