<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/checker.model.php';
$obj = new CrudChecker();
$usuario = $_SESSION['Rol'];
$datos = $obj ->MostrarDatosChecker($usuario);
    $tabla = '
        <script src="ajax/Checker.js"></script>
        <script>
            $(document).ready(function(){
                mostrarAllChecker();
            }) 
        </script>
            <table class="table table-bordered table-striped tablas" id="tbl-Checker">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Folio del pendiente</th>
                        <th>Operación</th>
                        <th>Ruta de ejecución</th>
                        <th>Ejecutado por:</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>';
    $datosTabla = "";
    
    foreach($datos as $key => $value){
        $datosTabla = $datosTabla.'
                    
                    <tr>
                        <td>'.$value['RowNum'].'</td>
                        <td>'.$value['IdPendiente'].'</td>
                        <td>'.$value['Operacion'].'<br /><span style="font-size:13px;">'.$value['DescQuery'].'</span></td>
                        <td>'.$value['Ruta'].'</td>
                        <td>'.$value['IdUsuarioEject'].'</td>
                        <td>'.date("d/m/Y g:i a", strtotime($value['Fecha'])).'</td>
                        <td align="center"><button class="btn btn-app disabled" style="background: #3d9970; color:#ffffff;"><i class="fas fa-shield-alt"></i> <b>'.$value['Estatus'].'</b></button></td>
                        <td>
                            <div class="btn-group">
                            
                                <button class="btn btn-success" onclick="aplChecker('.$value['IdPendiente'].')" title="Aplicar">
                                    <i class="fas fa-clipboard-check"></i> Aceptar
                                </button>
                                <button class="btn btn-danger" onclick="rechChecker('.$value['IdPendiente'].')" title="Rechazar" style="margin-left:10px;">
                                    <i class="fas fa-window-close"></i> Rechazar
                                </button>
                            </div>
                        </td>
                    </tr>                 
                    
';
    }
    
    echo $tabla.$datosTabla.'</tbody></table>';
    
?>
