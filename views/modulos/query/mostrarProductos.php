<?php
require '../../../models/conexion.php';
require '../../../models/inventario.model.php';
$obj = new CrudInventario();
$datos = $obj ->MostrarDatosProductos();
    $tabla = '
        <script src="ajax/Productos.js"></script>
        <script src="views/js/tablas.js"></script>
            <table class="table table-bordered table-striped tablas">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th style="width:110px;">Código</th>
                        <th>Nombre del producto</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Productos disponibles</th>
                        <th>Precio de compra</th>
                        <th>Precio de venta</th>  
                        <th>Total de Ventas</th>
                        <th>Proveedor</th>
                        <th>Estatus</th>
                        <th>Fecha de creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>';
    $datosTabla = "";
    
    foreach($datos as $key => $value){
        if($value['DescProducto']==""){
            $descCategoria = "Sin descripción";
        }else{
            $descCategoria = nl2br($value['DescProducto']);
        }
        $datosTabla = $datosTabla.'<tr>
                        <td><img src="views/images/productos/'.$value['ImgProd'].'" width="60" height="60"></td>
                        <td>'.$value['CodigoProd'].'</td>
                        <td>'.$value['NombreProducto'].'</td>
                        <td>'.$descCategoria.'</td>
                        <td>'.$value['IdCategoria'].'</td>
                        <td align="center">'.$value['Stock'].'</td>
                        <td>$'. number_format($value['PrecioCompra'], 2, '.','').' MXN</td>
                        <td>$'. number_format($value['PrecioVenta'], 2, '.','').' MXN</td>
                        <td align="center"><b>'.$value['TotalVentas'].'</b></td>
                        <td>'.$value['IdProveedor'].'</td>
                        <td><button class="btn btn-info"><b>'.$value['Estatus'].'</b></button></td>
                        <td>'.date("d/m/Y g:i a", strtotime($value['Fecha'])).'</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning" onclick="obtProducto('.$value['IdProducto'].')" title="Editar" data-toggle="modal" data-target="#modalEditarProducto">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="delProducto('.$value['IdProducto'].')" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    
';
    }
    
    echo $tabla.$datosTabla.'</tbody></table>';
    
?>
