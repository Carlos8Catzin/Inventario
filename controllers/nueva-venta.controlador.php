<?php
class ControladorVentas{
    static public function ctrMostrarVentas($item, $valor){
        $tabla = "ventas";
        
        $respuesta = ModelVenta::mdlMostrarVentas($tabla, $item, $valor);
        
        return $respuesta;
    }
    
    static public function ctrMostrarVentasEdit($item, $valor){
        
        $respuesta = CrudNuevaVenta::mdlMostrarVentasEdit($item, $valor);
        
        return $respuesta;
    }
}
?>