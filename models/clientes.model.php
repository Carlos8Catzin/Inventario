<?php
class ModelClientes{
   static public function mdlMostrarClientes($tabla, $item, $valor){
        if($item != null){
            $stmt = Conexion::conectar() ->prepare("SELECT * FROM $tabla WHETE $item = :$item ORDER by IdCliente DESC");
            $stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt ->execute();
            return $stmt ->fetchAll();
        }else{
            $stmt = Conexion::conectar() ->prepare("SELECT * FROM $tabla ORDER by IdCliente DESC");
            $stmt ->execute();
            return $stmt ->fetchAll();
        }
        $stmt -> close();
        $stmt = null;
   } 
   static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor2) {
        $sql = "UPDATE $tabla SET $item1 = :$item1, FUltimaCompra = NOW() WHERE IdCliente= :id";
        $query= Conexion::conectar()->prepare($sql);
        $query->bindParam(":".$item1, $valor1, PDO::PARAM_INT);
        $query->bindParam(":id", $valor2, PDO::PARAM_INT);
        if($query ->execute()){
            return 1;
        }else{
            return 0;
        }
        $query->close();
        $query = null;
    }
}
class CrudClientes{
    static public function MostrarDatosCliente(){
        $sql = "SELECT * FROM clientes WHERE IdCliente NOT IN(1) order by IdCliente";
        $query= Conexion::conectar()->prepare($sql);
        $query ->execute();
        return $query->fetchAll();
        $query->close();
    }
    static public function MostrarTodosCliente(){
        $sql = "SELECT * FROM clientes WHERE IdCliente order by IdCliente";
        $query= Conexion::conectar()->prepare($sql);
        $query ->execute();
        return $query->fetchAll();
        $query->close();
    }
    static public function ObtenerCodigoCliente(){
       $sql = "SELECT IdCliente FROM clientes order by IdCliente desc LIMIT 1";
        $query= Conexion::conectar()->prepare($sql);
        $query ->execute();
        return $query-> fetch();
        $query->close();
    }
    
    static public function ObtenerCliente($IdCliente){
        $sql = "SELECT * FROM clientes WHERE IdCliente= :IdCliente";
        $query= Conexion::conectar()->prepare($sql);
       $query->bindParam(":IdCliente", $IdCliente, PDO::PARAM_INT);
       $query->execute();
      return $query->fetch();
       $query->close();
    }
    
    static public function InsertarCliente($datos){
       $consql = Conexion::conectar()->prepare("INSERT INTO clientes(NombreCliente,ApellidoCliente,Email,DireccionCliente,FechaNacimiento,FechaRegistro,IdUsuario)"
                . "VALUES(:NombreCliente,:ApellidoCliente,:Email,:DireccionCliente,:FechaNacimiento,:FechaRegistro,:IdUsuario)");

        $consql->bindParam(":NombreCliente",$datos['Nombre'], PDO::PARAM_STR);
        $consql->bindParam(":ApellidoCliente",$datos['Apellido'], PDO::PARAM_STR);
        $consql->bindParam(":Email",$datos['Email'], PDO::PARAM_STR);
        $consql->bindParam(":DireccionCliente",$datos['Direccion'], PDO::PARAM_STR);
        $consql->bindParam(":FechaNacimiento",$datos['FechaNac'], PDO::PARAM_STR);
        $consql->bindParam(":FechaRegistro",$datos['FechaReg'], PDO::PARAM_STR);
        $consql->bindParam(":IdUsuario",$datos['IdUsuario'], PDO::PARAM_STR);
        
        if($consql->execute()){
            return 1;
        }else{
            return 0;
        }
        
        $consql->close();
        
        $consql = null;
       
    }
    static public function EditarCliente($datos){
       $consql = Conexion::conectar()->prepare("UPDATE clientes SET NombreCliente=:NombreCliente,ApellidoCliente=:ApellidoCliente,Email=:Email,"
               ."DireccionCliente=:DireccionCliente,FechaNacimiento=:FechaNacimiento WHERE IdCliente=:IdCliente");
        $consql->bindParam(":IdCliente",$datos['IdCliente'], PDO::PARAM_STR);
        $consql->bindParam(":NombreCliente",$datos['Nombre'], PDO::PARAM_STR);
        $consql->bindParam(":ApellidoCliente",$datos['Apellido'], PDO::PARAM_STR);
        $consql->bindParam(":Email",$datos['Email'], PDO::PARAM_STR);
        $consql->bindParam(":DireccionCliente",$datos['Direccion'], PDO::PARAM_STR);
        $consql->bindParam(":FechaNacimiento",$datos['FechaNac'], PDO::PARAM_STR);
        
        if($consql->execute()){
            return 1;
        }else{
            return 0;
        }
        
        $consql->close();
        
        $consql = null;
       
    }
    
}

?>