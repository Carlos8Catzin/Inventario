<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/bitacora.model.php';
require '../../../models/nueva-venta.model.php';
require '../../../models/inventario.model.php';
require '../../../models/clientes.model.php';

if(isset($_POST['IdFormaPago'])&&($_POST['IdFormaPago'])!=""){
    if($_POST['IdFormaPago']==1){
    $CodFactura = $_POST['CodFactura'];
    $IdCliente = $_POST['IdCliente'];
    $IdUsuario = $_SESSION['IdUsuario'];
    $IdFormaPago = $_POST['IdFormaPago'];
    $Productos = $_POST['Productos'];
    $Impuesto = $_POST['Impuesto'];
    $IVA = $_POST['IVA'];
    $PagoNeto = $_POST['PagoNeto'];
    $PagoTotal = $_POST['PagoTotal'];
    
    
    $respuesta = CrudNuevaVenta::GrabaVentaEfectivo($CodFactura,$IdCliente,$IdUsuario,$IdFormaPago,$Productos,$Impuesto,$IVA,$PagoNeto,$PagoTotal);
    
    echo $respuesta;
    
            if($respuesta = 1){
                date_default_timezone_set("America/Mexico_City");
                $fecha = date('Y-m-d');
                $hora = date('H:i:s');
                $fecha_actual = $fecha .' '. $hora;
                $TipoMsj = "A";
                $mensaje = "Se ha generado una nueva venta en el sistema con los siguientes datos <br /> <b>Código de Factura: </b> ".$CodFactura
                        ." <br /> <b>Detalles de los productos: </b><br />".$Productos
                        ." <br /> <b>Forma de pago: </b> Efectivo"
                        ." <br /> <b>Pago total: </b> $".$PagoTotal." MXN";
                $Proceso = "Venta";

                $IdUsuario = $_SESSION['IdUsuario'];

                CrudBitacora::GrabaBitacora($Proceso, $TipoMsj, $mensaje, $IdUsuario, $fecha_actual);
            }else{
                date_default_timezone_set("America/Mexico_City");
                $fecha = date('Y-m-d');
                $hora = date('H:i:s');
                $fecha_actual = $fecha .' '. $hora;
                $TipoMsj = "E";
                $mensaje = "Se ha generado un error al realizar una venta en el sistema con los siguientes datos <br /> <b>Código de Factura: </b> ".$CodFactura
                        ." <br /> <b>Detalles de los productos: </b>".$Productos
                        ." <br /> <b>Pago total: </b> $".$PagoTotal." MXN"
                        ." <br /> <b>Detalles: </b>No se pudo realizar la venta por un error en el sistema";
                $Proceso = "Venta";

                $IdUsuario = $_SESSION['IdUsuario'];

                CrudBitacora::GrabaBitacora($Proceso, $TipoMsj, $mensaje, $IdUsuario, $fecha_actual);
            }
    
}else if(($_POST['IdFormaPago']==2 || $_POST['IdFormaPago'])==3){
     $CodFactura = $_POST['CodFactura'];
    $IdCliente = $_POST['IdCliente'];
    $IdUsuario = $_SESSION['IdUsuario'];
    $IdFormaPago = $_POST['IdFormaPago'];
    $Productos = $_POST['Productos'];
    $Impuesto = $_POST['Impuesto'];
    $IVA = $_POST['IVA'];
    $PagoNeto = $_POST['PagoNeto'];
    $PagoTotal = $_POST['PagoTotal'];
    $CodTransaccion = $_POST['CodTransaccion'];
    $metodoPago = "";
    
    if($_POST['IdFormaPago']==2){
        $metodoPago = "Tarjeta de crédito";
    }else{
        $metodoPago = "Tarjeta de débito";
    }
    
    $respuesta = CrudNuevaVenta::GrabaVentaTarjeta($CodFactura,$IdCliente,$IdUsuario,$IdFormaPago,$Productos,$Impuesto, $CodTransaccion, $IVA,$PagoNeto, $PagoTotal);
    
    echo $respuesta;
    
    if($respuesta = 1){
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $fecha_actual = $fecha .' '. $hora;
        $TipoMsj = "A";
        $mensaje = "Se ha generado una nueva venta en el sistema con los siguientes datos <br /> <b>Código de Factura: </b> ".$CodFactura
                ." <br /> <b>Detalles de los productos: </b>".$Productos
                ." <br /> <b>Forma de pago: </b> ".$metodoPago
                ." <br /> <b>Pago total: </b> $".$PagoTotal." MXN";
        $Proceso = "Venta";

        $IdUsuario = $_SESSION['IdUsuario'];

        CrudBitacora::GrabaBitacora($Proceso, $TipoMsj, $mensaje, $IdUsuario, $fecha_actual);
    }else{
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $fecha_actual = $fecha .' '. $hora;
        $TipoMsj = "E";
        $mensaje = "Se ha generado un error al realizar una venta en el sistema con los siguientes datos <br /> <b>Código de Factura: </b> ".$CodFactura
                ." <br /> <b>Detalles de los productos: </b><br />".$Productos
                ." <br /> <b>Pago total: </b> $".$PagoTotal." MXN"
                ." <br /> <b>Detalles: </b>No se pudo realizar la venta por un error en el sistema";
        $Proceso = "Venta";

        $IdUsuario = $_SESSION['IdUsuario'];

        CrudBitacora::GrabaBitacora($Proceso, $TipoMsj, $mensaje, $IdUsuario, $fecha_actual);
    }
}

$listaProductos = json_decode($_POST['Productos'],TRUE);
$totalProductosComprado = array();
foreach($listaProductos as $key => $value){
    array_push($totalProductosComprado, $value["cantidad"]);
    $tablaProductos = "productos";
    $item = "IdProducto";
    $valor = $value["id"];
    
    $obtProducto = CrudInventario::ObtenerProducto($valor);
    $item1a = "TotalVentas";
    $valor1a = $value['cantidad'] + $obtProducto['TotalVentas'];
    
    $nuevaVenta = ModelProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);
    
    $item1b = "Stock";
    $valor1b = $value['stock'];
    
    $nuevoStock = ModelProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);
    
}

$tablaClientes= "clientes";
$itemcli = "IdCliente";
$valorC = $_POST['IdCliente'];
$obtCliente = CrudClientes::ObtenerCliente($_POST['IdCliente']);
$item1c = "TotalCompras";
$valor1c = array_sum($totalProductosComprado) + $obtCliente['TotalCompras'];
ModelClientes::mdlActualizarCliente($tablaClientes, $item1c, $valor1c, $valorC);

}
