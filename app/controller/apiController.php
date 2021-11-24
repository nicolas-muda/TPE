<?php
require_once('app/view/apiView.php');
require_once('app/models/comentariosModel.php');
require_once('helpers/auth.helper.php');
class comentariosApiController
{

    private $ComentariosModel;
    private $view;
    private $helper;
    private $data;
    public function __construct()
    {
        $this->ComentariosModel = new comentariosModel();
        $this->view = new comentariosApiView();
        $this->helper = new AuthHelper();
        $this->data = file_get_contents("php://input");
    }

    public function obtenerComentarios($params)
    {
        if (isset($params[':idpelicula']) && is_numeric($params[':idpelicula']) && $params[':idpelicula'] >= 0) {
            $idPelicula = $params[':idpelicula'];
            $comentarios = $this->ComentariosModel->comentariosPelicula($idPelicula);
            $this->view->response($comentarios, 200);
        }
        else{
            $this->view->response("error hubo un problema con los parametros", 404);
        }
    }
    public function comentariosOrdenados($params)
    {
            $orden = $params[':orden'];
            $criterio = $params[':criterio'];
            $idPelicula = $params[':idpelicula'];
            if ($criterio == "fecha") {
                $consulta = "ORDER BY fecha_comentario " . $orden;
            } elseif($criterio == "puntuacion") {
                $consulta = "ORDER BY puntuacion " . $orden;
            }
            $comentarios = $this->ComentariosModel->comentariosPeliculaOrdenados($idPelicula, $consulta);
            $this->view->response($comentarios, 200);
    }
    public function obtenerComentariosPuntuacion($params)
    {
        $idPelicula = $params[':idpelicula'];
        $puntuacion = $params[':puntuacion'];
        $comentarios = $this->ComentariosModel->comentariosPeliculaXPuntuacion($idPelicula, $puntuacion);
        $this->view->response($comentarios, 200);
    }
    public function agregarComentario($params)
    {
        if (isset($params[':idpelicula']) && is_numeric($params[':idpelicula']) && $params[':idpelicula'] >= 0) {
            $idPelicula = $params[':idpelicula'];
            $body = $this->get_data();
            $fechaActual = date("Y-m-d H:i:s");
            if (isset($body)) {
                $creado = $this->ComentariosModel->crearComentario($idPelicula, $body->comentario, $body->puntuacion, $_SESSION['id'], $fechaActual);
                if ($creado) {
                    $this->view->response("Se insertó correctamente", 200);
                } else {
                    $this->view->response("Hubo un error al crear el comentario", 500);
                }
            } else {
                $this->view->response("Hubo un error en el traslado de los datos", 404);
            }
        } else {
            $this->view->response("error hubo un problema con los parametros", 404);
        }
    }
    public function get_data()
    {
        return json_decode($this->data);
    }
    public function borrarComentario($params)
    {
        if (isset($params[':idcomentario']) && is_numeric($params[':idcomentario']) && $params[':idcomentario'] >= 0) {
            $idComentario = $params[':idcomentario'];
            $comentarioBorrar = $this->ComentariosModel->controlarComentario($idComentario);
            if ($comentarioBorrar) {
                if($_SESSION['rol']=="administrador"){
                    $this->ComentariosModel->borrarComentario($idComentario);
                    $this->view->response("se elimino correctamente", 200);
                }
                else{
                    $this->view->response("error no sos administrador", 500);
                }
            } else {
                $this->view->response("error no se encontro el comentario", 404);
            }
        } else {
            $this->view->response("error hubo un problema con los parametros", 404);
        }
    }
}
