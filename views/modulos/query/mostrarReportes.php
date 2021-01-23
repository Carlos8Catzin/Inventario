<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/reportes.model.php';
$obj = new CrudReportes();
$datos = $obj ->MostrarReportes();
    $tabla = '
        <script src="views/js/tablas.js"></script>
        <script src="Ajax/Reportes.js"></script>
            <table class="table table-bordered table-striped tablas">
                <thead>
                    <tr>
                        <th>No. Reporte</th>
                        <th>Nombre del reporte</th>
                        <th>Tipo de reporte</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>';
    $datosTabla = "";
    
    foreach($datos as $key => $value){
        $varStatus = "";
        if($value['StatusReporte']=="ACTIVO"){
            $varStatus = '<button class="btn btn-info" onclick="PreviewReporte('.$value['IdReporte'].')" title="Previsualizar reporte" data-toggle="modal" data-target="#modalPreviewReporte"><i class="fas fa-eye"></i></button>
                            <button type="button" onclick="GeneraExcel('.$value['IdReporte'].');" id="generar_excel" title="Generar archivo Excel" class="btn btn-success"><i class="fas fa-file-excel"></i></button>
                            <a href="index.php?ruta=editar-reporte&IdReporte='.$value['IdReporte'].'"<button type="button" id="edit_reporte" title="Editar reporte" class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                            <button type="button" onclick="delReporte('.$value['IdReporte'].');" id="eliminar_reporte" title="Eliminar reporte" class="btn btn-danger"><i class="fas fa-trash"></i></button>';
        }else{
            $varStatus = '<a href="index.php?ruta=editar-reporte&IdReporte='.$value['IdReporte'].'"<button type="button" id="edit_reporte" title="Editar reporte" class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                          <button type="button" onclick="delReporte('.$value['IdReporte'].');" id="eliminar_reporte" title="Eliminar reporte" class="btn btn-danger"><i class="fas fa-trash"></i></button>';
        
        }
        $datosTabla = $datosTabla.'
                    
                    <tr>
                        <td>'.$value['Num'].'</td>
                        <td>'.$value['TituloReporte'].'</td>
                        <td>'.$value['TipoReporte'].'</td>
                        <td>'.date("d/m/Y g:i a", strtotime($value['FechaCreacion'])).'</td>
                        <td>'.$value['StatusReporte'].'</td>
                        <td>'.$varStatus.'</td> 
                    </tr>                 
                    
';
    }
    
    echo $tabla.$datosTabla.'</tbody></table>';

    
?>

