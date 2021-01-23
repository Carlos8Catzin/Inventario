<?php
define ('DB_USER', "root");
define ('DB_PASSWORD', "");
define ('DB_DATABASE', "inventario");
define ('DB_HOST', "localhost");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
$sql="";
if(isset($_GET['q'])&&($_GET['q'])!=""){
                $sql = "SELECT * FROM clientes 
		WHERE NombreCliente LIKE '%".$_GET['q']."%' OR ApellidoCliente LIKE '%".$_GET['q']."%' OR IdCliente LIKE '%".$_GET['q']."%'
		LIMIT 10"; 
}else{
                $sql = "SELECT * FROM clientes LIMIT 10"; 
}
$result = $mysqli->query($sql);
$json = [];
while($row = $result->fetch_assoc()){
     $json[] = ['id'=>$row['IdCliente'], 'text'=>$row['NombreCliente'].' '.$row['ApellidoCliente']];
}
echo json_encode($json);