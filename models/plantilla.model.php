<?php
class ModelRutas{
   static public function mdlMostrarRutas($tabla, $item, $valor){
        if($item != null){
            $stmt = Conexion::conectar() ->prepare("SELECT r.* FROM $tabla r INNER JOIN accessruta ar ON ar.IdRuta = r.idrutas INNER JOIN roles ro 
                                                    ON ar.IdRol = ro.idRole WHERE r.tiporuta = 2 AND ro.$item = :$item AND activo = 1 ORDER BY idrutas ASC");
            $stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt ->execute();
            return $stmt ->fetchAll();
        }else{
            $stmt = Conexion::conectar() ->prepare("SELECT * FROM $tabla ORDER by idrutas ASC");
            $stmt ->execute();
            return $stmt ->fetchAll();
        }
        $stmt -> close();
        $stmt = null;
    } 
}