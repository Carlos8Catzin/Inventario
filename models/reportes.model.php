<?php 
class CrudReportes{
    
    static public function MostrarReportes(){
        
        $sql = "SELECT ROW_NUMBER() OVER(ORDER BY IdReporte ASC) as Num, IdReporte, case TipoReporte when 1 then 'Control' else 'Aviso' end as TipoReporte, TituloReporte,
                DescReporte, FechaCreacion, case StatusReporte when 1 then 'ACTIVO' else 'INACTIVO' end as StatusReporte FROM reportes
                WHERE TipoReporte = 1 ORDER BY IdReporte ASC";
        $query= Conexion::conectar()->prepare($sql);
        $query ->execute();
        
        if($query->rowCount()>0){
                return $query ->fetchAll();
            }else{
               return 0; 
            }
        $query->close();
        
    }
    
    static public function InsertarReporte($datos){
       $consql = Conexion::conectar()->prepare("INSERT INTO reportes(TituloReporte,ArchivoReporte,DescReporte,IdUsuario, FechaCreacion)"
                . "VALUES(:TituloReporte,:ArchivoReporte,:DescReporte,:IdUsuario, NOW())");

        $consql->bindParam(":TituloReporte",$datos['TituloReporte'], PDO::PARAM_STR);
        $consql->bindParam(":ArchivoReporte",$datos['ArchivoReporte'], PDO::PARAM_STR);
        $consql->bindParam(":DescReporte",$datos['DescReporte'], PDO::PARAM_STR);
        $consql->bindParam(":IdUsuario",$datos['IdUsuario'], PDO::PARAM_STR);
        
        if($consql->execute()){
            return 1;
        }else{
            return 0;
        }
        
        $consql->close();
        
        $consql = null;
       
    }
    
        static public function mdlMostrarVentasEdit($item, $valor){
            $stmt = Conexion::conectar() ->prepare("SELECT * FROM reportes WHERE IdReporte = :$item");
            $stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt ->execute();
            
            if($stmt->rowCount()>0){
                return $stmt ->fetchAll();
            }else{
               return 0; 
            }

        $stmt -> close();
        $stmt = null;
    }
    
        static public function EditarReporte($datos){
       $consql = Conexion::conectar()->prepare("UPDATE reportes SET TituloReporte=:TituloReporte,ArchivoReporte=:ArchivoReporte,DescReporte=:DescReporte,"
               ."StatusReporte=:StatusReporte WHERE IdReporte=:IdReporte");
        $consql->bindParam(":IdReporte",$datos['IdReporte'], PDO::PARAM_STR);
        $consql->bindParam(":TituloReporte",$datos['TituloReporte'], PDO::PARAM_STR);
        $consql->bindParam(":ArchivoReporte",$datos['ArchivoReporte'], PDO::PARAM_STR);
        $consql->bindParam(":DescReporte",$datos['DescReporte'], PDO::PARAM_STR);
        $consql->bindParam(":StatusReporte",$datos['StatusReporte'], PDO::PARAM_STR);
        
        if($consql->execute()){
            return 1;
        }else{
            return 0;
        }
        
        $consql->close();
        
        $consql = null;
       
    }
    
    static public function ReporteAction($action){
       $consql = Conexion::conectar()->prepare("UPDATE reportes SET StatusReporte=:StatusReporte");
        $consql->bindParam(":StatusReporte",$action, PDO::PARAM_STR);
        
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
    static public function mdlMostrarReportes($item, $valor){
        if($item != null){
            $stmt = Conexion::conectar() ->prepare("SELECT * FROM reportes WHERE $item = :$item ORDER by IdReporte DESC");
            $stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt ->execute();
            return $stmt ->fetchAll();
        }else{
            $stmt = Conexion::conectar() ->prepare("SELECT * FROM reportes ORDER by CodFactura DESC");
            $stmt ->execute();
            return $stmt ->fetchAll();
        }
        $stmt -> close();
        $stmt = null;
    }

}
?>