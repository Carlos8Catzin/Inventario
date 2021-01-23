<?php
if((isset($_POST['space'])&&($_POST['space'])!="")){
    $tabla = $_POST['space'];
    $consulta = "SELECT * FROM $tabla ORDER by 1 DESC";
}

echo 0;
