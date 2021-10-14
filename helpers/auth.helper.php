<?php

class AuthHelper
{

    public function __construct()
    {
        $this->startSession();
    }

    public function startSession()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    public function logear($usuario)
    {
        $this->startSession();
        $_SESSION['id'] = $usuario->id;
        $_SESSION['email'] = $usuario->email;
    }

    public function logout()
    {
        $this->startSession();
        session_destroy();
        header('location:' . LOGIN);
    }
}
