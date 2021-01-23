<?php
require '../../../models/usuarios.model.php';
$obj = new CrudUsuario();
$datos = $obj ->MostrarDatosUsuario();
    $tabla = '
        <script src="ajax/Usuarios.js"></script>
        <script src="views/js/tablas.js"></script>
            <table class="table table-bordered table-striped tablas">
                <thead>
                    <tr>
                        <th style="width:10px;">ID</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Nombre de usuario</th>
                        <th>Rol</th>
                        <th>Estatus</th>
                        <th>Último acceso</th>
                        <th>Fecha de registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>';
    $datosTabla = "";
    
    foreach($datos as $key => $value){
        $datosTabla = $datosTabla.'<tr>
                        <td>'.$value['id'].'</td>
                        <td align="center"><img src="views/images/usuarios/'.$value['Foto'].'" width="60" height="60"></td>
                        <td>'.$value['Nombre'].'</td>
                        <td>'.$value['Usuario'].'</td>
                        <td>'.$value['Rol'].'</td>
                        <td><button class="btn btn-block btn-default btn-flat"><i class="fas fa-user-tie"></i> '.$value['Estatus'].'</button></td>
                        <td>'.date("d/m/Y g:i a", strtotime($value['UltLogin'])).'</td>
                        <td>'.date("d/m/Y g:i a", strtotime($value['FechaCreacion'])).'</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning btnEditarUsuario" onclick="obtUsuario('.$value['id'].')" title="Editar" data-toggle="modal" data-target="#modalEditarUsuario">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="delUsuario('.$value['id'].')" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    
';
    }
    
    echo $tabla.$datosTabla.'</tbody></table>';
    
?>
