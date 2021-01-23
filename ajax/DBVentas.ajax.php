<?php
require_once '../controllers/inventario.controlador.php';
require_once '../models/inventario.model.php';

class TablaProductos{
    
    public function mostrarTablaProductosVenta() {
        $item = null;
        $valor= null;
        
        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);
        
        $datosjson ='(
                "data":{';
        for($i=0; $i<count($productos); $i++){
            $imagen ="<img src'".$productos[$i]["ImgProd"]."' width='60' height='60'>";
            $codigoProd = $productos[$i]["CodigoProd"];
            $NombreProd = $productos[$i]["NombreProducto"];
            $PrecioV =  $productos[$i]["PrecioVenta"];
            $item = "IdProducto";
            if($productos[$i]["Stock"]<=10){
                $stock = "<button class='btn btn-danger'>".$productos[$i]["Stock"]."</button>";
            }else if($productos[$i]["Stock"]>11 && $productos[$i]["Stock"]<=15){
                $stock = "<button class='btn btn-warning'>".$productos[$i]["Stock"]."</button>";
            }else{ 
                $stock = "<button class='btn btn-success'>".$productos[$i]["Stock"]."</button>";
            }
            $botones = "<div class='btn-group'><button class='btn btn-primary agregarProducto recuperarBoton' IdProducto='".$productos[$i]["IdProducto"]."'>Agregar</button></div>";
     $datosjson .='[
         "'.($i+1).'",
         "'.$imagen.'",
         "'.$codigoProd.'",
         "'.$NombreProd.'",
         "'.$stock.'",
         "'.$PrecioV.'",
         "'.$botones.'"
],'; 
}     
     $datosjson = substr($datosjson, 0, -1);
     
      $datosjson .=    ']
              )';
     echo $datosjson;
        
        
    }
}

$activarProductos = new TablaProductos();
$activarProductos ->mostrarTablaProductosVenta();