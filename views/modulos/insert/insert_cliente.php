<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/conexion.php';
require '../../../models/clientes.model.php';
require '../../../models/bitacora.model.php';

if(isset($_POST['type'])&&($_POST['type'])=="cliente"){
    date_default_timezone_set("America/Mexico_City");
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Email = $_POST['Email'];
    $Direccion = nl2br($_POST['Direccion']);
    $FechaNac = date("Y-m-d", strtotime($_POST['FechaNac']));
    $FechaRegistro = date('Y-m-d g:i');
    $datos = array(
        'Nombre' => $Nombre,
        'Apellido' => $Apellido,
        'Email' => $Email,
        'Direccion' => $Direccion,
        'FechaNac' => $FechaNac,
        'FechaReg' => $FechaRegistro,
        'IdUsuario' => $_SESSION['IdUsuario']
    );

    $respuesta = CrudClientes::InsertarCliente($datos);
        
    echo $respuesta;
    
    if($respuesta = 1){
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $fecha_actual = $fecha .' '. $hora;
        $TipoMsj = "A";
        $mensaje = "Se ha creado un nuevo cliente en el sistema con los siguientes datos <br /> <b>Nombre Completo: </b> ".$Nombre." ".$Apellido." <br /> <b>Email: </b>".$Email
                ." <br /> <b>Dirección: </b>".$Direccion
                ." <br /> <b>Fecha de Nacimiento: </b>".$FechaNac;
        $Proceso = "Registro de Clientes";

        $IdUsuario = $_SESSION['IdUsuario'];

        CrudBitacora::GrabaBitacora($Proceso, $TipoMsj, $mensaje, $IdUsuario, $fecha_actual);
    }else{
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $fecha_actual = $fecha .' '. $hora;
        $TipoMsj = "E";
        $mensaje = "Se ha producido un error al registrar un nuevo cliente con los siguientes datos <br /> <b>Nombre Completo: </b> ".$Nombre." ".$Apellido." <br /> <b>Email: </b>".$Email
                ." <br /> <b>Dirección: </b>".$Direccion
                ." <br /> <b>Fecha de Nacimiento: </b>".$FechaNac;
        $Proceso = "Registro de Clientes";

        $IdUsuario = $_SESSION['IdUsuario'];

        CrudBitacora::GrabaBitacora($Proceso, $TipoMsj, $mensaje, $IdUsuario, $fecha_actual);
    }
}