<?php

require_once 'models/bitacora.model.php';

class ControllerUsuarios{
    
    static public function strIngresoUsuario(){
        
        if(isset($_POST["ingUsuario"])&&($_POST["ingUsuario"])!=""){
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) 
               && preg_match('/^[a-zA-Z0-9]+$/', sha1(md5($_POST["ingPassword"])))){
                
                $tabla = "usuarios";
                
                $item = "Usuario";
                $valor = $_POST["ingUsuario"];
                $respuesta = ModelUsuario::MdlMostrarUsuario($tabla, $item, $valor);
         
                if($respuesta != false){
                    if($respuesta["Usuario"]== $_POST["ingUsuario"] && $respuesta["Password"]==sha1(md5($_POST["ingPassword"]))){
                       $_SESSION["inicioSesion"] = "ok";
                       $_SESSION["IdUsuario"] = $respuesta["IdUsuario"];
                       $_SESSION["Nombre"] = $respuesta["Nombre"];
                       $_SESSION["Usuario"] = $respuesta["Usuario"];
                       $_SESSION["Rol"] = $respuesta["Rol"];
                       $_SESSION["Foto"] = $respuesta["Foto"];
                       $_SESSION["UltLogin"] = $respuesta["UltLogin"];
                       $_SESSION["FechaCreacion"] = $respuesta["FechaCreacion"];
                       $_SESSION["Estatus"] = $respuesta["Estatus"];
                       date_default_timezone_set("America/Mexico_City");
                       
                       $fecha = date('Y-m-d');
                       $hora = date('H:i:s');
                       
                       $fecha_actual = $fecha .' '. $hora;
                       
                       $conecta= new mysqli('localhost','root','','Inventario');
                       $coned = "UPDATE usuarios SET UltLogin = '".$fecha_actual."' WHERE (IdUsuario = '".$respuesta["IdUsuario"]."')";
                       $conecta->query($coned); 
                       
                       $Proceso = "Acceso al sistema";
                       $TipoMensaje = "A";
                       $mensaje = "El usuario <b>". $respuesta["Usuario"]. "</b> ha accedido al sistema";
                       $IdUsuario = $respuesta["IdUsuario"];
                       
                       CrudBitacora::GrabaBitacora($Proceso, $TipoMensaje, $mensaje, $IdUsuario, $fecha_actual);
                       if($respuesta["Rol"] == 4){
                           echo '<script> window.location = "nueva-venta"; </script>';
                       }else{
                            echo '<script> window.location = "inicio"; </script>';
                       }
                   }else{
                      echo '<br /><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>'; 
                   }
                }else{
                    echo '<br /><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                }
            }
        }
    }
    
    static public function strCrearUsuario(){
       if(isset($_POST["nuevoUsuario"])){
           if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])
             || preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"])
             || preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPaasword"])){
               
               '<script>swal("Good job!", "You clicked the button!", "success");</script>';  
           }else{
               '<script>
               swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                        window.location = "usuarios"
                      });
                    } else {
                      window.location = "usuarios"
                    }
                  });
               </script>';
           }
       } 
    }
   
}