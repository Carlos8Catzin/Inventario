<?php
require '../../../models/checker.model.php';

if(isset($_POST['type'])&&($_POST['type'])!=""){
    $tabla = $_POST['type'];
    
    if($_POST['type']=='usuarios'){
        $Nombre = $_POST['Nombre'];
        $Usuario = $_POST['Usuario'];
        $Password = $_POST['Password'];
        $Rol = $_POST['Rol'];
        $PwsEncrypt = sha1(md5($Password));
        $sqlInsertChecker = "INSERT INTO ".$tabla."(Nombre, Usuario, Password, Rol) VALUES "
                . "(''".$Nombre."'',''".$Usuario."'',''".$PwsEncrypt."'',".$Rol.")";
    
        
        
    }
    $datos = array(
        'Operacion' => $_POST['Operacion'],
        'Ruta' => $_POST['ruta'],
        'IdUsuarioEject' => $_POST['userejec'],
        'Query' => $sqlInsertChecker
    );
    
    $respuesta = CrudChecker::InsertarChecker($datos);
        
      echo $respuesta;

    
}

?>