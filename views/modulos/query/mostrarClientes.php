<?php
require '../../../models/conexion.php';
require '../../../models/clientes.model.php';
$obj = new CrudClientes();
$datos = $obj ->MostrarDatosCliente();
date_default_timezone_set("America/Mexico_City");
$FechaHoy = date('m-d');
    $tabla = '
        <script src="ajax/Clientes.js"></script>
        <script src="views/js/tablas.js"></script>
            <table class="table table-bordered table-striped tablas">
                <thead>
                    <tr>
                        <th style="width:90px;" align="center">Id Cliente</th>
                        <th align="center">Nombre</th>
                        <th align="center">Apellidos</th>
                        <th align="center">Email</th>
                        <th style="width:210px;" align="center" >Dirección</th>
                        <th align="center">Fecha de nacimiento</th>
                        <th align="center">Total de compras</th>
                        <th align="center">Fecha de última compra</th>
                        <th align="center">Fecha de Registro</th>
                        <th align="center">Estatus</th>
                        <th align="center">Acciones</th>
                    </tr>
                </thead>
                <tbody>';
    $datosTabla = "";
    
    foreach($datos as $key => $value){
        if($value['Estatus']=="1"){
            $descEstatus = "Activo";
        }else{
            $descEstatus = "Inactivo";
        }
        if($FechaHoy == date("m-d", strtotime($value['FechaNacimiento']))){
          $fecha_nac = '<center><img src="views/images/birthday.png" width="40" heigth="40" /></center>'.date("d/m/Y", strtotime($value['FechaNacimiento']));     
        }else{
          $fecha_nac = date("d/m/Y", strtotime($value['FechaNacimiento']));
        }
        $datosTabla = $datosTabla.'<tr>
                        <td>'.$value['IdCliente'].'</td>
                        <td>'.$value['NombreCliente'].'</td>
                        <td>'.$value['ApellidoCliente'].'</td>
                        <td align="center">'.$value['Email'].'</td>
                        <td>'.$value['DireccionCliente'].'</td>
                        <td align="center">'.$fecha_nac.'</td>
                        <td align="center">'.$value['TotalCompras'].'</td>
                        <td align="center">'.date("d/m/Y g:i A", strtotime($value['FUltimaCompra'])).'</td>
                        <td align="center">'.date("d/m/Y g:i A", strtotime($value['FechaRegistro'])).'</td>    
                        <td align="center"><button class="btn btn-info"><b>'.$descEstatus.'</b></button></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning btnEditarCliente" onclick="obtCliente('.$value['IdCliente'].');" title="Editar" data-toggle="modal" data-target="#modalEditarCliente">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="delCliente('.$value['IdCliente'].');" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    
';
    }
    
    echo $tabla.$datosTabla.'</tbody></table>';
    
?>
