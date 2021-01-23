<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/reportes.model.php';
require '../../../models/bitacora.model.php';

if(isset($_POST['type'])&&($_POST['type'])=="reporte"){
    date_default_timezone_set("America/Mexico_City");
    $TituloReporte = $_POST['TituloReporte'];
    $ArchivoReporte = $_POST['ArchivoReporte'];
    $vowels = array("UPDATE", "INSERT", "DELETE", "insert", "update", "delete", "Insert", "Update", "Delete");
    $DescReporte = str_replace($vowels, "//", $_POST['DescReporte']);
    $datos = array(
        'TituloReporte' => $TituloReporte,
        'ArchivoReporte' => $ArchivoReporte,
        'DescReporte' => $DescReporte,
        'IdUsuario' => $_SESSION['IdUsuario']
    );

    $respuesta = CrudReportes::InsertarReporte($datos);
        
    echo $respuesta;
    
    if($respuesta = 1){
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $fecha_actual = $fecha .' '. $hora;
        $TipoMsj = "A";
        $mensaje = "Se ha creado un nuevo reporte en el sistema con los siguientes datos <br /> <b>Nombre del reporte: </b> ".$TituloReporte.""
                ." <br /> <b>Nombre del archivo: </b>".$ArchivoReporte;
        $Proceso = "Reportes";

        $IdUsuario = $_SESSION['IdUsuario'];

        CrudBitacora::GrabaBitacora($Proceso, $TipoMsj, $mensaje, $IdUsuario, $fecha_actual);
    }else{
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $fecha_actual = $fecha .' '. $hora;
        $TipoMsj = "E";
        $mensaje = "Se ha producido un error al crear un nuevo reporte con los siguientes datos <br />  <br /> <b>Nombre del reporte: </b> ".$TituloReporte.""
                ." <br /> <b>Nombre del archivo: </b>".$ArchivoReporte;
        $Proceso = "Reportes";

        $IdUsuario = $_SESSION['IdUsuario'];

        CrudBitacora::GrabaBitacora($Proceso, $TipoMsj, $mensaje, $IdUsuario, $fecha_actual);
    }
}