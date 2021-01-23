<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/mensajes.model.php';

if(isset($_POST['type'])&&($_POST['type'])=="mensaje"){
    
         $BuzonEmisor = $_POST['BuzonEmisor'];
         $BuzonReceptor = $_POST['BuzonReceptor'];
         $IdUsuario = $_POST['IdUsuario'];
         $Mensaje = $_POST['Mensaje'];
         $ArchivoURL = $_POST['ArchivoURL'];
    $datos = array(
        'IdMensajes' => $BuzonEmisor,
        'IdUsuario' => $IdUsuario,
        'ArchivoURL' => $ArchivoURL,
        'Mensaje' => $Mensaje
    ); 
                
    $respuesta = CrudMensajes::InsertaMensaje($datos);
        
    $datos2 = array(
        'IdMensajes' => $BuzonReceptor,
        'IdUsuario' => $IdUsuario,
        'ArchivoURL' => $ArchivoURL,
        'Mensaje' => $Mensaje
    );
    $respuesta2 = CrudMensajes::InsertaMensaje($datos2);
    
    echo $respuesta;
    
}