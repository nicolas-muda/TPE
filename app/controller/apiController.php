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
        if (!(isset($params[':idpelicula']) && is_numeric($params[':idpelicula']) && $params[':idpelicula'] >= 0)) {
            $this->view->response("error hubo un problema con los parametros", 500);
            die;
        }
        $idPelicula = $params[':idpelicula'];

        if (!(isset($_GET["criterio"]) && isset($_GET["orden"]))) {
            $comentarios = $this->ComentariosModel->comentariosPelicula($idPelicula);
        } else {
            $criterio = $_GET["criterio"];
            $orden = $_GET["orden"];

            if (!($orden == "ASC" || $orden == "DESC")) {
                $orden="ASC";
            }
            if (!($criterio == "fecha_comentario" || $criterio == "puntuacion")) {
                $this->view->response("el criterio corresponde", 400);
                die;
            }
            $consulta = "ORDER BY " . $criterio . " " . $orden;
            $comentarios = $this->ComentariosModel->comentariosPeliculaOrdenados($idPelicula, $consulta);
        }
        $this->view->response($comentarios, 200);
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
        $this->helper->controlarSesion();
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
        $this->helper->controlarAdmin();
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
