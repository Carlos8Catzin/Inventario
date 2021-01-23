<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/reportes.model.php';

if(isset($_POST['type'])&&($_POST['type'])=="reporte"){
    date_default_timezone_set("America/Mexico_City");
    $IdReporte = $_POST['IdReporte'];
    $TituloReporte = $_POST['TituloReporte'];
    $ArchivoReporte = $_POST['ArchivoReporte'];
    $vowels = array("UPDATE", "INSERT", "DELETE", "insert", "update", "delete", "Insert", "Update", "Delete");
    $DescReporte = str_replace($vowels, "//", $_POST['DescReporte']);
    $StatusReporte = $_POST['StatusReporte'];
    $datos = array(
        'IdReporte' => $IdReporte,
        'TituloReporte' => $TituloReporte,
        'ArchivoReporte' => $ArchivoReporte,
        'DescReporte' => $DescReporte,
        'StatusReporte' => $StatusReporte
    );

    $respuesta = CrudReportes::EditarReporte($datos);
        
    echo $respuesta;
}

if(isset($_POST['action-report'])&&($_POST['action-report'])!=""){
    $action = $_POST['action-report'];
    $respuesta = CrudReportes::ReporteAction($action);
        
    echo $respuesta;
}