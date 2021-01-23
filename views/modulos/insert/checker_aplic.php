<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/checker.model.php';
require '../../../models/bitacora.model.php';
    if(isset($_POST['IdPendiente'])&&($_POST['IdPendiente'])!=""){
        $conexion= new mysqli('localhost','root','','Inventario');
        if(isset($_POST['IdTrans'])&&($_POST['IdTrans'])==1){


        $consulta =  "SELECT Consulta FROM pendientes WHERE IdPendiente = '". $_POST['IdPendiente'] ."'";
        $result = $conexion->query($consulta);
        $trans = mysqli_fetch_array($result);
        $mensajeRech = "Aceptado";
        $datos = $trans['Consulta'];
        
        $respuesta = CrudChecker::InsertarDatosChecker($datos);
        $IdUsuarioAplic = $_SESSION['IdUsuario']; // Reemplazar por $_SESSION
        echo $respuesta;
        
        if($respuesta==1){
        $conupdchecker = "UPDATE pendientes SET Estatus = '2', IdUsuarioAplic = '".$IdUsuarioAplic."' WHERE (IdPendiente = '".$_POST['IdPendiente']."')";
        $conexion->query($conupdchecker);
        $mensajeRech = "Aplicado";
        $TipoMensaje = "A";
        }else{
            $mensajeRech = "producido un error en";
            $TipoMensaje = "E";
        }
       }else if(isset($_POST['IdTrans'])&&($_POST['IdTrans'])==2){
           $TipoMensaje = "A";
          $mensajeRech = "Rechazado";
          $IdUsuarioAplic = $_SESSION['IdUsuario'];
          $conrechchecker = "UPDATE pendientes SET Estatus = '3', IdUsuarioAplic = '".$IdUsuarioAplic."' WHERE (IdPendiente = '".$_POST['IdPendiente']."')";
          $resultrech = $conexion->query($conrechchecker); 
          if($resultrech){
              echo 1;
          }else{
              echo 0;
          }
    }
    else if(isset($_POST['IdTrans'])&&($_POST['IdTrans'])==3){
         $mensajeRech = "Eliminado";
         $TipoMensaje = "A";
          $condelchecker = "DELETE FROM pendientes WHERE (IdPendiente = '".$_POST['IdPendiente']."')";
          $resultdel = $conexion->query($condelchecker); 
          if($resultdel){
              echo 1;
          }else{
              echo 0;
          }
    }else{
        
    }
    date_default_timezone_set("America/Mexico_City");
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    $fecha_actual = $fecha .' '. $hora;
    $TipoMsj = $TipoMensaje;
    $Proceso = "Transacción del Checker";
    
    $mensaje = "<b>Se ha ".$mensajeRech." una transacción con número de Folio: </b>". $_POST['IdPendiente']. "<br>Por el usuario ".$_SESSION['Usuario'];
    $IdUsuario = $_SESSION['IdUsuario'];
    
    CrudBitacora::GrabaBitacora($Proceso, $TipoMsj, $mensaje, $IdUsuario, $fecha_actual);
    
    
    
    }
?>
