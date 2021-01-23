<?php
include 'conexion.php';

class CrudCategoria{
    static public function MostrarDatosCategorias(){
        $sql = "SELECT * FROM categorias order by IdCategoria asc";
        $query= Conexion::conectar()->prepare($sql);
        $query ->execute();
        return $query->fetchAll();
        $query->close();
    }
    
    static public function ObtenerCategoria($IdCategoria){
        $sql = "SELECT * FROM categorias WHERE IdCategoria= :IdCategoria";
        $query= Conexion::conectar()->prepare($sql);
       $query->bindParam(":IdCategoria", $IdCategoria, PDO::PARAM_INT);
       $query->execute();
       return $query->fetch();
       $query->close();
    }
    
    
}
?>