<?php
if(!isset($_SESSION)){
    session_start();
}

date_default_timezone_set("America/Mexico_City");
                       
                       $fecha_a = date('Y-m-d');
                       $hora_a = date('H:i:s');
                       $Fecha = $fecha_a .' '. $hora_a;
    $Proceso = "Cierre del sistema";
    $TipoMensaje = "A";
    $mensaje = "El usuario <b>". $_SESSION['Usuario']. "</b> ha cerrado su sesión al sistema";
    $IdUsuario = $_SESSION['IdUsuario'];
    
    CrudBitacora::GrabaBitacora($Proceso, $TipoMensaje, $mensaje, $IdUsuario, $Fecha);
    
session_destroy();

echo '<script> window.location = "login"; </script>';
?>