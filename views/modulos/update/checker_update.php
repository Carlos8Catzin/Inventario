<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/checker.model.php';

if(isset($_POST['type'])&&($_POST['type'])!=""){
    $tabla = $_POST['type'];
    $ruta = $_POST['Ruta'];
    date_default_timezone_set("America/Mexico_City");
                       
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    $fecha_actual = $fecha .' '. $hora;
    if($_POST['type']=='usuarios'){
        $Nombre = $_POST['Nombre'];
        $IdUsuario = $_POST['IdUsuario'];
        $Password = $_POST['Password'];
        $Estatus = $_POST['Estatus'];
        $IdUsuarioAplic = $_SESSION['IdUsuario'];
        if($Estatus == 1){
            $estado = "Activo";
        }else{
            $estado = "Inactivo";
        }
        if($Password!=""){
        $PwsEncrypt = sha1(md5($Password));
        $sqlUpdateChecker = "UPDATE usuarios SET Nombre='".$Nombre."', Password='".$PwsEncrypt."', Estatus='".$Estatus."' WHERE IdUsuario=".$IdUsuario;
        $descQuery = "<b>Modificación de nombre: </b>".$Nombre." <br> <b>Modificación de Estatus: </b>".$estado." <br> <b>Hubo modificación de contraseña</b>(Oculta por seguridad)";
        }else{
        $sqlUpdateChecker = "UPDATE usuarios SET Nombre='".$Nombre."', Estatus='".$Estatus."' WHERE IdUsuario=".$IdUsuario;
        $descQuery = "<b>Modificación de nombre: </b>".$Nombre." <br> <b>Modificación de Estatus: </b>".$estado." <br>";   
  
    }
}

 if($_POST['type']=='categorias'){
     $IdCategoria = $_POST['IdCategoria'];
     $nombreCat = $_POST['nombreCat'];
     $DescCat = $_POST['DescCat'];
     
     $sqlUpdateChecker = "UPDATE categorias SET NombreCategoria='".$nombreCat."', DescCategoria='".$DescCat."' WHERE IdCategoria=".$IdCategoria;
        
     
     if($DescCat!=""){
            $DescCat = $DescCat;
        }else{
            $DescCat = "Sin descripción";
        }
        
        $descQuery = "<b>Nombre de la categoría: </b>".$nombreCat." <br> "
                . "<b>Descripción de la categoría: </b>".$DescCat." <br> "
                . "<b>Fecha de modificación: </b>". date("d/m/Y g:i a", strtotime($fecha_actual));
     
     
 }

 if($_POST['type']=='productos'){
        $IdProd = $_POST['IdProducto'];
        $CodProd = $_POST['CodProd'];
        $nombreProd = $_POST['nombreProd'];
        $DescProd = $_POST['DescProd'];
        $CatProd = $_POST['CatProd'];
        $Stock = $_POST['Stock'];
        $PrecioC = $_POST['PrecioC'];
        $PrecioV = $_POST['PrecioV'];
        $Imagen = $_POST['Imagen'];
        $Status = $_POST['status'];
        $Proveedor = $_POST['IdProv']; 

     
     $sqlUpdateChecker = "UPDATE productos SET CodigoProd='".$_POST['CodProd']."', NombreProducto='".$nombreProd."', "
             . "DescProducto='".$nombreProd."', IdCategoria='".$CatProd."', Stock='".$Stock."', "
             . "PrecioCompra='".$PrecioC."', PrecioVenta='".$PrecioV."',"
             . "StatusProd=".$Status.", ImgProd='".$Imagen."', IdProveedor='".$Proveedor."' "
             . "WHERE IdProducto=".$IdProd;
        
     
     if($DescProd!=""){
            $DescProd = $DescProd;
        }else{
            $DescProd = "Sin descripción";
        }
        
        if($Status==0){
            $DesScProd = "Inactivo";
        }else{
            $DesScProd = "Activo";
        }
        
        $descQuery = "<img src='views/images/productos/".$Imagen."' width='65' height='65'><br> "
                ."<b>Nombre del producto: </b>".$nombreProd." <br> "
                ."<b>Código del producto: </b>".$CodProd." <br> "
                . "<b>Descripción: </b>".$DescProd." <br> "
                . "<b>Stock: </b>".$Stock." disponibles<br> "
                . "<b>Precio de Compra: </b>$".$PrecioC." pesos MXN<br> "
                . "<b>Precio de Venta: </b>$".$PrecioV." pesos MXN<br> "
                . "<b>Estatus: </b>".$DesScProd."<br> "
                . "<b>Fecha de modificación: </b>". date("d/m/Y g:i a", strtotime($fecha_actual));
 }
 
  if($_POST['type']=='edit-venta'){
            if($_POST['IdFormaPago']==1){
                $IdVenta = $_POST['IdVenta'];
                $CodFactura = $_POST['CodFactura'];
                $IdCliente = $_POST['IdCliente'];
                $IdUsuario = $_SESSION['IdUsuario'];
                $IdFormaPago = $_POST['IdFormaPago'];
                $Productos = $_POST['Productos'];
                $Impuesto = $_POST['Impuesto'];
                $IVA = $_POST['IVA'];
                $PagoNeto = $_POST['PagoNeto'];
                $PagoTotal = $_POST['PagoTotal'];
                $Comprador = $_POST['NombreCliente'];
                $Vendedor = $_POST['Vendedor'];
                $sqlUpdateChecker = "UPDATE ventas SET IdFormaPago = ".$IdFormaPago.", Productos = '".$Productos."',"
                        . "Impuesto  = '".$Impuesto."', IVA = ".$IVA.","
                        . "PagoNeto  = '".$PagoNeto."', PagoTotal = '".$PagoTotal."', Fecha = NOW() WHERE IdVenta= ".$IdVenta;
                $descQuery = "Actualizar Venta <br />"
                        ."<b>Código de Factura: </b>".$CodFactura." <br> "
                        ."<b>Cliente: </b>".$IdCliente." - ".$Comprador."<br> "
                        ."<b>Productos: </b>".$Productos." <br> "
                        ."<b>Metódo de pago: </b> Efectivo <br> "
                        ."<b>Pago Neto: </b>$".$PagoNeto." MXN <br> "
                        ."<b>Pago Total: </b>$".$PagoTotal." MXN <br> "
                        ;
            }else if(($_POST['IdFormaPago']==2 || $_POST['IdFormaPago'])==3){
               $IdVenta = $_POST['IdVenta'];
                $CodFactura = $_POST['CodFactura'];
                $IdCliente = $_POST['IdCliente'];
                $IdUsuario = $_SESSION['IdUsuario'];
                $IdFormaPago = $_POST['IdFormaPago'];
                $Productos = $_POST['Productos'];
                $Impuesto = $_POST['Impuesto'];
                $IVA = $_POST['IVA'];
                $PagoNeto = $_POST['PagoNeto'];
                $PagoTotal = $_POST['PagoTotal'];
                $Comprador = $_POST['NombreCliente'];
                $Vendedor = $_POST['Vendedor'];
               $CodTransaccion = $_POST['CodTransaccion'];
               
               $metodoPago = "";
                if($_POST['IdFormaPago']==2){
                    $metodoPago = "Tarjeta de crédito";
                }else{
                    $metodoPago = "Tarjeta de débito";
                }
                $Comprador = $_POST['NombreCliente'];
                $Vendedor = $_POST['Vendedor'];
                $sqlUpdateChecker = "UPDATE ventas SET IdFormaPago = ".$IdFormaPago.", Productos = '".$Productos."',"
                        . "Impuesto  = '".$Impuesto."', IVA = ".$IVA.","
                        . "PagoNeto  = '".$PagoNeto."', PagoTotal = '".$PagoTotal."', CodTransaccion = '".$CodTransaccion."', Fecha = NOW() WHERE IdVenta= ".$IdVenta;
                $descQuery = "Actualizar Venta <br />"
                        ."<b>Código de Factura: </b>".$CodFactura." <br> "
                        ."<b>Cliente: </b>".$IdCliente." - ".$Comprador."<br> "
                        ."<b>Productos: </b>".$Productos." <br> "
                        ."<b>Metódo de pago: </b> ".$metodoPago." <br> "
                        ."<b>Pago Neto: </b>$".$PagoNeto." MXN <br> "
                        ."<b>Pago Total: </b>$".$PagoTotal." MXN <br> "
                        ;
        }
  }
$datos = array(
        'Operacion' => $_POST['Operacion'],
        'Ruta' => $_POST['Ruta'],
        'IdUsuarioEject' => $_SESSION['IdUsuario'],
        'Query' => $sqlUpdateChecker,
        'DescQuery' => $descQuery
    );
    
    $respuesta = CrudChecker::InsertarChecker($datos);
        
      echo $respuesta;

}