<?php

if(isset($_POST['CodigoProd'])&& ($_POST['CodigoProd'])!=""){

    $conexion= new mysqli('localhost','root','','Inventario');

    $consulta =  "SELECT * FROM productos WHERE CodigoProd = '". $_POST['CodigoProd'] ."'";
    $result = $conexion->query($consulta);

    if( $result->num_rows > 0)
        echo 0;
    else
        echo 1;
}
?>