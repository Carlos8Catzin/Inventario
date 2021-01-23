<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/mensajes.model.php';

$item = "IdUsuario";
$valor = $_SESSION['IdUsuario'];

$obj = new CrudMensajes();
$datos = $obj ->MostrarUsuariosMensaje($item, $valor);
    $tabla = '
        <script src="ajax/Mensajes.js"></script>
        <script src="views/js/tablas.js"></script>
            <table class="table table-bordered table-striped tablas TablaMensajeUsuarios">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>';
    $datosTabla = "";
    
    foreach($datos as $key => $value){
        $datosTabla = $datosTabla.'<tr>
                        <td align="center"><img src="views/images/usuarios/'.$value['Foto'].'" width="50" height="50"></td>
                        <td>'.$value['Usuario'].'</td>
                        <td>'.$value['Rol'].'</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning nuevoMensaje" id="btn-msj-user" IdUsuario="'.$value['id'].'" Foto="'.$value['Foto'].'" Usuario="'.$value['Usuario'].'" Nombre="'.$value['Nombre'].'" title="Nuevo Mensaje">
                                    <i class="fas fa-reply"> </i><b> Mensaje</b>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    
';
    }
    
    echo $tabla.$datosTabla.'</tbody></table>';
    
?>
