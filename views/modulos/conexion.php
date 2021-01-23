<?php

$connexion = mysqli_connect("localhost","root","");
$db_nombre = "inventario";
if( mysqli_connect_errno())
  {
      echo "Hubo un problema con la base de datos error al conectar";
      exit() ;
  }

  $db = mysqli_select_db($connexion,$db_nombre) or die ("No se encuentra la Base de 
 datos");

  mysqli_set_charset($connexion,"utf8");
?>