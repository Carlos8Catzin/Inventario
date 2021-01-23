<?php

class ControllerPlantilla{
    
    static public function strPlantilla(){
        
        include "views/plantilla.php";
        
    }
    
    static public function ctrMostrarRutas($item, $valor){
        $tabla = "rutas";
        
        $respuesta = ModelRutas::mdlMostrarRutas($tabla, $item, $valor);
        
        return $respuesta;
    }
}