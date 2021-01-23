<?php 
class CrudMensajes{
    static public function MostrarUsuariosMensaje($item, $valor){
        $sql = "SELECT u.IdUsuario as id, u.Nombre as Nombre, u.Usuario as Usuario, u.Foto as Foto,"
                . "r.DescripcionRol as Rol,"
                . "case Estatus when 1 then 'Activo' else 'Inactivo' end as Estatus,"
                . " u.UltLogin, u.FechaCreacion FROM inventario.usuarios u "
                . "inner join inventario.roles r on idRole = Rol WHERE $item != :$item";
        $stmt = Conexion::conectar() ->prepare($sql);
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
    static public function ObtenerInbox($valor1, $valor2){
        $sql = "SELECT * FROM mensajes WHERE IdUsuarioEmisor= :IdUsuarioEmisor AND IdUsuarioReceptor = :IdUsuarioReceptor";
        $stmt = Conexion::conectar() ->prepare($sql);
                $stmt ->bindParam(":IdUsuarioEmisor", $valor1, PDO::PARAM_STR);
                $stmt ->bindParam(":IdUsuarioReceptor", $valor2, PDO::PARAM_STR);
                
                $stmt ->execute();
            
            if($stmt->rowCount()>0){
                return $stmt ->fetchAll();
            }else{
               return 0; 
            }

        $stmt -> close();
        $stmt = null;
    
    }
    static public function ObtenerInboxReceptor($valor1, $valor2){
        $sql = "SELECT * FROM mensajes WHERE IdUsuarioEmisor= :IdUsuarioEmisor AND IdUsuarioReceptor = :IdUsuarioReceptor";
        $stmt = Conexion::conectar() ->prepare($sql);
                $stmt ->bindParam(":IdUsuarioEmisor", $valor2, PDO::PARAM_STR);
                $stmt ->bindParam(":IdUsuarioReceptor", $valor1, PDO::PARAM_STR);
                
                $stmt ->execute();
            
            if($stmt->rowCount()>0){
                return $stmt ->fetchAll();
            }else{
               return 0; 
            }

        $stmt -> close();
        $stmt = null;
    
    }
    
        static public function ComprobarInbox($item1, $item2, $item3, $item4, $valor1, $valor2, $valor3,$valor4){
        $sql = "SELECT * FROM mensajes WHERE $item1 = :$item1 AND $item2= :$item2  OR $item3 = :$item3 AND $item4= :$item4";
        $stmt = Conexion::conectar() ->prepare($sql);
                $stmt ->bindParam(":".$item1, $valor1, PDO::PARAM_STR);
                $stmt ->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
                $stmt ->bindParam(":".$item3, $valor3, PDO::PARAM_STR);
                $stmt ->bindParam(":".$item4, $valor4, PDO::PARAM_STR);
                
                $stmt ->execute();
            
            if($stmt->rowCount()>0){
                return 1;
            }else{
               return 0; 
            }

        $stmt -> close();
        $stmt = null;
    
    }
    
    static public function ObtenerMensajes($IdMensajes){
        $sql = "SELECT m.IdMensajes as IdMensajes, u.Foto as Foto,u.IdUsuario as IdUsuarioReceptor, u.Nombre as NombreUsuario, u.Usuario as Receptor, 
                md.Mensaje as Mensaje, md.FechaEnvio as Fecha, md.Leido as Leido,md.ArchivoURL as ArchivoURL FROM
                mensajes m INNER JOIN mensajes_details md ON md.IdMensajes = m.IdMensajes INNER JOIN usuarios u 
                ON md.IdUsuario = u.IdUsuario WHERE m.IdMensajes = :IdMensajes ORDER BY Fecha ASC";
        $stmt = Conexion::conectar() ->prepare($sql);
                $stmt ->bindParam(":IdMensajes", $IdMensajes, PDO::PARAM_STR);
                
                $stmt ->execute();
            
            if($stmt->rowCount()>0){
                return $stmt ->fetchAll();
            }else{
               return 0; 
            }

        $stmt -> close();
        $stmt = null;
    
    }
    
    static public function ObtenerMensajesDrop($IdUsuario){
        $sql = "SELECT md.IdMensajeDetails as IdMensajeDetails, u.IdUsuario as IdUsuario, u.Usuario as Usuario, u.Foto as Foto,
                md.Mensaje as Mensaje, md.ArchivoURL as ArchivoURL, md.FechaEnvio as FechaEnvio,
                (SELECT COUNT(*) FROM mensajes_details md  INNER JOIN mensajes m ON
                m.IdMensajes = md.IdMensajes INNER JOIN usuarios u ON m.IdUsuarioReceptor = u.IdUsuario
                WHERE md.Leido = 0 AND u.IdUsuario != :IdUsuario AND md.IdUsuario = :IdUsuario) AS TotalMsj,
                m.IdMensajes as IdMensajes FROM mensajes_details md  INNER JOIN mensajes m ON
                m.IdMensajes = md.IdMensajes INNER JOIN usuarios u ON m.IdUsuarioReceptor = u.IdUsuario
                WHERE md.Leido = 0 AND u.IdUsuario != :IdUsuario AND md.IdUsuario = :IdUsuario GROUP BY u.IdUsuario, md.IdMensajes
                ORDER BY FechaEnvio DESC LIMIT 5";
        $stmt = Conexion::conectar() ->prepare($sql);
                $stmt ->bindParam(":IdUsuario", $IdUsuario, PDO::PARAM_STR);
                
                $stmt ->execute();
            
            if($stmt->rowCount()>0){
                return $stmt ->fetchAll();
            }else{
               return 0; 
            }

        $stmt -> close();
        $stmt = null;
    
    }
    
        static public function ObtenerNoMensajes($IdUsuario){
        $sql = "SELECT md.IdMensajeDetails as IdMensajeDetails, u.IdUsuario as IdUsuario, u.Usuario as Usuario, u.Foto as Foto,
                md.Mensaje as Mensaje, md.ArchivoURL as ArchivoURL, md.FechaEnvio as FechaEnvio,
                (SELECT COUNT(*) FROM mensajes_details md  INNER JOIN mensajes m ON
                m.IdMensajes = md.IdMensajes INNER JOIN usuarios u ON m.IdUsuarioReceptor = u.IdUsuario
                WHERE md.Leido = 0 AND u.IdUsuario != :IdUsuario AND md.IdUsuario = :IdUsuario) AS TotalMsj,
                m.IdMensajes as IdMensajes FROM mensajes_details md  INNER JOIN mensajes m ON
                m.IdMensajes = md.IdMensajes INNER JOIN usuarios u ON m.IdUsuarioReceptor = u.IdUsuario
                WHERE md.Leido = 0 AND u.IdUsuario != :IdUsuario AND md.IdUsuario = :IdUsuario GROUP BY u.IdUsuario, md.IdMensajes
                ORDER BY FechaEnvio DESC";
        $stmt = Conexion::conectar() ->prepare($sql);
                $stmt ->bindParam(":IdUsuario", $IdUsuario, PDO::PARAM_STR);
                
                $stmt ->execute();

                return $stmt->rowCount();


        $stmt -> close();
        $stmt = null;
    
    }
    
    static public function CrearInbox($valor1, $valor2){
        $sql = "INSERT INTO mensajes(IdUsuarioEmisor, IdUsuarioReceptor, FechaCreacion) VALUES (:IdUsuarioEmisor, :IdUsuarioReceptor, NOW())";
        $stmt = Conexion::conectar() ->prepare($sql);
                $stmt ->bindParam(":IdUsuarioEmisor", $valor1, PDO::PARAM_STR);
                $stmt ->bindParam(":IdUsuarioReceptor", $valor2, PDO::PARAM_STR);
                
                $stmt ->execute();
            
            if($stmt->rowCount()>0){
                return 1;
            }else{
               return 0; 
            }

        $stmt -> close();
        $stmt = null;
    
    }
    
    static public function InsertaMensaje($datos){
        $sql = "INSERT INTO mensajes_details(IdUsuario, Mensaje, IdMensajes, ArchivoURL, FechaEnvio) "
                . "VALUES (:IdUsuario, :Mensaje, :IdMensajes, :ArchivoURL, NOW())";
        $stmt = Conexion::conectar() ->prepare($sql);
                $stmt ->bindParam(":IdUsuario", $datos['IdUsuario'], PDO::PARAM_STR);
                $stmt ->bindParam(":Mensaje", $datos['Mensaje'], PDO::PARAM_STR);
                $stmt ->bindParam(":IdMensajes", $datos['IdMensajes'], PDO::PARAM_STR);
                $stmt ->bindParam(":ArchivoURL", $datos['ArchivoURL'], PDO::PARAM_STR);

            if($stmt ->execute()){
                return 1;
            }else{
               return 0; 
            }

        $stmt -> close();
        $stmt = null;
    
    }
    
    static public function ObtenerUsuario($IdUsuario){
       $sql = "SELECT u.IdUsuario as IdUsuario,"
               . " u.Nombre as Nombre, "
               . " u.Usuario as Usuario,"
               . " u.Foto as Foto,"
               . " r.DescripcionRol as Rol, "
               . " u.Estatus as Estatus "
               . " FROM usuarios u INNER JOIN roles r on r.idRole = u.Rol WHERE IdUsuario=:IdUsuario";
       $query= Conexion::conectar()->prepare($sql);
       $query->bindParam(":IdUsuario", $IdUsuario, PDO::PARAM_INT);
       $query->execute();
       
       if($query->rowCount()>0){
                return $query->fetchAll();
            }else{
               return 0; 
            }
       $query->close();
       $query = null;
          
   } 
   static public function LeerMensajes($IdUsuario, $IdMensajes){
       $sql = "UPDATE mensajes_details SET Leido = 1 WHERE IdMensajes = :IdMensajes AND IdUsuario = :IdUsuario";
       $query= Conexion::conectar()->prepare($sql);
       $query->bindParam(":IdMensajes", $IdMensajes, PDO::PARAM_INT);
       $query->bindParam(":IdUsuario", $IdUsuario, PDO::PARAM_INT);
       $query->execute();
       
       if($query->execute()){
                return 1;
            }else{
               return 0; 
            }
       $query->close();
       $query = null;
          
   }
}
?>