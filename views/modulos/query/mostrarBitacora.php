<?php
require '../../../models/conexion.php';
require '../../../models/bitacora.model.php';
$obj = new CrudBitacora();
$datos = $obj ->MostrarBitacora();
    $tabla = '
        <script src="views/js/tablas.js"></script>
            <table class="table table-bordered table-striped tablas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Proceso</th>
                        <th>Tipo de Mensaje</th>
                        <th>Mensaje</th>
                        <th>Ejecutado por:</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>';
    $datosTabla = "";
    
    foreach($datos as $key => $value){
        $datosTabla = $datosTabla.'
                    
                    <tr>
                        <td>'.$value['RowNum'].'</td>
                        <td>'.$value['Proceso'].'</td>
                        <td>'.$value['TipoMensaje'].'</td>
                        <td>'.$value['Mensaje'].'</td>
                        <td>'.$value['IdUsuario'].'</td>
                        <td>'.date("d/m/Y g:i a", strtotime($value['Fecha'])).'</td>     
                    </tr>                 
                    
';
    }
    
    echo $tabla.$datosTabla.'</tbody></table>';

    
?>
