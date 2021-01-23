<?php
require '../../../models/conexion.php';
require '../../../models/admin-venta.model.php';
$obj = new CrudAdminVenta();
$datos = $obj ->MostrarDatosVentas();
    $tabla = '
        <script src="ajax/Clientes.js"></script>
        <script src="views/js/tablas.js"></script>
            <table class="table table-bordered table-striped tablas">
                <thead>
                    <tr>
                        <th align="center">Código de Factura</th>
                        <th align="center">Cliente</th>
                        <th align="center">Vendedor</th>
                        <th align="center">Forma de pago</th>
                        <th align="center">Código de pago</th>
                        <th align="center">Pago Neto</th>
                        <th align="center">Pago Total</th>
                        <th align="center">Fecha</th>
                        <th align="center">Acciones</th>
                    </tr>
                </thead>
                <tbody>';
    $datosTabla = "";
    
    foreach($datos as $key => $value){
        $datosTabla = $datosTabla.'<tr>
                        <td>'.$value['CodFactura'].'</td>
                        <td>'.$value['NombreCliente'].'</td>
                        <td>'.$value['Vendedor'].'</td>
                        <td>'.$value['FormaPago'].'</td>
                        <td>'.$value['CodigoPago'].'</td>
                        <td>$'.number_format($value['PagoNeto'], 2, '.','').' MXN</td>
                        <td>$'.number_format($value['PagoTotal'], 2, '.','').' MXN</td>
                        <td align="center">'.date("d/m/Y g:i A", strtotime($value['FechaVenta'])).'</td>
                        <td>
                            <div class="btn-group">
                            
                                <button class="btn btn-success btnImprimirVenta" onclick="impVenta('.$value['IdVenta'].');" title="Imprimir" data-toggle="modal" data-target="#modalImprimirVenta">
                                    <i class="fas fa-print"></i>
                                </button>
                                <a href="index.php?ruta=editar-venta&IdVenta='.$value['IdVenta'].'"><button class="btn btn-warning btn" onclick="editVenta('.$value['IdVenta'].');" title="Editar" data-toggle="modal" data-target="#modalEditarVenta">
                                    <i class="fas fa-edit"></i>
                                </button></a>
                                <button class="btn btn-danger" onclick="delVenta('.$value['IdVenta'].');" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    
';
    }
    
    echo $tabla.$datosTabla.'</tbody></table>';
    
?>
