<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/bitacora.model.php';
if(isset($_POST['deleteAll'])&&($_POST['deleteAll'])=="Yes"){
$conexion= new mysqli('localhost','root','','Inventario');

date_default_timezone_set("America/Mexico_City");
                       
$fecha_a = date('Y-m-d');                      
$hora_a = date('H:i:s');
$Fecha = $fecha_a .' '. $hora_a;
                       
    $consulta =  "DELETE FROM pendientes WHERE Estatus in(2,3)";
    $result = $conexion->query($consulta);
    
    $Proceso = "Vaciar Checker";
    $TipoMensaje = "A";
    $mensaje = "<b>El usuario: </b>". $_SESSION['Usuario']. " ha vaciado el Checker de Transacciones <br> <b>Se han borrado: ".mysqli_affected_rows($conexion)." registros</b>";
    $IdUsuario = $_SESSION['IdUsuario'];
    
    CrudBitacora::GrabaBitacora($Proceso, $TipoMensaje, $mensaje, $IdUsuario, $Fecha);
    
    
    if($result){
        echo 1;
    }else{
        echo 0;
    }
}
    
    
?>

