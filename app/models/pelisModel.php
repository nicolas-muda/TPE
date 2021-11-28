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
        $sql = "SELECT p.* , g.genero FROM peliculas p INNER JOIN generos g ON p.id_genero_fk = g.id_generos WHERE p.id_pelicula = ? ";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$id]);
        $pelicula = $stm->fetch(PDO::FETCH_OBJ);
        return $pelicula;
    }

    //borra una pelicula por el nombre seleccionado
    public function borrarPelicula($id)
    {
        $sql = "DELETE FROM peliculas WHERE id_pelicula=?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$id]);
    }

    //edita una pelicula segun el nombre seleccionado
    public function editarPelicula($idpelicula, $nombre, $puntuacion, $duracion, $descripcion, $id_genero, $imagen = null, $portadaVieja)
    {
        $pathing = $portadaVieja;

        if ($imagen) {
            $pathing = $this->uploadFiles($imagen, $pathing);
        }

        $sql = "UPDATE peliculas SET nombre_pelicula=?,puntuacion=?,duracion=?,descripcion=?,id_genero_fk=?,portada=? WHERE id_pelicula=?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$nombre, $puntuacion, $duracion, $descripcion, $id_genero, $pathing, $idpelicula]);
    }

    public function uploadFiles($imagen, $old = null)
    {
        $filePath = "img/portadas/" . uniqid("", true) . "." . strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION));
        $ok = move_uploaded_file($imagen["tmp_name"], $filePath);
        if ($ok && $old) {
            unlink($old);
        }
        return $filePath;
    }

    public function eliminarPortada($idPelicula)
    {
        $sql = "UPDATE peliculas SET portada=? WHERE id_pelicula=?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([null, $idPelicula]);
    }

    //crea una pelicula 
    public function crearPelicula($nombre, $puntuacion, $duracion, $descripcion, $id_genero, $portada)
    {
        $pathImg = null;

        if ($portada) {
            $pathImg = $this->cargarPortada($portada);
        }

        $sql = "INSERT INTO peliculas(duracion, descripcion, id_genero_fk, nombre_pelicula, puntuacion, portada) VALUES (?,?,?,?,?,?)";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$duracion, $descripcion, $id_genero, $nombre, $puntuacion, $pathImg]);
    }


    public function cargarPortada($portada)
    {
        $filePath = "img/portadas/" . uniqid("", true) . "." . strtolower(pathinfo($portada['name'], PATHINFO_EXTENSION));
        move_uploaded_file($portada["tmp_name"], $filePath);
        return $filePath;
    }

    public function PortadaPelicula($id)
    {
        $sql = "SELECT portada FROM peliculas WHERE id_pelicula=? limit 1";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$id]);
        $resultado = $stm->fetch(PDO::FETCH_OBJ);
        return $resultado;
    }

    public function controlarGenero($id)
    {
        $sql = "SELECT * FROM peliculas WHERE id_genero_fk=? limit 1";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$id]);
        $resultado = $stm->fetch(PDO::FETCH_OBJ);
        if ($resultado == false) {
            return true;
        } else {
            return false;
        }
    }

    public function getPeliculasFiltradas($genero)
    {
        $sql = "SELECT p.*, g.genero FROM peliculas p INNER JOIN generos g ON p.id_genero_fk = g.id_generos WHERE p.id_genero_fk = ?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$genero]);
        $pelicula = $stm->fetchAll(PDO::FETCH_OBJ);
        return $pelicula;
    }
}
