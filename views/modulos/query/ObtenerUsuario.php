<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/usuarios.model.php';
if(isset($_POST['IdUsuario'])&&($_POST['IdUsuario'])!=""){
    $IdUsuario = $_POST['IdUsuario'];
    echo json_encode(ModelUsuario::ObtenerUsuario($IdUsuario));
    
}