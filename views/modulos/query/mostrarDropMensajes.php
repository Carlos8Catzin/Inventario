<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/mensajes.model.php';

if(!isset($_SESSION['IdUsuario']) && ($_SESSION['IdUsuario'])==""){
	header("Location: logout");
}

$obj = new CrudMensajes();
$datos = $obj ->ObtenerMensajesDrop($_SESSION['IdUsuario']);
if($datos==0){
    echo '<hr /><center><h3 class="dropdown-item btn btn-block btn-flat">No hay nuevos mensajes</h3></center>';
}else{
 $datosDropMensaje = '';   
    foreach($datos as $keymsj => $dropmsj){
        if($dropmsj['TotalMsj']==0){
            $totalMsjs = '';
        }else if($dropmsj['TotalMsj']==1){
            $totalMsjs = '<span class="hidden-xs font-italic" style="font-size: 11px; float: right; margin-top: -2px; font-weight: 600;">'.$dropmsj['TotalMsj'].' mensaje no leído</span>'; 
        }else{
           $totalMsjs = '<span class="hidden-xs font-italic" style="font-size: 11px; float: right; margin-top: -2px; font-weight: 600;">'.$dropmsj['TotalMsj'].' mensajes no leídos</span>'; 
        }
        
        $datosDropMensaje = $datosDropMensaje.'<div style="width:100%;word-break: break-word;overflow: hidden; float:left;"><a href="index.php?ruta=messages&IdUsuario='.$dropmsj['IdUsuario'].'" class="dropdown-item">
                    <img src="views/images/usuarios/'.$dropmsj['Foto'].'" class="img-circle" style="max-width: 35px; max-height: 35px;" />
                    <span class="hidden-xs" style="font-weight: 800; font-size: 16px;">'.$dropmsj['Usuario'].'</span>
                        <span class="hidden-xs font-italic" style="font-size: 11px; float: right;">'.date("d/m/Y g:i a", strtotime($dropmsj['FechaEnvio'])).'</span>
                        <p class="hidden-xs font-weight-normal" style="font-size: 14px;">'.$dropmsj['Mensaje'].'</p>
                        '.$totalMsjs.'
                        </a></div>';
    }
    
    echo $datosDropMensaje;
}  
?>
