<!DOCTYPE html>
<html>
<head>
<?php include 'modulos/conexion.php';
 session_start();
?>    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
     <?php
        if((isset($_GET["ruta"]) && $_GET["ruta"]!="")){
             if((isset($_SESSION['Rol']) && $_SESSION['Rol']!="")){
            $sqltitulo = mysqli_query($connexion,"SELECT r.* FROM rutas r INNER JOIN accessruta ar ON ar.IdRuta = r.idrutas INNER JOIN roles ro 
                                                    ON ar.IdRol = ro.idRole WHERE r.rutadesc = '".$_GET["ruta"]."' AND activo = 1 AND  ro.idRole = ".$_SESSION['Rol']);
             }else{
            $sqltitulo = mysqli_query($connexion,"SELECT r.* FROM rutas r INNER JOIN accessruta ar ON ar.IdRuta = r.idrutas INNER JOIN roles ro 
                                                    ON ar.IdRol = ro.idRole WHERE r.rutadesc = '".$_GET["ruta"]."' AND activo = 1");     
             }
            $titulo = mysqli_fetch_array($sqltitulo);
            if(mysqli_num_rows($sqltitulo)>0){
                echo $titulo['tituloruta'];
            }else{
                echo "404 Página no encontrada";
            }
        }else{
            echo "Panel de control";
        }
    ?>
    </title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="views/dist/css/adminlte.css">
  <link rel="stylesheet" href="views/css/style.css">
  <link rel="stylesheet" href="views/dist/css/select2.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <link rel="icon" href="views/images/plantilla/icono-negro.png" /> 
  <!-- jQuery -->
  <script src="views/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
  <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->    
  <script src="views/dist/js/adminlte.min.js"></script>
  <script src="views/dist/js/select2.min.js"></script>
  <script src="views/dist/js/jquery-ui.js"></script>
  <script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="views/js/plantilla.js"></script>
  <script src="Ajax/Export.js"></script>
  <script src="views/js/JQueryNumber.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
  
  <style>
    .dataTables_filter{
        float: right;
    }
  </style>
</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini <?php if(!isset($_SESSION["inicioSesion"])){?>login-page<?php } ?>">
<!-- Site wrapper -->

    <?php  
    if(isset($_SESSION["inicioSesion"]) && ($_SESSION["inicioSesion"] == "ok")){
            echo '<div class="wrapper">';
            include 'modulos/header.php';
            include 'modulos/aside.php'; 
            if((isset($_GET["ruta"]) && $_GET["ruta"]!="")){
                if((isset($_SESSION['Rol']) && $_SESSION['Rol']!="")){
                $sqlruta = mysqli_query($connexion,"SELECT r.* FROM rutas r INNER JOIN accessruta ar ON ar.IdRuta = r.idrutas INNER JOIN roles ro 
                                                    ON ar.IdRol = ro.idRole WHERE r.rutadesc = '".$_GET["ruta"]."' AND activo = 1 AND ro.idRole = ".$_SESSION['Rol']);
                }else{
                $sqlruta = mysqli_query($connexion,"SELECT r.* FROM rutas r INNER JOIN accessruta ar ON ar.IdRuta = r.idrutas INNER JOIN roles ro 
                                                    ON ar.IdRol = ro.idRole WHERE r.rutadesc = '".$_GET["ruta"]."' AND activo = 1");    
                }
                $ruta = mysqli_fetch_array($sqlruta);
                if(mysqli_num_rows($sqlruta)>0){
                  include "modulos/".$ruta["rutadesc"].".php";
                }else{
                  include 'modulos/error404.php';  
                }
            }else{
                include 'modulos/inicio.php';
            }
            include 'modulos/footer.php';
            echo '</div>';
    }else{
        include 'modulos/login.php';
    }
    
    if(isset($_SESSION["Estatus"]) && ($_SESSION["Estatus"] != "1")){
        echo "<script>alert('Este usuario esta inhabilitado, contacte con el Administrador');"
        . "window.location.href = 'logout'"
                . "</script>";

    }
            ?>

<!-- ./wrapper -->

</body>
</html>