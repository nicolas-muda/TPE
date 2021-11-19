<?php
require_once('app/view/apiView.php');
require_once('app/models/comentariosModel.php');
class comentariosApiController
{

    private $model;
    private $view;
    private $data;
    public function __construct()
    {
        $this->model = new comentariosModel();
        $this->view = new comentariosApiView();
        $this->data = file_get_contents("php://input");
    }

    public function obtenerComentarios($params)
    {
        $idpelicula = $params[':idpelicula'];
        $comentarios = $this->model->comentariosPelicula($idpelicula);
        $this->view->response($comentarios, 200);
    }
    public function agregarComentario($params)
    {
        $idpelicula = $params[':idpelicula'];
        $this->view->response("se incerto correctamente", 200);
    }
    public function get_data() {
        return json_decode($this->data);
    }
    public function borrarComentario($params)
    {
        $idcomentario = $params[':idcomentario'];
        $this->model->borrarComentario($idcomentario);
        $this->view->response("se elimino correctamente", 200);
    }
    
}
