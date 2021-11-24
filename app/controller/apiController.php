<?php
require_once('app/view/apiView.php');
require_once('app/models/comentariosModel.php');
require_once('helpers/auth.helper.php');
class comentariosApiController
{

    private $model;
    private $view;
    private $helper;
    private $data;
    public function __construct()
    {
        $this->model = new comentariosModel();
        $this->view = new comentariosApiView();
        $this->helper = new AuthHelper();
        $this->data = file_get_contents("php://input");
    }

    public function obtenerComentarios($params)
    {
        $idPelicula = $params[':idpelicula'];
        $comentarios = $this->model->comentariosPelicula($idPelicula);
        $this->view->response($comentarios, 200);
    }
    public function obtenerComentariosPuntuacion($params)
    {
        $idPelicula = $params[':idpelicula'];
        $puntuacion = $params[':puntuacion'];
        $comentarios = $this->model->comentariosPeliculaXPuntuacion($idPelicula,$puntuacion);
        $this->view->response($comentarios, 200);
    }
    public function agregarComentario($params)
    {
        $idPelicula = $params[':idpelicula'];
        $body = $this->get_data();
        $fechaActual = date("Y-m-d H:i:s");
        $this->model->crearComentario($idPelicula, $body->comentario, $body->puntuacion, $_SESSION['id'], $fechaActual);
        $this->view->response($body, 200);
    }
    public function get_data()
    {
        return json_decode($this->data);
    }
    public function borrarComentario($params)
    {
        $idComentario = $params[':idcomentario'];
        $this->model->borrarComentario($idComentario);
        $this->view->response("se elimino correctamente", 200);
    }
}
