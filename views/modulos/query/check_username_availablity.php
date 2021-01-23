<?php

if(isset($_POST['username'])&& ($_POST['username'])!=""){

    $conexion= new mysqli('localhost','root','','Inventario');

    $consulta =  "SELECT * FROM usuarios WHERE Usuario = '". $_POST['username'] ."'";
    $result = $conexion->query($consulta);

    if( $result->num_rows > 0)
        echo 0;
    else
        echo 1;
}
?>