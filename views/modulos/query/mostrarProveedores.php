<?php
require '../../../models/conexion.php';
require '../../../models/proveedores.model.php';
$obj = new CrudProveedores();
$datos = $obj ->MostrarProveedores();
    $tabla = '
        <script src="views/js/tablas.js"></script>
            <table class="table table-bordered table-striped tablas">
                <thead>
                    <tr>
                        <th>ID Proveedor</th>
                        <th>Nombre del Proveedor</th>
                        <th>Razón social</th>
                        <th>Domicilio</th>
                        <th>Población</th>
                        <th>Código postal</th>
                        <th>País</th>
                        <th>Teléfono</th>
                        <th>Correo electrónico</th>
                        <th>URL</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>';
    $datosTabla = "";
    
    foreach($datos as $key => $value){
        $datosTabla = $datosTabla.'
                    
                    <tr>
                        <td>'.$value['IdProvedor'].'</td>
                        <td>'.$value['NombreProveedor'].'</td>
                        <td>'.$value['RazonSocial'].'</td>
                        <td>'.$value['Domicilio'].'</td>
                        <td>'.$value['Poblacion'].'</td>
                        <td>'.$value['CodigoPostal'].'</td>
                        <td>'.$value['Pais'].'</td>
                        <td>'.$value['Telefono'].'</td>
                        <td>'.$value['Email'].'</td>
                        <td>'.$value['URL'].'</td>
                        <td>
                           <a href="index.php?ruta=editar-proveedor&IdReporte='.$value['IdProvedor'].'"<button type="button" id="edit_Proveedor" title="Editar Proveedor" class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                            <button type="button" onclick="delProveedor('.$value['IdProvedor'].');" id="eliminar_Proveedor" title="Eliminar Proveedor" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </td> 
                    </tr>                 
                    
';
    }
    
    echo $tabla.$datosTabla.'</tbody></table>';

    
?>

