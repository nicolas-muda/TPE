<?php
require_once('model.php');
class comentariosModel extends Model
{

    //trae todos los comentarios de una pelicula especifica
    public function comentariosPelicula($idPelicula)
    {
        $sql = "SELECT c.id,c.comentario,c.puntuacion,c.fecha_comentario , u.`email` FROM `comentarios`c INNER JOIN `usuarios`u ON c.id_usuario = u.id WHERE c.id_pelicula = ?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$idPelicula]);
        $comentarios = $stm->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }
    public function comentariosPeliculaOrdenados($idPelicula, $consulta)
    {
        $sql = "SELECT c.id,c.comentario,c.puntuacion,c.fecha_comentario , u.`email` FROM `comentarios`c INNER JOIN `usuarios`u ON c.id_usuario = u.id WHERE c.id_pelicula = ? $consulta";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$idPelicula]);
        $comentarios = $stm->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }
    public function comentariosPeliculaXPuntuacion($idPelicula, $puntuacion)
    {
        $sql = "SELECT c.id,c.comentario,c.puntuacion,c.fecha_comentario , u.`email` FROM `comentarios`c INNER JOIN `usuarios`u ON c.id_usuario = u.id WHERE c.id_pelicula = ? && c.puntuacion=?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$idPelicula, $puntuacion]);
        $comentarios = $stm->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }
    public function controlarComentariosPelicula($id){
        $sql = "SELECT * FROM `comentarios` WHERE id_pelicula=? limit 1";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$id]);
        $resultado = $stm->fetch(PDO::FETCH_OBJ);
        if ($resultado == false) {
            return true;
        } else {
            return false;
        }
    }
    public function controlarComentriosUsuario($id){
        $sql = "SELECT * FROM `comentarios` WHERE id_usuario=? limit 1";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$id]);
        $resultado = $stm->fetch(PDO::FETCH_OBJ);
        if ($resultado == false) {
            return true;
        } else {
            return false;
        }
    }
    public function crearComentario($idPelicula, $comentario, $puntuacion, $idUsuario, $fecha)
    {
        $sql = "INSERT INTO `comentarios`(id_pelicula, comentario, puntuacion, id_usuario, fecha_comentario) VALUES (?,?,?,?,?)";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$idPelicula, $comentario, $puntuacion, $idUsuario, $fecha]);
        return true;
    }

    public function borrarComentario($idComentario)
    {
        $sql = "DELETE FROM `comentarios` WHERE id=?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$idComentario]);
    }
    public function controlarComentario($idComentario)
    {
        $sql = "SELECT * FROM `comentarios` WHERE id=? limit 1";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$idComentario]);
        $resultado = $stm->fetch(PDO::FETCH_OBJ);
        return $resultado;
    }
}
