<?php

if((isset($_GET['IdReporte'])) && $_GET['IdReporte']!=""){

require '../../../models/conexion.php';
require '../../../models/reportes.model.php';

$item = "IdReporte";
$valor = $_GET['IdReporte'];

$reporte = ModelReporte::mdlMostrarReportes($item, $valor);
foreach($reporte as $rep => $reportes){
    
}
$filename = $reportes['ArchivoReporte']."_".date('d-m-Y').".xls";
header('Expires: 0');
header('Cache-control: private');
header("Content-type: application/vnd.ms-excel");
header("Cache-control: cache, must-revalidate");
header('Content-Description: File Transfer');
header('Last-Modified: '.date('D, d M Y H:i:s'));
header("Pragma: public");
header("Content-Disposition:; filename=".$filename."");
header("Content-Transfer-Encoding: binary");


$connexion = mysqli_connect('localhost','root','','Inventario');
$obtReporte = mysqli_query($connexion, $reportes['DescReporte']);
if($obtReporte){
$numRows = mysqli_num_fields($obtReporte);
$datosTabla='';
$tabla='<table style="font-size: 18px; font-family: Arial; border:1px solid #f8f9fa;">
                <thead>
                    <tr style="font-weigth: bold; border:1px solid #f8f9fa;">';

while ($property = mysqli_fetch_field($obtReporte)) {
    $tabla =  $tabla.'<th>'.$property->name.'</th>';
}

$tabla = $tabla.'</tr>
                </thead>
                <tbody>
';

while ($fila = mysqli_fetch_array($obtReporte)) {
    $datosTabla= $datosTabla.'<tr style="border:1px solid #f8f9fa;">';
       for($i=0; $i<$numRows; $i++){
        $datosTabla = $datosTabla.'<td>'.$fila[$i].'</td>';
    }
    $datosTabla= $datosTabla.'</tr>';
}
    
    $tabla =  $tabla.$datosTabla.'</tbody></table>';
    
echo utf8_decode($tabla);

    exit;
}else{
    echo utf8_decode("Se produjo un error en la petición, si el problema persiste consulte al Administrador"); 
}
}else{
    echo utf8_decode("Se produjo un error en la petición, si el problema persiste consulte al Administrador");
}
?>
