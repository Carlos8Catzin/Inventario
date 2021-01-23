<?php

class CrudBitacora{
    
    static public function GrabaBitacora($proceso,$TipoMensaje,$mensaje,$IdUsuario,$Fecha){
        
        $sql = "INSERT INTO bitacora(Proceso, TipoMensaje, Mensaje, IdUsuario, Fecha) VALUES"
                . "(:Proceso, :TipoMensaje, :Mensaje, :IdUsuario, :Fecha)";
        $query= Conexion::conectar()->prepare($sql);
        $query->bindParam(":Proceso",$proceso, PDO::PARAM_STR);
        $query->bindParam(":TipoMensaje",$TipoMensaje, PDO::PARAM_STR);
        $query->bindParam(":Mensaje",$mensaje, PDO::PARAM_STR);
        $query->bindParam(":IdUsuario",$IdUsuario, PDO::PARAM_STR);
        $query->bindParam(":Fecha",$Fecha, PDO::PARAM_STR);
        
        if($query->execute()){
            return 1;
        }else{
            return 0;
        }
        
        $query ->close();
        
        $query = null;
        
}

    static public function MostrarBitacora(){
        
        $sql = "SELECT ROW_NUMBER() OVER(ORDER BY b.IdBitacora desc) as RowNum, UPPER(b.Proceso) as Proceso, 
            case b.TipoMensaje when 'A' then 'ADVERTENCIA' else 'ERROR' end as TipoMensaje, UPPER(b.Mensaje) as Mensaje, 
            UPPER(u.Usuario) as IdUsuario, b.Fecha as Fecha FROM bitacora b
            INNER JOIN usuarios u on u.IdUsuario = b.IdUsuario order by Fecha desc";
        $query= Conexion::conectar()->prepare($sql);
        $query ->execute();
        return $query->fetchAll();
        $query->close();
        
    }
    
}

?>