<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/checker.model.php';
require '../../../models/bitacora.model.php';

if(isset($_POST['IdUsuario'])&&($_POST['IdUsuario'])!=""){
    $tabla = "usuarios";
    $IdUsuario = $_POST['IdUsuario'];
    $conexion= new mysqli('localhost','root','','Inventario');

    $consulta =  "SELECT * FROM usuarios WHERE IdUsuario = '". $_POST['IdUsuario'] ."'";
    $result = $conexion->query($consulta);
$datouser = mysqli_fetch_array($result);
   
        if($datouser['Rol']==2){
            $roles = "Administrador";
        }else if($datouser['Rol']==3){
            $roles = "Especial";
        }else if($datouser['Rol']==4){
            $roles = "Vendedor";  
        }else if($datouser['Rol']==1){
            $roles = "SuperUsuario";
        }
 
        $Operacion = "Eliminar Usuario";
        $Ruta = "Usuarios";
        $IdUsuarioEject = $_SESSION['IdUsuario'];
        $sqlDeleteChecker = "DELETE FROM ".$tabla." WHERE IdUsuario = '".$IdUsuario."'";
        $descQuery = "<b>Nombre: </b>".$datouser['Nombre']." <br> <b>Nombre de usuario: </b>".$datouser['Usuario']." <br> <b>Rol: </b>".$roles;
        
        
        
    $datos = array(
        'Operacion' => $Operacion,
        'Ruta' => $Ruta,
        'IdUsuarioEject' => $IdUsuarioEject,
        'Query' => $sqlDeleteChecker,
        'DescQuery' => $descQuery
    );
    
    $respuesta = CrudChecker::InsertarChecker($datos);
        
      echo $respuesta;

    
}

if(isset($_POST['IdCategoria'])&&($_POST['IdCategoria'])!=""){
    $tabla = "categorias";
    $IdCategoria = $_POST['IdCategoria'];
    $conexion= new mysqli('localhost','root','','Inventario');

    $consulta =  "SELECT * FROM categorias WHERE IdCategoria = '". $IdCategoria ."'";
    $result = $conexion->query($consulta);
$datocat = mysqli_fetch_array($result);
   
 
        $Operacion = "Eliminar Categoria";
        $Ruta = "categorias";
        $IdUsuarioEject = $_SESSION['IdUsuario'];
        $sqlDeleteChecker = "DELETE FROM ".$tabla." WHERE IdCategoria = '".$IdCategoria."'";
        $descQuery = "<b>ID categoría: </b>".$datocat['IdCategoria']." <br>"
                . "<b>Nombre de la categoría: </b>".$datocat['NombreCategoria']." <br>"
                . " <b>Descripción: </b>".$datocat['DescCategoria'];
        
        
        
    $datos = array(
        'Operacion' => $Operacion,
        'Ruta' => $Ruta,
        'IdUsuarioEject' => $IdUsuarioEject,
        'Query' => $sqlDeleteChecker,
        'DescQuery' => $descQuery
    );
    
    $respuesta = CrudChecker::InsertarChecker($datos);
        
      echo $respuesta;

    
}

if(isset($_POST['IdProducto'])&&($_POST['IdProducto'])!=""){
    $tabla = "productos";
    $IdProducto = $_POST['IdProducto'];
    $conexion= new mysqli('localhost','root','','Inventario');

    $consulta =  "SELECT * FROM productos WHERE IdProducto = '". $IdProducto ."'";
    $result = $conexion->query($consulta);
$datoprod = mysqli_fetch_array($result);
   
if($datoprod['DescProducto']==""){
    $descProd = "Sin descripción";
}else{
    $descProd = $datoprod['DescProducto'];
}
 
        $Operacion = "Eliminar Producto";
        $Ruta = "inventario";
        $IdUsuarioEject = $_SESSION['IdUsuario'];
        $sqlDeleteChecker = "DELETE FROM ".$tabla." WHERE IdProducto = '".$IdProducto."'";
        $descQuery = "<b>Código del producto: </b>".$datoprod['CodigoProd']." <br>"
                . "<b>Nombre del producto: </b>".$datoprod['NombreProducto']." <br>"
                . " <b>Descripción: </b>".$descProd." <br>"
                . "<img src='views/images/productos/".$datoprod['ImgProd']."' width='65' heigth='65'> ";
        
        
        
    $datos = array(
        'Operacion' => $Operacion,
        'Ruta' => $Ruta,
        'IdUsuarioEject' => $IdUsuarioEject,
        'Query' => $sqlDeleteChecker,
        'DescQuery' => $descQuery
    );
    
    $respuesta = CrudChecker::InsertarChecker($datos);
        
      echo $respuesta;

    
}

