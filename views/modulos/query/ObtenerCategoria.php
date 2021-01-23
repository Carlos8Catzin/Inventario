<?php
if(!isset($_SESSION)){
    session_start();
}
require '../../../models/categorias.model.php';
if(isset($_POST['IdCategoria'])&&($_POST['IdCategoria'])!=""){
    $IdCategoria = $_POST['IdCategoria'];
    echo json_encode(CrudCategoria::ObtenerCategoria($IdCategoria));
    
}