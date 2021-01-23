<?php
class ControladorProveedores{
    static public function ctrMostrarProveedores($item, $valor){
        $tabla = "proveedores";
        
        $respuesta = ModelProveedores::mdlMostrarProveedores($tabla, $item, $valor);
        
        return $respuesta;
    }
   
}
?>