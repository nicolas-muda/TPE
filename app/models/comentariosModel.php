<?php

class comentariosModel
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

    //trae todos los comentarios de una pelicula especifica
    public function comentariosPelicula($idPelicula)
    {
        $sql = "SELECT * FROM `comentarios` WHERE id_pelicula=?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$idPelicula]);
        $comentarios = $stm->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    public function crearComentario($id, $comentario, $idUsuario, $fecha, $idPelicula)
    {
        $sql = "INSERT INTO `comentarios`(id, comentario, id_usuario, fecha_comentario, id_pelicula) VALUES (?,?,?,?,?)";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$id, $comentario, $idUsuario, $fecha, $idPelicula]);
    }

    public function borrarComentario($idComentario)
    {
        $sql = "DELETE FROM `comentarios` WHERE id=?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$idComentario]);
    }

}
