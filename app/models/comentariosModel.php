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
        $sql = "SELECT c.id,c.comentario,c.puntuacion,c.fecha_comentario , u.`email` FROM `comentarios`c INNER JOIN `usuarios`u ON c.id_usuario = u.id WHERE c.id_pelicula = ?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$idPelicula]);
        $comentarios = $stm->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    public function comentariosPeliculaXPuntuacion($idPelicula,$puntuacion)
    {
        $sql = "SELECT c.id,c.comentario,c.puntuacion,c.fecha_comentario , u.`email` FROM `comentarios`c INNER JOIN `usuarios`u ON c.id_usuario = u.id WHERE c.id_pelicula = ? && c.puntuacion=?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$idPelicula,$puntuacion]);
        $comentarios = $stm->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    public function crearComentario($idPelicula, $comentario, $puntuacion, $idUsuario, $fecha)
    {
        $sql = "INSERT INTO `comentarios`(id_pelicula, comentario, puntuacion, id_usuario, fecha_comentario) VALUES (?,?,?,?,?)";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$idPelicula, $comentario, $puntuacion, $idUsuario, $fecha]);
    }

    public function borrarComentario($idComentario)
    {
        $sql = "DELETE FROM `comentarios` WHERE id=?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$idComentario]);
    }

}