if(isset($_POST['IdCliente'])&&($_POST['IdCliente'])!=""){
    $tabla = "clientes";
    $IdCliente = $_POST['IdCliente'];
    $conexion= new mysqli('localhost','root','','Inventario');

    $consulta =  "SELECT * FROM clientes WHERE IdCliente = '". $IdCliente ."'";
    $result = $conexion->query($consulta);
$datoprod = mysqli_fetch_array($result);
  
 
        $Operacion = "Eliminar Cliente";
        $Ruta = "Clientes";
        $IdUsuarioEject = $_SESSION['IdUsuario'];
        $sqlDeleteChecker = "DELETE FROM ".$tabla." WHERE IdCliente = '".$IdCliente."'";
        $descQuery = "<b>Id del Cliente: </b>".$datoprod['IdCliente']." <br>"
                . "<b>Nombre del Cliente: </b>".$datoprod['NombreCliente']." <br>"
                . "<b>Apellido del Cliente: </b>".$datoprod['ApellidoCliente']." <br>"
                . "<b>Dirección: </b>".$datoprod['DireccionCliente']." <br>"
                . "<b>Total de compras hechas: </b>".$datoprod['TotalCompras']." compras<br>";
        
        
        
    $datos = array(
        'Operacion' => $Operacion,
        'Ruta' => $Ruta,
        'IdUsuarioEject' => $IdUsuarioEject,
        'Query' => $sqlDeleteChecker,
        'DescQuery' => $descQuery
    );
    
    $respuesta = CrudChecker::InsertarChecker($datos);
        
      echo $respuesta;

    
}

if(isset($_POST['IdReporte'])&&($_POST['IdReporte'])!=""){
    $tabla = "reportes";
    $IdReporte = $_POST['IdReporte'];
    $conexion= new mysqli('localhost','root','','Inventario');

    $consulta =  "SELECT * FROM reportes WHERE IdReporte = '". $IdReporte ."'";
    $result = $conexion->query($consulta);
$datoprod = mysqli_fetch_array($result);
  
 
        $Operacion = "Eliminar Reporte";
        $Ruta = "Reportes";
        $IdUsuarioEject = $_SESSION['IdUsuario'];
        $sqlDeleteChecker = "DELETE FROM ".$tabla." WHERE IdReporte = '".$IdReporte."'";
        $descQuery = "<b>ID del Reporte: </b>".$datoprod['IdReporte']." <br>"
                . "<b>Nombre del Reporte: </b>".$datoprod['TituloReporte']." <br>";
        
        
        
    $datos = array(
        'Operacion' => $Operacion,
        'Ruta' => $Ruta,
        'IdUsuarioEject' => $IdUsuarioEject,
        'Query' => $sqlDeleteChecker,
        'DescQuery' => $descQuery
    );
    
    $respuesta = CrudChecker::InsertarChecker($datos);
        
      echo $respuesta;

    
}


if(isset($_POST['deleteAll'])&&($_POST['deleteAll'])==1){
   if(isset($_POST['IdPendiente'])&&($_POST['IdPendiente'])!=""){
       
        $conexion= new mysqli('localhost','root','','Inventario');
       $conDel =  "DELETE FROM pendientes WHERE IdPendiente = '". $_POST['IdPendiente'] ."'";
       date_default_timezone_set("America/Mexico_City");
                       
        $fecha_a = date('Y-m-d');                      
        $hora_a = date('H:i:s');
        $Fecha = $fecha_a .' '. $hora_a;
        $TipoMensaje = "A";
       if($conexion->query($conDel)){
           echo 1;
           $mensajeRech = "eliminado";
           $TipoMensaje = "A";
       }else{
           echo 0;
           $TipoMensaje = "E";
           $mensajeRech = "producido un error al intentar eliminar";
       }
       $Proceso = "Eliminar transacción del Checker";
        $mensaje = "<b>Se ha ".$mensajeRech." una transacción con número de Folio: </b>". $_POST['IdPendiente']. "<br>Por el usuario ".$_SESSION['Usuario'];
        $IdUsuario = $_SESSION['IdUsuario'];
    
         CrudBitacora::GrabaBitacora($Proceso, $TipoMensaje, $mensaje, $IdUsuario, $Fecha);
    } 
}

?>