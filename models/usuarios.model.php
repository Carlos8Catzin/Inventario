<?php
include 'conexion.php';

class CrudUsuario extends Conexion{
    static public function MostrarDatosUsuario(){
        $sql = "SELECT u.IdUsuario as id, u.Nombre as Nombre, u.Usuario as Usuario, u.Foto as Foto,"
                . "r.DescripcionRol as Rol,"
                . "case Estatus when 1 then 'Activo' else 'Inactivo' end as Estatus,"
                . " u.UltLogin, u.FechaCreacion FROM inventario.usuarios u "
                . "inner join inventario.roles r on idRole = Rol WHERE u.Rol IN (2,3,4)";
        $query= Conexion::conectar()->prepare($sql);
        $query ->execute();
        return $query->fetchAll();
        $query->close();
    }
    
    
    
}

class ModelUsuario extends Conexion{
    
    static public function MdlMostrarUsuario($tabla, $item, $valor) {
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        
        $stmt -> execute();
        
        return $stmt -> fetch();
        
        $stmt-> close();
        
        $stmt = null;
    }
    
   static public function ObtenerUsuario($IdUsuario){
       $sql = "SELECT u.IdUsuario as IdUsuario,"
               . " u.Nombre as Nombre, "
               . " u.Usuario as Usuario,"
               . " r.DescripcionRol as Rol, "
               . " u.Estatus as Estatus "
               . " FROM usuarios u INNER JOIN roles r on r.idRole = u.Rol WHERE IdUsuario=:IdUsuario";
       $query= Conexion::conectar()->prepare($sql);
       $query->bindParam(":IdUsuario", $IdUsuario, PDO::PARAM_INT);
       $query->execute();
       return $query->fetch();
       $query->close();
          
   } 
}