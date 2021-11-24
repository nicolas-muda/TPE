<?php
require_once('app/models/pelisModel.php');
require_once('app/models/generosModel.php');

class GeneroController
{
    private $peliculasController;
    private $peliculasModel;
    private $generosModel;
    private $helper;
    
    public function __construct()
    {
        $this->peliculasController = new PelisController();
        $this->peliculasModel = new PelisModel();
        $this->generosModel = new GeneroModel();
        $this->helper = new AuthHelper();
    }

    //borrar el genero pero primero lo controla si se puede borrar
    public function eliminarGenero()
    {
        $this->helper->controlarAdmin();
        $id = $_POST['id'];
        /*la funcion controlarGenero indica si un genero tiene alguna
         pelicula asociada para ver si se puede borrar*/
        $borrar = $this->peliculasModel->controlarGenero($id);
        if ($borrar) {
            //borrar este genero
            $this->generosModel->borrarGenero($id);
            $this->peliculasController->showHome();
        } else {
            //informar que no se puede borrar 
            $this->peliculasController->showHome("no se puede borrar la categoria primero elimine todas las peliculas con esa categoria");
        }
    }

    //funcion para modificar un genero
    public function modificarGenero()
    {
        $this->helper->controlarAdmin();
        $id = $_POST['id'];
        $nuevoNombre = $_POST['nuevo'];
        $this->generosModel->editarGenero($id, $nuevoNombre);
        $this->peliculasController->showHome();
    }

    //funcion para agregar un genero
    public function agregarGenero()
    {
        $this->helper->controlarAdmin();
        $nombre = $_POST['nombre'];
        $this->generosModel->crearGenero($nombre);
        $this->peliculasController->showHome();
    }
    
}
