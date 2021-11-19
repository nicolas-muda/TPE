<?php

class GeneroModel
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

    //controla que el genero no tenga ningun item asociado asi se puede borrar si es true lo borra sino no
    //el limit es cuando encuentra el primero que cumpla con la condicion deja de buscar
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
