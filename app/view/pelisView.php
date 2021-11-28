<?php
require_once('./libs/smarty-3.1.39/libs/Smarty.class.php');
//vistas de ultra pelis
class PelisView
{

    private $smarty;
    function __construct()
    {
        $this->smarty = new smarty();
        $this->smarty->assign('baseUrl', BASE_URL);
    }

    public function mostrarHome($peliculas, $categorias, $mensaje)
    {
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('template/menu.tpl');
    }

    public function mostrarAdministracion($usuarios,$mensaje="")
    {
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('usuarios', $usuarios);
        $this->smarty->assign('ROLES', ROLES);
        $this->smarty->display('template/administracion.tpl');
    }

    public function mostrarError()
    {
        $this->smarty->display('template/error404.tpl');
    }

    public function mostrarDetalles($pelicula,$categorias)
    {
        $this->smarty->assign('pelicula', $pelicula);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('template/detalles.tpl');
    }
}
