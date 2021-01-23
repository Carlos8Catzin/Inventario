<?php 
class CrudProveedores{
    
    static public function MostrarProveedores(){
        
        $sql = "SELECT * FROM proveedores ORDER BY IdProvedor ASC";
        $query= Conexion::conectar()->prepare($sql);
        $query ->execute();
        return $query->fetchAll();
        $query->close();
        
    }
    
    static public function InsertarProveedores($datos){
       $consql = Conexion::conectar()->prepare("INSERT INTO proveedores(NombreProveedor,RazonSocial,Domicilio,Poblacion,CodigoPostal,Telefono,Pais,Email,URL, FechaCreacion)"
                . "VALUES(:NombreProveedor,:RazonSocial,:Domicilio,:Poblacion,:CodigoPostal,:Telefono,:Pais,:Email,:URL, NOW())");

        $consql->bindParam(":NombreProveedor",$datos['NombreProveedor'], PDO::PARAM_STR);
        $consql->bindParam(":RazonSocial",$datos['RazonSocial'], PDO::PARAM_STR);
        $consql->bindParam(":Domicilio",$datos['Domicilio'], PDO::PARAM_STR);
        $consql->bindParam(":Poblacion",$datos['Poblacion'], PDO::PARAM_STR);
        $consql->bindParam(":CodigoPostal",$datos['CodigoPostal'], PDO::PARAM_STR);
        $consql->bindParam(":Telefono",$datos['Telefono'], PDO::PARAM_STR);
        $consql->bindParam(":Pais",$datos['Pais'], PDO::PARAM_STR);
        $consql->bindParam(":Email",$datos['Email'], PDO::PARAM_STR);
        $consql->bindParam(":URL",$datos['URL'], PDO::PARAM_STR);
        
        if($consql->execute()){
            return 1;
        }else{
            return 0;
        }
        
        $consql->close();
        
        $consql = null;
       
    }
}

class ModelReporte{
    static public function mdlMostrarProveedores($item, $valor){
        if($item != null){
            $stmt = Conexion::conectar() ->prepare("SELECT * FROM proveedores WHERE $item = :$item ORDER by IdProvedor DESC");
            $stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt ->execute();
            return $stmt ->fetchAll();
        }else{
            $stmt = Conexion::conectar() ->prepare("SELECT * FROM proveedores ORDER by IdProvedor DESC");
            $stmt ->execute();
            return $stmt ->fetchAll();
        }
        $stmt -> close();
        $stmt = null;
    }

}
?>