<?php
if(!isset($_SESSION)){
    session_start();
}

require '../../../models/conexion.php';
require '../../../models/clientes.model.php';
if(isset($_POST['IdCliente'])&&($_POST['IdCliente'])!=""){
    $IdCliente = $_POST['IdCliente'];
    echo json_encode(CrudClientes::ObtenerCliente($IdCliente));
    
}