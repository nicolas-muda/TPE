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
        } else {
            $this->view->response("error hubo un problema con los parametros", 500);
        }
    }
    public function comentariosOrdenados($params)
    {
        if(isset($params[':orden']) && isset($params[':criterio']) && isset($params[':idpelicula'])){
            $consulta = "";
            $orden = $params[':orden'];
            $criterio = $params[':criterio'];
            $idPelicula = $params[':idpelicula'];
            if ($criterio == "fecha" && ($orden == "ASC" || $orden == "DESC")) {
                $consulta = "ORDER BY fecha_comentario " . $orden;
            } elseif ($criterio == "puntuacion" && ($orden == "ASC" || $orden == "DESC")) {
                $consulta = "ORDER BY puntuacion " . $orden;
            }
            $comentarios = $this->ComentariosModel->comentariosPeliculaOrdenados($idPelicula, $consulta);
            $this->view->response($comentarios, 200);
        }
        else{
            $this->view->response("error con los parametros", 500);
        }
    }
    public function obtenerComentariosPuntuacion($params)
    {
        if (isset($params[':idpelicula']) && isset($params[':puntuacion'])) {
            $idPelicula = $params[':idpelicula'];
            $puntuacion = $params[':puntuacion'];
            $comentarios = $this->ComentariosModel->comentariosPeliculaXPuntuacion($idPelicula, $puntuacion);
            $this->view->response($comentarios, 200);
        } else {
            $this->view->response("error con los parametros", 500);
        }
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
                if (isset($_SESSION['rol']) && $_SESSION['rol'] == "administrador") {
                    $this->ComentariosModel->borrarComentario($idComentario);
                    $this->view->response("se elimino correctamente", 200);
                } else {
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
