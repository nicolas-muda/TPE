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
        $usuario = $this->usuariosModel->getUsuarios($email);
        if (!empty($usuario) && password_verify($contraseña, $usuario->contraseña)) {
            $this->helper->logear($usuario);
            header('location:' . HOME);
        } 
        else {
            $this->showLogin('error de usuario o contraseña');
        }
    }

    public function desconectar()
    {
        $this->helper->logout();
    }
}
