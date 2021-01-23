<?php

if((isset($_POST['IdReporte'])) && $_POST['IdReporte']!=""){

require '../../../models/conexion.php';
require '../../../models/reportes.model.php';

$item = "IdReporte";
$valor = $_POST['IdReporte'];

$reporte = ModelReporte::mdlMostrarReportes($item, $valor);

foreach($reporte as $rep => $reportes){
    
}

$connexion = mysqli_connect('localhost','root','','Inventario');
$obtReporte = mysqli_query($connexion, $reportes['DescReporte']);
if($obtReporte){
$numRows = mysqli_num_fields($obtReporte);
$datosTabla='';
$tabla='
    <table class="table table-bordered table-striped" id="Reports" style="font-size: 13px">
                <thead>
                    <tr>';

while ($property = mysqli_fetch_field($obtReporte)) {
    $tabla =  $tabla.'<th>'.$property->name.'</th>';
}

$tabla = $tabla.'</tr>
                </thead>
                <tbody>
';

while ($fila = mysqli_fetch_array($obtReporte)) {
    $datosTabla= $datosTabla.'<tr>';
       for($i=0; $i<$numRows; $i++){
        $datosTabla = $datosTabla.'<td>'.$fila[$i].'</td>';
    }
    $datosTabla= $datosTabla.'</tr>';
}
    
    $tabla =  $tabla.$datosTabla.'</tbody></table>';
    
echo $tabla;
}else{
   echo '
            <h4 class="modal-title"><h3><i class="fas fa-exclamation-triangle text-warning"></i>Hubo un error en la generación reporte.</h3></h4>
          <p>
              No pudimos encontrar el contenido que estabas buscando. Si el problema persiste llame al Administrador
          </p>'; 
}

}else{
    echo "Se ha producido un error al mostrar la previsualización de la tabla";
}

?>
