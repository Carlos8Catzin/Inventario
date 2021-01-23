<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/proveedores.model.php';
require '../../../models/bitacora.model.php';

if(isset($_POST['type'])&&($_POST['type'])=="proveedor"){
    date_default_timezone_set("America/Mexico_City");
         $NombreProveedor = $_POST['NombreProveedor'];
         $RazonSocial = $_POST['RazonSocial'];
         $Domicilio = $_POST['Domicilio'];
         $Poblacion = $_POST['Poblacion'];
         $CodigoPostal = $_POST['CodigoPostal'];
         $Telefono = $_POST['Telefono'];
         $Pais = $_POST['Pais'];
         $Email = $_POST['Email'];
         $URL = $_POST['URL'];
    $datos = array(
        'NombreProveedor' => $NombreProveedor,
        'RazonSocial' => $RazonSocial,
        'Domicilio' => $Domicilio,
        'Poblacion' => $Poblacion,
        'CodigoPostal' => $CodigoPostal,
        'Telefono' => $Telefono,
        'Pais' => $Pais,
        'Email' => $Email,
        'URL' => $URL
    );

    $respuesta = CrudProveedores::InsertarProveedores($datos);
        
    echo $respuesta;
    
    if($respuesta = 1){
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $fecha_actual = $fecha .' '. $hora;
        $TipoMsj = "A";
        $mensaje = "Se ha creado un nuevo proveedor en el sistema con los siguientes datos <br /> <b>Nombre del proveedor: </b> ".$NombreProveedor
                ." <br /> <b>Razón social: </b>".$RazonSocial
                ." <br /> <b>Domicilio: </b>".$Domicilio
                ." <br /> <b>Poblacion: </b>".$Poblacion
                ." <br /> <b>CodigoPostal: </b>".$CodigoPostal
                ." <br /> <b>Pais: </b>".$Pais;
        $Proceso = "Proveedores";

        $IdUsuario = $_SESSION['IdUsuario'];

        CrudBitacora::GrabaBitacora($Proceso, $TipoMsj, $mensaje, $IdUsuario, $fecha_actual);
    }else{
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $fecha_actual = $fecha .' '. $hora;
        $TipoMsj = "E";
        $mensaje = "Se ha producido un error al crear un nuevo proveedor con los siguientes datos <br />  <br /> <b>Nombre del proveedor: </b> ".$NombreProveedor.""
                    ." <br /> <b>Razón social: </b>".$RazonSocial
                    ." <br /> <b>Domicilio: </b>".$Domicilio
                    ." <br /> <b>Poblacion: </b>".$Poblacion
                    ." <br /> <b>CodigoPostal: </b>".$CodigoPostal
                    ." <br /> <b>Pais: </b>".$Pais;
        $Proceso = "Proveedores";

        $IdUsuario = $_SESSION['IdUsuario'];

        CrudBitacora::GrabaBitacora($Proceso, $TipoMsj, $mensaje, $IdUsuario, $fecha_actual);
    }
}else{
    echo 0;
}