<?php

//modelo de ultra pelis
class UsuariosModel
{

    private $PDO;
    public function __construct()
    {
        $this->conectar();
    }

    //conectar crea el pdo
    private function conectar()
    {
        //direccion ip o nombre del servidor(normal:localhost)
        $host = 'localhost';
        //direccion del puerto (normal: 3306)
        $port = 3306;
        //nombre de la base de datos
        $db = 'ultra_pelis';
        // usuario de coneccion(normal: root)
        $user = 'root';
        //contraseña del usuario(normal: nada o root)
        $password = '';

        $dsn = "mysql:host=$host:$port;dbname=$db;charset=UTF8";

        try {
            $this->PDO = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //sirve para mostrar todos los usuarios en la pagina administracion
    public function getUsuarios()
    {
        $sql = "SELECT * FROM `usuarios`";
        $stm = $this->PDO->prepare($sql);
        $stm->execute();
        $usuario = $stm->fetchAll(PDO::FETCH_OBJ);
        return $usuario;
    }

    //sirve para controlar el usuario y contraseña
    public function getUsuario($email)
    {
        $sql = "SELECT * FROM `usuarios` WHERE email=?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$email]);
        $usuario = $stm->fetchAll(PDO::FETCH_OBJ);

        if (count($usuario) > 0) {
            return  $usuario[0];
        }
        return null;
    }

    public function agregarUsuario($email, $contraseña)
    {
        $sql = "INSERT INTO `usuarios`(email,contraseña,rol) VALUES (?,?,?)";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$email, $contraseña, "usuario"]);
    }

    public function controlarNombreUsuario($nombreUsuario)
    {
        $sql = "SELECT * FROM `usuarios` WHERE email=? limit 1";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$nombreUsuario]);
        $resultado = $stm->fetch(PDO::FETCH_OBJ);
        if ($resultado == false) {
            return true;
        } else {
            return false;
        }
    }

    public function cambioRol($idUsuario, $rolActual)
    {
        $sql = "UPDATE `usuarios` SET rol=? WHERE id=? ";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$rolActual, $idUsuario]);
    }

    public function eliminarUsuario($idUsuario)
    {
        $sql = "DELETE FROM `usuarios` WHERE id=? ";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$idUsuario]);
    }
}
