<?php
require_once('model.php');
class GeneroModel extends Model
{
   
    //trae todos los generos 
    public function consultarGeneros()
    {
        $sql = "SELECT * FROM `generos`";
        $stm = $this->PDO->prepare($sql);
        $stm->execute();
        $categorias = $stm->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

    public function crearGenero($nombre)
    {
        $sql = "INSERT INTO `generos`(genero) VALUES (?)";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$nombre]);
    }

    public function editarGenero($id, $nuevoNombre)
    {
        $sql = "UPDATE `generos` SET `genero`=? WHERE id_generos =?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$nuevoNombre, $id]);
    }

    //borra el genero seleccionado
    public function borrarGenero($id)
    {
        $sql = "DELETE FROM `generos` WHERE id_generos=?";
        $stm = $this->PDO->prepare($sql);
        $stm->execute([$id]);
    }
}
