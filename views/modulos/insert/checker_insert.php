<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/checker.model.php';

if(isset($_POST['type'])&&($_POST['type'])!=""){
    $tabla = $_POST['type'];
    date_default_timezone_set("America/Mexico_City");
                       
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
                       
    $fecha_actual = $fecha .' '. $hora;
    if($_POST['type']=='usuarios'){
        $Nombre = $_POST['Nombre'];
        $Usuario = $_POST['Usuario'];
        $Password = $_POST['Password'];
        $Rol = $_POST['Rol'];
        if($_POST['Rol']==2){
            $roles = "Administrador";
        }else if($_POST['Rol']==3){
            $roles = "Especial";
        }else if($_POST['Rol']==4){
            $roles = "Vendedor";  
        }

        $PwsEncrypt = sha1(md5($Password));
        $sqlInsertChecker = "INSERT INTO ".$tabla."(Nombre, Usuario, Password, Rol, FechaCreacion) VALUES "
                . "('".$Nombre."','".$Usuario."','".$PwsEncrypt."',".$Rol.",'".$fecha_actual."')";
        $descQuery = "<b>Nombre: </b>".$Nombre." <br> <b>Nombre de usuario: </b>".$Usuario." <br> <b>Rol: </b>".$roles." <br> <b>Fecha de creación: </b>". date("d/m/Y g:i a", strtotime($fecha_actual));
        
       
    }
    
    
    if($_POST['type']=='productos'){
        $CodProd = $_POST['CodProd'];
        $nombreProd = $_POST['nombreProd'];
        $DescProd = $_POST['DescProd'];
        $CatProd = $_POST['CatProd'];
        $Stock = $_POST['Stock'];
        $PrecioC = $_POST['PrecioC'];
        $PrecioV = $_POST['PrecioV'];
        $Imagen = $_POST['Imagen'];
        $Proveedor = $_POST['IdProv']; 
        

        $sqlInsertChecker = "INSERT INTO ".$tabla."(CodigoProd, NombreProducto, DescProducto, IdCategoria, Stock, ImgProd, PrecioCompra, PrecioVenta, IdUsuario, Fecha, IdProveedor) VALUES "
                . "(".$CodProd.",'".$nombreProd."','".$DescProd."',".$CatProd.",'".$Stock."','".$Imagen."','".$PrecioC."','".$PrecioV."','".$_SESSION['IdUsuario']."','".$fecha_actual."','".$Proveedor."')";
        $descQuery = "<b>Código: </b>".$CodProd." <br> <b>Nombre del producto: </b>".$nombreProd." <br> "
                . "<b>Descripción: </b>".$DescProd." <br> "
                ."<b>Disponibles: </b>".$Stock." productos <br> "
                ."<b>Imagen: </b><img src='views/images/productos/".$Imagen."' width='65' height='65'><br> "
                ."<b>Precio de Compra: </b>$".$PrecioC." MXN <b>Precio de Venta: </b>$".$PrecioV." MXN<br> "
                . "<b>Fecha de creación: </b>". date("d/m/Y g:i a", strtotime($fecha_actual));
        
       
    }
    
    
    if($_POST['type']=='categorias'){
        $nombreCat = $_POST['nombreCat'];
        $DescCat = $_POST['DescCat'];
        
        
        
        $sqlInsertChecker = "INSERT INTO ".$tabla."(NombreCategoria, DescCategoria) VALUES "
                . "('".$nombreCat."','".$DescCat."')";
        
        if($DescCat!=""){
            $DescCat = $DescCat;
        }else{
            $DescCat = "Sin descripción";
        }
        
        $descQuery = "<b>Nombre de la categoría: </b>".$nombreCat." <br> "
                . "<b>Descripción de la categoría: </b>".$DescCat." <br> "
                . "<b>Fecha de creación: </b>". date("d/m/Y g:i a", strtotime($fecha_actual));
        
        
    }
    $IdUsuarioAplic = $_SESSION['IdUsuario'];
    $datos = array(
        'Operacion' => $_POST['Operacion'],
        'Ruta' => $_POST['ruta'],
        'IdUsuarioEject' => $_SESSION['IdUsuario'],
        'Query' => $sqlInsertChecker,
        'DescQuery' => $descQuery
    );
    
    $respuesta = CrudChecker::InsertarChecker($datos);
        
      echo $respuesta;

    
}

?>