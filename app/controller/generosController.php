<?php
require_once('app/view/pelisView.php');
require_once('app/models/pelisModel.php');
require_once('app/models/generosModel.php');

class GeneroController
{
    private $peliculasView;
    private $peliculasModel;
    private $generosModel;
    private $helper;
    
    public function __construct()
    {
        $this->peliculasModel = new PelisModel();
        $this->peliculasView = new PelisView();
        $this->generosModel = new GeneroModel();
        $this->helper = new AuthHelper();
    }

    //borrar el genero pero primero lo controla si se puede borrar
    public function eliminarGenero()
    {
        if(isset($_POST['id'])){
            $this->helper->controlarAdmin();
            $id = $_POST['id'];
            /*la funcion controlarGenero indica si un genero tiene alguna
             pelicula asociada para ver si se puede borrar*/
            $borrar = $this->peliculasModel->controlarGenero($id);
            if ($borrar) {
                //borrar este genero
                $this->generosModel->borrarGenero($id);
                header('location:' . HOME);
            } else {
                //informar que no se puede borrar
                $peliculas = $this->peliculasModel->getPeliculas();
                $categorias = $this->generosModel->consultarGeneros();
                $this->peliculasView->mostrarHome($peliculas,$categorias,"no se puede borrar la categoria primero elimine todas las peliculas con esa categoria");
            }
        }else{
            header('location:' . ERROR);
        }
    }

    //funcion para modificar un genero
    public function modificarGenero()
    {
        if(isset($_POST['id'])&& isset($_POST['nuevo'])){
            $this->helper->controlarAdmin();
            $id = $_POST['id'];
            $nuevoNombre = $_POST['nuevo'];
            $this->generosModel->editarGenero($id, $nuevoNombre);
            header('location:' . HOME);
        }
        else{
            header('location:' . ERROR);
        }
    }

    //funcion para agregar un genero
    public function agregarGenero()
    {
        if(isset($_POST['nombre'])){
            $this->helper->controlarAdmin();
            $nombre = $_POST['nombre'];
            $this->generosModel->crearGenero($nombre);
            header('location:' . HOME);
        }
        else{
            header('location:' . ERROR);
        }
    }
    
}
