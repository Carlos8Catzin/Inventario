<?php

if(!isset($_SESSION)){
    session_start();
}
require '../../../models/clientes.model.php';
require '../../../models/conexion.php';

echo json_encode(CrudClientes::ObtenerCodigoCliente());

 