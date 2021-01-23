<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/inventario.model.php';
if(isset($_POST['IdCategoria'])&&($_POST['IdCategoria'])!=""){
    $IdCategoria = $_POST['IdCategoria'];
        echo json_encode(CrudInventario::ObtenerCodigo($IdCategoria));
}