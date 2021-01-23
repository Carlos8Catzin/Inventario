<?php
class ControladorReportes{
    static public function ctrMostrarRepotes($item, $valor){
        $tabla = "reportes";
        
        $respuesta = ModelReporte::mdlMostrarReportes($tabla, $item, $valor);
        
        return $respuesta;
    }
     static public function ctrMostrarReporteEdit($item, $valor){
        
        $respuesta = CrudReportes::mdlMostrarVentasEdit($item, $valor);
        
        return $respuesta;
    }
   
}
?>