<?php
require '../../../models/conexion.php';
require '../../../models/nueva-venta.model.php';
$obj = new CrudNuevaVenta();
$datos = $obj ->MostrarProductosVentas();
    $tabla = '
    <script type="text/javascript" src="ajax/NuevaVenta.js"></script> 
            <table class="table table-bordered table-striped TablaVentas">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Código</th>
                        <th>Nombre del producto</th>
                        <th>Productos disponibles</th>
                        <th>Precio de venta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>';
    $datosTabla = "";
    
    foreach($datos as $key => $value){

        $datosTabla = $datosTabla.'<tr>
                        <td><img src="views/images/productos/'.$value['ImgProd'].'" width="60" height="60"></td>
                        <td>'.$value['CodigoProd'].'</td>
                        <td>'.$value['NombreProducto'].'</td>
                        <td align="center">'.$value['Stock'].'</td>
                        <td>$'. number_format($value['PrecioVenta'], 2, '.','').' MXN</td>
                        <td><button class="btn btn-primary agregarProducto recuperarBoton" IdProducto="'.$value['IdProducto'].'" title="Agregar Producto">Agregar</button></td>
                    </tr>
                    
                    
';
    }
    
    echo $tabla.$datosTabla.'</tbody></table>';
    
?>
