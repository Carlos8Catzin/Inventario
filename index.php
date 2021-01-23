<?php  
require_once "controllers/admin-venta.controlador.php"; 
require_once "controllers/categorias.controlador.php"; 
require_once "controllers/clientes.controlador.php"; 
require_once "controllers/configuracion.controlador.php"; 
require_once "controllers/nueva-venta.controlador.php"; 
require_once "controllers/inventario.controlador.php";
require_once "controllers/plantilla.controlador.php";
require_once "controllers/mensajes.controlador.php"; 
require_once "controllers/reporte-venta.controlador.php"; 
require_once "controllers/reportes.controlador.php"; 
require_once "controllers/usuarios.controlador.php"; 

require_once "models/admin-venta.model.php"; 
require_once "models/clientes.model.php"; 
require_once "models/configuracion.model.php"; 
require_once "models/inventario.model.php";
require_once "models/nueva-venta.model.php"; 
require_once "models/reporte-venta.model.php"; 
require_once "models/reportes.model.php"; 
require_once "models/usuarios.model.php";
require_once "models/plantilla.model.php"; 
require_once "models/mensajes.model.php"; 
require_once 'models/bitacora.model.php';
require_once 'models/conexion.php';


$plantilla = new ControllerPlantilla();
$plantilla -> strPlantilla();