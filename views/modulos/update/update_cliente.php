<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/clientes.model.php';

if(isset($_POST['type'])&&($_POST['type'])=="cliente"){
    date_default_timezone_set("America/Mexico_City");
    $IdCliente = $_POST['IdCliente'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Email = $_POST['Email'];
    $Direccion = nl2br($_POST['Direccion']);
    $FechaNac = date("Y-m-d", strtotime($_POST['FechaNac']));
    $datos = array(
        'IdCliente' => $IdCliente,
        'Nombre' => $Nombre,
        'Apellido' => $Apellido,
        'Email' => $Email,
        'Direccion' => $Direccion,
        'FechaNac' => $FechaNac
    );

    $respuesta = CrudClientes::EditarCliente($datos);
        
    echo $respuesta;
}