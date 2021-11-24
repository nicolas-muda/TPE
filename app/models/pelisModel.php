<?php

//modelo de ultra pelis
class PelisModel
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
    public function getPeliculas()
    {
        $sql = "SELECT p.*,g.`genero` FROM `peliculas`p INNER JOIN `generos`g ON p.id_genero_fk = g.id_generos ORDER by id_pelicula";
        $stm = $this->PDO->prepare($sql);
        $stm->execute();
        $pelicula = $stm->fetchAll(PDO::FETCH_OBJ);
        return $pelicula;
    }

    public function obtenerPelicula($id)
    {
        $sql = "SELECT p.* , g.`genero` FROM `peliculas`p INNER JOIN `generos`g ON p.id_genero_fk = g.id_generos WHERE p.id_pelicula = ? ";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$id]);
        $pelicula = $stm->fetch(PDO::FETCH_OBJ);
        return $pelicula;
    }

    //borra una pelicula por el nombre seleccionado
    public function borrarPelicula($nombre)
    {
        $sql = "DELETE FROM peliculas WHERE nombre_pelicula=?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$nombre]);
    }

    //edita una pelicula segun el nombre seleccionado
    public function editarPelicula($nombre, $puntuacion, $duracion, $descripcion, $id_genero)
    {
        $sql = "UPDATE `peliculas` SET `puntuacion`=?,`duracion`=?,`descripcion`=?,`id_genero_fk`=? WHERE `nombre_pelicula`=?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$puntuacion, $duracion, $descripcion, $id_genero, $nombre]);
    }

    //crea una pelicula 
    public function crearPelicula($nombre, $puntuacion, $duracion, $descripcion, $id_genero)
    {
        $sql = "INSERT INTO `peliculas`(duracion, descripcion, id_genero_fk, nombre_pelicula, puntuacion) VALUES (?,?,?,?,?)";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$duracion, $descripcion, $id_genero, $nombre, $puntuacion]);
    }
}
