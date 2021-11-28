<?php
require_once('app/models/pelisModel.php');
require_once('app/view/pelisView.php');
require_once('app/models/generosModel.php');
require_once('app/models/comentariosModel.php');
require_once('helpers/auth.helper.php');

//controlador de ultra pelis
class PelisController
{
    private $peliculasModel;
    private $peliculasView;
    private $generosModel;
    private $usuariosModel;
    private $comentariosModel;
    private $helper;
    //llamo al pelis model, al view y al generos model para obtener sus funciones
    public function __construct()
    {
        $this->peliculasModel = new PelisModel();
        $this->peliculasView = new PelisView();
        $this->generosModel = new GeneroModel();
        $this->usuariosModel = new usuariosModel();
        $this->comentariosModel = new comentariosModel();
        $this->helper = new AuthHelper();
    }

    /*muestro el home, primero obtengo todas las peliculas con el getpeliculas y
    luego se las paso al mostrar home para que las muestre en la tabla*/
    public function showHome($mensaje = '')
    {
        $peliculas = $this->peliculasModel->getPeliculas();
        $categorias = $this->generosModel->consultarGeneros();
        $this->peliculasView->mostrarHome($peliculas, $categorias, $mensaje);
    }

    //filtro las peliculas
    public function filtrarPeliculas()
    {
        $mensaje = "";
        $genero = $_POST['genero'];
        $peliculas = $this->peliculasModel->getPeliculasFiltradas($genero);

        $categorias = $this->generosModel->consultarGeneros();
        $this->peliculasView->mostrarHome($peliculas, $categorias, $mensaje);
    }

    public function showAdmisnitracion()
    {
        $this->helper->controlarAdmin();
        $usuarios = $this->usuariosModel->getUsuarios();
        $this->peliculasView->mostrarAdministracion($usuarios);
    }

    //va al mostrar error cuando hay un problema en la URL
    public function showError()
    {
        $this->peliculasView->mostrarError();
    }

    //crea una pelicula pero primero verifica si hay un usuario activo
    public function agregarPelicula()
    {
        $this->helper->controlarAdmin();
        if (isset($_POST['nombre']) && isset($_POST['puntuacion']) && isset($_POST['duracion']) && isset($_POST['descripcion']) && isset($_POST['genero'])) {
            $this->helper->controlarSesion();
            $nombre = $_POST['nombre'];
            $puntuacion = $_POST['puntuacion'];
            $duracion = $_POST['duracion'];
            $descripcion = $_POST['descripcion'];
            $id_genero = $_POST['genero'];
            if ($_FILES['portada']['type'] == "image/jpg" || $_FILES['portada']['type'] == "image/jpeg" || $_FILES['portada']['type'] == "image/png") {
                $imagenPortada = $_FILES['portada'];
                $this->peliculasModel->crearPelicula($nombre, $puntuacion, $duracion, $descripcion, $id_genero, $imagenPortada);
                $this->showHome();
            } else {
                $this->peliculasModel->crearPelicula($nombre, $puntuacion, $duracion, $descripcion, $id_genero, null);
                $this->showHome("la portada no se agrego no tiene formato valido (jpg,jpeg o png) editar en el ver detalles");
            }
        } else {
            $this->showError();
        }
    }

    //modifico una pelicula
    public function modificarPelicula($id)
    {
        $this->helper->controlarAdmin();
        if (isset($id) && isset($_POST['nombre']) && isset($_POST['puntuacion']) && isset($_POST['duracion']) && isset($_POST['descripcion']) && isset($_POST['genero'])) {

            if ($_FILES['portadaNueva']['type'] == "image/jpg" || $_FILES['portadaNueva']['type'] == "image/jpeg" || $_FILES['portadaNueva']['type'] == "image/png") {
                $imagen = $_FILES['portadaNueva'];
            }else{
                $imagen=null;
            }

            $idpelicula = $id;
            $portadaVieja = $_POST['portadaVieja'];
            $nombre = $_POST['nombre'];
            $puntuacion = $_POST['puntuacion'];
            $duracion = $_POST['duracion'];
            $descripcion = $_POST['descripcion'];
            $id_genero = $_POST['genero'];

            $this->peliculasModel->editarPelicula($idpelicula, $nombre, $puntuacion, $duracion, $descripcion, $id_genero, $imagen, $portadaVieja);
            $this->showHome();
        } else {
            $this->showError();
        }
    }

    //elimino una pelicula
    public function eliminarPelicula()
    {
        $this->helper->controlarAdmin();
        if (isset($_POST['id'])) {
            $this->helper->controlarSesion();
            $idPelicula = $_POST['id'];
            $controlar=$this->comentariosModel->controlarComentariosPelicula($idPelicula);
            if($controlar){
                $this->peliculasModel->borrarPelicula($idPelicula);
                $this->showHome();
            }else{
                $this->showHome("error para borrar la pelicula seleccionada tiene que borrar todos sus comentarios");
            }
        } else {
            $this->showError();
        }
    }

    public function eliminarPortada()
    {
        $this->helper->controlarAdmin();
        if (isset($_POST['id'])) {
            $this->helper->controlarSesion();
            $idPelicula = $_POST['id'];
            $this->peliculasModel->borrarPelicula($idPelicula);
            $this->showHome();
        } else {
            $this->showError();
        }
    }

    public function mostrarDetalles($id)
    {
        $pelicula = $this->peliculasModel->obtenerPelicula($id);
        $categorias = $this->generosModel->consultarGeneros();
        $this->peliculasView->mostrarDetalles($pelicula, $categorias);
    }

}
