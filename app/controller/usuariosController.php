<?php
require_once('app/view/usuariosView.php');
require_once('app/models/usuariosModel.php');
require_once('helpers/auth.helper.php');

class UsuariosController
{
    private $usuariosView;
    private $usuariosModel;
    private $helper;

    public function __construct()
    {
        $this->usuariosView = new UsuariosView();
        $this->usuariosModel = new UsuariosModel();
        $this->helper = new AuthHelper();
    }

    public function showLogin($mensaje = '')
    {
        $this->usuariosView->mostrarLogin($mensaje);
    }

    public function verificar()
    {
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        //lo que hace getUsuario es que al email que le paso lo busca en la base de datos y trae todos los datos del usuario con ese mismo email
        $usuario = $this->usuariosModel->getUsuario($email);
        if (!empty($usuario) && password_verify($contraseña, $usuario->contraseña)) {
            $this->helper->logear($usuario);
            header('location:' . HOME);
        } else {
            $this->showLogin('error de usuario o contraseña');
        }
    }

    public function cambiarRol($id, $rol)
    {
        $this->helper->controlarAdmin();
        $this->usuariosModel->cambioRol($id,$rol);
        header('location:' . ADMINISTRACION);
    }

    public function desconectar()
    {
        $this->helper->logout();
    }

    public function crearUsuario()
    {
        /*recibe el eamil la contraseña y la confirmacion si estas son iguales va al verificar usuario que se 
        encarga de asegurar que no haya dos usuarios con el mismo email si esta repetido muestra un mensaje
        si no esta repetido crea el usuario*/
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        $confirmacion = $_POST['confirmacion'];
        if ($contraseña == $confirmacion) {
            $crear = $this->usuariosModel->controlarNombreUsuario($email);
            if ($crear) {
                $contraseñaHash = password_hash($contraseña, PASSWORD_BCRYPT);
                $this->usuariosModel->agregarUsuario($email, $contraseñaHash);
                //este verificar es para que entre de una 
                $this->verificar();
            } else {
                $this->showLogin('error email repetido');
            }
        } else {
            $this->showLogin('error en la confirmacion de contraseña');
        }
    }

    public function eliminarUsuario($id)
    {
        if ($_SESSION['id'] != $id) {
            $this->usuariosModel->eliminarUsuario($id);
        }
        header('location:' . ADMINISTRACION);
    }
}
