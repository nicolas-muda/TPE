<?php
require_once('model.php');

class PelisModel extends Model
{

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

    public function controlarGenero($id)
    {
        $sql = "SELECT * FROM `peliculas` WHERE id_genero_fk=? limit 1";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$id]);
        $resultado = $stm->fetch(PDO::FETCH_OBJ);
        if ($resultado == false) {
            return true;
        } else {
            return false;
        }
    }
}
