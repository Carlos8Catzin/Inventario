<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/inventario.model.php';
if(isset($_POST['IdProducto'])&&($_POST['IdProducto'])!=""){
    $IdProducto = $_POST['IdProducto'];
    echo json_encode(CrudInventario::ObtenerProducto($IdProducto));
    
}