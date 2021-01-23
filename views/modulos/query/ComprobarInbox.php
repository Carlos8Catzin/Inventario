<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST['IdUsuario'])&&($_POST['IdUsuario'])!=""){
require '../../../models/conexion.php';
require '../../../models/mensajes.model.php';

$item1 = "IdUsuarioReceptor";
$valor1 = $_SESSION['IdUsuario'];

$item2 = "IdUsuarioEmisor";
$valor2 = $_POST['IdUsuario'];

$item3 = "IdUsuarioReceptor";
$valor3 = $_POST['IdUsuario'];

$item4 = "IdUsuarioEmisor";
$valor4 = $_SESSION['IdUsuario'];

$IdUsuario = $_POST['IdUsuario'];

$emisorbuzon; $receptorbuzon;


$usuarios = CrudMensajes::ObtenerUsuario($IdUsuario);
foreach ($usuarios as $user =>$usuario){
    
}


$respuesta = CrudMensajes::ComprobarInbox($item1, $item2, $item3, $item4, $valor1, $valor2, $valor3,$valor4);

if($respuesta>0){
    $ObtenerInbox = CrudMensajes::ObtenerInbox($valor1, $valor2);
    foreach($ObtenerInbox as $key => $value){
        
    }
    $IdMensajes = $value['IdMensajes'];
    $mensajeria = CrudMensajes::ObtenerMensajes($IdMensajes);
    
    $emisorbuzon = $value['IdMensajes'];
    
    $ObtenerInboxReceptor = CrudMensajes::ObtenerInboxReceptor($valor1, $valor2);
    foreach($ObtenerInboxReceptor as $key => $inbox){
        
    }
    
    $receptorbuzon = $inbox['IdMensajes'];
    CrudMensajes::LeerMensajes($_SESSION['IdUsuario'], $emisorbuzon);
    CrudMensajes::LeerMensajes($_SESSION['IdUsuario'], $receptorbuzon);
    
}else{
    $CrearInbox1 = CrudMensajes::CrearInbox($valor1, $valor2);
    $CrearInbox2 = CrudMensajes::CrearInbox($valor3, $valor4);
    $ObtenerInbox = CrudMensajes::ObtenerInbox($valor1, $valor2);
    foreach($ObtenerInbox as $key => $value){
        
    }
    $IdMensajes = $value['IdMensajes'];
    $mensajeria = CrudMensajes::ObtenerMensajes($IdMensajes);
}
$inoutmsj = '';
$datosMensaje = '';
    if($mensajeria!="0"){
                foreach ($mensajeria as $mensaje => $msj){
                    if($msj['Leido']==1){
                        $leido = '<i class="fas fa-check-double"></i> Leído';
                    }else{
                        $leido = '<i class="fas fa-check"></i> Entregado';
                    }
                    if($msj['ArchivoURL']==""){
                        $arch = '';
                    }else{
                        $arch = '<br /><i class="fas fa-file-alt"></i> <a href="views/archivos/'.$msj['ArchivoURL'].'" class="link_file">'.$msj['ArchivoURL'].'</a> ';
                    }
                    
                    if($_SESSION['IdUsuario']!=$msj['IdUsuarioReceptor']){
                        if($msj['ArchivoURL']==""){
                        $arch = '';
                        }else{
                            $arch = '<br /><i class="fas fa-file-alt"></i> <a href="views/archivos/'.$msj['ArchivoURL'].'" target="_blank" class="link_file">'.$msj['ArchivoURL'].'</a> ';
                        }
                        $inoutmsj = $inoutmsj.'<div class="outgoing_msg">
                                        <div class="sent_msg">
                                          <p>'.$msj['Mensaje'].$arch.'</p>
                                          <span class="time_date" style="float: right;">'.date("d/m/Y g:i a", strtotime($msj['Fecha'])).' | '.$leido.'</span> </div>
                                      </div>';
                    }else{
                        if($msj['ArchivoURL']==""){
                        $arch = '';
                        }else{
                            $arch = '<br /><i class="fas fa-file-alt"></i> <a href="views/archivos/'.$msj['ArchivoURL'].'" target="_blank">'.$msj['ArchivoURL'].'</a> ';
                        }
                        $inoutmsj = $inoutmsj.'<div class="incoming_msg">
                                        <div class="incoming_msg_img"> <img src="views/images/usuarios/'.$usuario['Foto'].'" alt="sunil"> </div>
                                        <div class="received_msg">
                                          <div class="received_withd_msg">
                                            <p>'.$msj['Mensaje'].$arch.'</p>
                                            <span class="time_date">'.date("d/m/Y g:i a", strtotime($msj['Fecha'])).'</span></div>
                                        </div>
                                      </div>';
                    }
                    
                }
                $datosMensaje = $inoutmsj;

    }else{
        $datosMensaje = '<center><p class="font-weight-normal">Empieza una conversación</p></center>';
    }
    if(isset($emisorbuzon)&&($emisorbuzon)!=""){
       $inputs = '<input type="hidden" id="BuzonEmisor" value="'.$emisorbuzon.'" />
                             <input type="hidden" id="BuzonReceptor" value="'.$receptorbuzon.'" />
                             <input type="hidden" id="IdUsuario" value="'.$IdUsuario.'" />
                             '; 
    }else{
       $inputs = '';
    }
    echo $datosMensaje.$inputs;
    
}

