<?php
require '../../../models/conexion.php';
require '../../../models/checker.model.php';
$obj1 = new CrudChecker();
$datos1 = $obj1 ->MostrarTodosChecker();
    $tabla1 = '
        <script src="ajax/CheckerAll.js"></script>
        <script src="views/js/tablas.js"></script>
        
        <div style="padding:5px;">
            <button class="btn btn-app" onclick="VaciarCheckerAll()">
              <i class="fas fa-trash-alt"></i> Vaciar pendientes
            </button>
            <button class="btn btn-app">
              <i class="fa fa-file-excel"></i> Guardar en Excel
            </button>
            </div>
            <table class="table table-bordered table-striped display" id="AllChecker">
                <thead>
                    <tr>
                        <th>Folio del pendiente</th>
                        <th>Operación</th>
                        <th>Ruta de ejecución</th>
                        <th>Ejecutado por:</th>
                        <th>Aplicado por:</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>';
    $datosTabla1 = "";
    
    foreach($datos1 as $key1 => $value1){
        if($value1['Estatus']=="ACEPTADO"){
            $estatus= '<button class="btn btn-app" style="cursor:default;"><i class="fas fa-clipboard-check"></i>'.$value1['Estatus'].'</button>';
        }else{
            $estatus= '<button class="btn btn-app" style="cursor:default;"><i class="fas fa-times"></i>'.$value1['Estatus'].'</button>';
        }
        $datosTabla1 = $datosTabla1.'
                    
                    <tr>
                        <td>'.$value1['IdPendiente'].'</td>
                        <td><b>'.$value1['Operacion'].'</b><br /><span style="font-size:13px;">'.$value1['DescQuery'].'</span></td>
                        <td>'.$value1['Ruta'].'</td>
                        <td>'.$value1['IdUsuarioEject'].'</td>
                        <td>'.$value1['IdUsuarioAplic'].'</td>
                        <td>'.date("d/m/Y g:i a", strtotime($value1['Fecha'])).'</td>
                        <td>'.$estatus.'</td>
                    </tr>                 
                    
';
    }
    
    echo $tabla1.$datosTabla1.'</tbody></table>';

    //Exportar archivo Excel

