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

    //trae todas las peliculas
    public function getUsuarios($email)
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
}
