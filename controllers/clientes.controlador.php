<?php 
class ControladorClientes{
    
    static public function ctrMostrarClientes($item, $valor){
        $tabla = "clientes";
        
        $respuesta = ModelClientes::mdlMostrarClientes($tabla, $item, $valor);
        
        return $respuesta;
    }
}
?>