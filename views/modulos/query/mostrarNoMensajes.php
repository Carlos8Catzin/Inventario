<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/mensajes.model.php';

$NoMensajes = CrudMensajes::ObtenerNoMensajes($_SESSION['IdUsuario']);

echo $NoMensajes;
 
?>
