<?php
class ControladorProductos{
    static public function ctrMostrarProductos($item, $valor){
        $tabla = "productos";
        
        $respuesta = ModelProductos::mdlMostrarProductos($tabla, $item, $valor);
        
        return $respuesta;
    }
}
?>
