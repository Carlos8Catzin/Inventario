    function validateUser(usuario) {
        var userReg = /^([a-zA-Z0-9_.+-])+$/;
        return userReg.test(usuario);
}

    function validateNombre(nombre) {
        var userReg = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;
        return userReg.test(nombre);
}

    function validateDesc(descripcion) {
        var DescReg = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ _.:(),+-]+$/;
        return DescReg.test(descripcion);
}

    function validatePass(pass) {
        var userReg = /^[a-zA-Z0-9 _.+-]+$/;
        return userReg.test(pass);
}
function mostrarAdminVentas(){
      $.ajax({
         type: "POST",
         url: "views/modulos/query/mostrarAdminVenta.php",
         success:function(r){
             $("#tablaDatosVentas").html(r);
         }
      });
  }
function ObtenerBuzon(IdUsuario){
        //$(this).removeClass("btn-warning NuevoMensaje");
        //$(this).addClass("btn-default");
      $.ajax({
         type: "POST",
         url: "views/modulos/query/ComprobarInbox.php",
         data: "IdUsuario="+IdUsuario,
         success:function(r){
             console.log(r);
             $("#msg_history").html(r);
             $("#Mensaje").focus();
         }
         
      });
  };
  
function LanzarMensaje(){
    var IdUsuario = $("#IdUsuarios").val();
    if($("#bandera").val()==1){
        ObtenerBuzon(IdUsuario);
    }
}
  
function ObtenerMensajesWith(IdUsuario){
        //$(this).removeClass("btn-warning NuevoMensaje");
        //$(this).addClass("btn-default");
      $.ajax({
         type: "POST",
         url: "views/modulos/query/ComprobarInbox.php",
         data: "IdUsuario="+IdUsuario,
         success:function(r){
             $("#msg_history").html(r);
         }
         
      });
      
 $("#Mensaje").focus(); 
  };
  
  function ObtenerNoMensajes(){
        //$(this).removeClass("btn-warning NuevoMensaje");
        //$(this).addClass("btn-default");
      $.ajax({
         type: "POST",
         url: "views/modulos/query/mostrarNoMensajes.php",
         success:function(NoMsj){
             if(NoMsj == 0){
                 $("#notification-mensaje").hide();
             }else{
                 $("#notification-mensaje").show();
                 $("#mensaje-counter").html(NoMsj);
            }
         }
         
      });
  };
  
  function OpenMensajes(){
      $.ajax({
         type: "POST",
         url: "views/modulos/query/mostrarDropMensajes.php",
         success:function(respuesta){
             $("#DropMensajes").html(respuesta);
         }
      });
  }
  
function mostrarReportes(){
      $.ajax({
         type: "POST",
         url: "views/modulos/query/mostrarReportes.php",
         success:function(r){
             $("#tablaDatosReportes").html(r);
         }
      });
  }
function mostrarProveedores(){
      $.ajax({
         type: "POST",
         url: "views/modulos/query/mostrarProveedores.php",
         success:function(r){
             $("#tablaDatosProveedores").html(r);
         }
      });
  }
  function mostrarUsuariosMensajes(){
      $.ajax({
         type: "POST",
         url: "views/modulos/query/mostrarUsuarioMensajes.php",
         success:function(r){
             $("#tablaUsuarioMensajes").html(r);
         }
      });
  }
function mostrarUsuarios(){
      $.ajax({
         type: "POST",
         url: "views/modulos/query/mostrarUsuarios.php",
         success:function(r){
             $("#tablaDatosUser").html(r);
         }
      });
  }
  
  function mostrarChecker(){
      $.ajax({
         type: "POST",
         url: "views/modulos/query/mostrarChecker.php",
         success:function(r){
             $("#tablaDatosChecker").html(r);
         }
      });
  }
  
  function mostrarBitacora(){
      $.ajax({
         type: "POST",
         url: "views/modulos/query/mostrarBitacora.php",
         success:function(r){
             $("#tablaDatosBitacora").html(r);
         }
      });
  }

  function mostrarProductos(){
      $.ajax({
         type: "POST",
         url: "views/modulos/query/mostrarProductos.php",
         success:function(r){
             $("#tablaDatosProductos").html(r);
         }
      });
  }
  
   function mostrarProductosVenta(){
      $.ajax({
         type: "POST",
         url: "views/modulos/query/mostrarProductosVenta.php",
         success:function(r){
             $("#tablaProductosVenta").html(r);
         }
      });
  }

  function mostrarCategorias(){
      $.ajax({
         type: "POST",
         url: "views/modulos/query/mostrarCategorias.php",
         success:function(r){
             $("#tablaDatosCategoria").html(r);
         }
      });
  }
  
    function mostrarClientes(){
      $.ajax({
         type: "POST",
         url: "views/modulos/query/mostrarClientes.php",
         success:function(r){
             $("#tablaDatosClientes").html(r);
         }
      });
  }
  
  function mostrarAllChecker(){
      $.ajax({
         type: "POST",
         url: "views/modulos/query/mostrarallChecker.php",
         success:function(r){
             $("#tablaAllChecker").html(r);
         }
      });
  }
  function CargarClientes(){
      if($("#nuevoCliente")!=0){
      $.ajax({
         type: "POST",
         url: "views/modulos/query/CargaCliente.php",
         success:function(r){
             $("#nuevoCliente").html(r);
     }
     });
 }
}
function ObtCodCliente(){
    $.ajax({
         type: "POST",
         url: "views/modulos/query/ObtenerCodigoCliente.php",
         dataType: 'json',
         success:function(r){
             console.log(r['IdCliente']);
             $("#codcliente").val(Number(r['IdCliente'])+1);
     }
     });
}
function SaveCliente(){
    var mensaje = "";
    var nombre = $("#nombrecliente").val().trim();
    var apellido = $("#apellcliente").val().trim();
    var email = $("#emailcliente").val().trim();
    var direccion = $("#direcliente").val().trim();
    var fechanac = $("#fechacliente").val().trim();
    var oknombre;
    var okapellido;
    var okemail;
    var okdireccion;
    var okfechnac;
    var emailRegex = /^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
    if(nombre == ""){
        mensaje += "El campo nombre del cliente esta vacío <br />";
        $("#nombrecliente").addClass("is-invalid");
        oknombre = false;
    }else{
        if(!validateNombre(nombre)){
            $("#nombrecliente").addClass("is-invalid");
            mensaje += "El campo nombre de cliente contiene caracteres no válidos <br />";
            oknombre = false;
        }else{
        $("#nombrecliente").removeClass("is-invalid");
        oknombre = true;
        }
    }
    if(apellido == ""){
        mensaje += "El campo apellido del cliente esta vacío <br />";
        $("#apellcliente").addClass("is-invalid");
        okapellido = false;
    }else{
        if(!validateNombre(apellido)){
            $("#apellcliente").addClass("is-invalid");
            mensaje += "El campo nombre de cliente contiene caracteres no válidos <br />";
            okapellido = false;
        }else{
        $("#apellcliente").removeClass("is-invalid");
        okapellido = true;
        }
    }
    
    if(email == ""){
        mensaje += "El campo Email del cliente esta vacío <br />";
        $("#emailcliente").addClass("is-invalid");
        okemail = false;
    }else{
        if (emailRegex.test(email)){
            $("#emailcliente").removeClass("is-invalid");
            okemail = true;
        }else{
            $("#emailcliente").addClass("is-invalid");
            mensaje += "El campo Email de cliente es incorrecto <br />";
            okemail = false;
        }
    }
    
    if(direccion == ""){
        mensaje += "El campo dirección del cliente esta vacío <br />";
        $("#direcliente").addClass("is-invalid");
        okdireccion = false;
    }else{
        $("#direcliente").removeClass("is-invalid");
        okdireccion = true;
    }
    if(fechanac == ""){
        mensaje += "El campo fecha de nacimiento del cliente esta vacío <br />";
        $("#fechacliente").addClass("is-invalid");
        okfechnac = false;
    }else{
        $("#fechacliente").removeClass("is-invalid");
        okfechnac = true;
    }
    
 if(oknombre == false || okapellido == false || okemail == false || okdireccion == false || okfechnac == false){
        $("#anotation").html('<div class="alert alert-danger alert-dismissible" id="message-form" style="font-size: 12px;"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h5><i class="icon fas fa-ban"></i>Atención</h5><p>' + mensaje + '</p></div>');       
    }else{
        insertarCliente();
    }
    
}

function insertarCliente(){
        var nombre = $("#nombrecliente").val().trim();
        var apellido = $("#apellcliente").val().trim();
        var email = $("#emailcliente").val().trim();
        var direccion = $("#direcliente").val().trim();
        var fechanac = $("#fechacliente").val().trim();
        var data = 'Nombre='+nombre+'&Apellido='+apellido+'&Email='+email+'&Direccion='+direccion+'&FechaNac='+fechanac+'&type=cliente';
        $.ajax({
         type: "POST",
         url: "views/modulos/insert/insert_cliente.php",
         data: data,
         success:function(r){
            if(r==1){  
              $("#anotation").html('');
              $('.close').click();
              $("#codcliente").val("");
              $("#nombrecliente").val("");
              $("#apellcliente").val("");
              $("#emailcliente").val("");
              $("#direcliente").val("");
              $("#fechacliente").val("");
              
              swal.fire("¡Registro exitoso!", "El cliente: " +nombre + " " + apellido + " se ha registrado con exito", "success");
             mostrarClientes();
            }else{
                swal.fire("¡Error al agregar cliente!", "Error interno del sistema, por favor intentelo más tarde", "error");
            } 
           console.log(r)
         }
})
}

function insertarUsuarioCheker(){
    var nombreu = $("#nombreuser").val().trim();
    var usern = $("#username").val().trim();
    var pwdu = $("#userpass").val().trim();
    var rol = $("#Rol").val().trim();
    var opera = $("#Operacion").val().trim();
    var userejec = $("#UsuarioEjec").val().trim();
    var ruta = $("#Ruta").val().trim();
    var dataUser = 'Usuario='+usern+'&Nombre='+nombreu+'&Password='+pwdu+'&Rol='+rol+'&Operacion='+opera+'&ruta='+ruta+'&userejec='+userejec+'&type=usuarios';
    $.ajax({
         type: "POST",
         url: "views/modulos/insert/Checker_insert.php",
         data: dataUser,
         success:function(r){
             console.log(r);
             if(r==1){
             $("#anotation").html('');
             $('.close').click();
             $("#nombreuser").val("");
             $("#username").val("");
             $("#userpass").val("");
             $("#nombreuser").removeClass("is-invalid");
             $("#username").removeClass("is-invalid");
              $("#userpass").removeClass("is-invalid");
              $("#nombreuser").removeClass("is-valid");
             $("#username").removeClass("is-valid");
              $("#userpass").removeClass("is-valid");
             swal.fire("¡Esta transacción requiere autorización!", "Por seguridad, está actividad debe ser autorizada en la pestaña de Autorización", "success");
             mostrarUsuarios();
             }else if(r==0){
                 swal.fire("¡Error al agregar usuario!", "Error interno del sistema, por favor intentelo más tarde", "error");
             }else if(r==2){
             $("#anotation").html('');
             $('.close').click();
             $("#nombreuser").val("");
             $("#username").val("");
             $("#userpass").val("");
             $("#nombreuser").removeClass("is-invalid");
             $("#username").removeClass("is-invalid");
              $("#userpass").removeClass("is-invalid");
              $("#nombreuser").removeClass("is-valid");
             $("#username").removeClass("is-valid");
              $("#userpass").removeClass("is-valid");
                 swal.fire("¡Error!", "Parece que esta transacción ya esta en espera de Autorización", "error");
             }
         }
      });
      $("#btn-user-register").removeAttr('disabled');
      return false;
}  

function ActualizarDatosUsuario(){
        var nombre = $("#ednombreuser").val().trim();
        var password = $("#eduserpass").val().trim();
        var Estatus = $("#editEstatus").val().trim();
        var ruta = $("#RutaEdit").val().trim();
        var userejec = $("#UsuarioEjecEdit").val().trim();
        var iduser = $("#IdUsuarioEdit").val().trim();
        var opera = $("#OperacionEdit").val().trim();
        var dataUser = 'Nombre='+nombre+'&Password='+password+'&Estatus='+Estatus+'&Operacion='+opera+'&Ruta='+ruta+'&Userejec='+userejec+'&IdUsuario='+iduser+'&type=usuarios';
         $.ajax({
         type: "POST",
         url: "views/modulos/update/Checker_update.php",
         data: dataUser,
         success:function(r){
             if(r==1){
               $('.close').click();
               swal.fire("¡Esta transacción requiere autorización!", "Por seguridad, está actividad debe ser autorizada en la pestaña de Autorización", "success");
               mostrarUsuarios();  
             }else if(r==0){
                 swal.fire("¡Error al editar usuario!", "Error interno del sistema, por favor intentelo más tarde", "error");
             }else if(r==2){
                swal.fire("¡Error!", "Parece que esta transacción ya esta en espera de Autorización", "error");
                $('.close').click();
             }
         }
     });
}

function InsertarCatChecker(){
    var nombreCat = $("#NombreCat").val().trim();
    var DescCat = $("#DescCat").val().trim();
    var ruta = $("#RutaCat").val().trim();
    var userejec = $("#UsuarioEjec").val().trim();
    var opera = $("#Operacion").val().trim();
    var dataCat = 'nombreCat='+nombreCat+'&DescCat='+DescCat+'&Operacion='+opera+'&ruta='+ruta+'&type=categorias';
         $.ajax({
         type: "POST",
         url: "views/modulos/insert/Checker_insert.php",
         data: dataCat,
         success:function(r){
             console.log(r);
             if(r==1){
               $('.close').click();
               swal.fire("¡Esta transacción requiere autorización!", "Por seguridad, está actividad debe ser autorizada en la pestaña de Autorización", "success");
               mostrarCategorias();  
             }else if(r==0){
                 swal.fire("¡Error al editar usuario!", "Error interno del sistema, por favor intentelo más tarde", "error");
             }else if(r==2){
                swal.fire("¡Error!", "Parece que esta transacción ya esta en espera de Autorización", "error");
                $('.close').click();
             }
         }
     });
}

function  ActualizaCatChecker(){
    var nombreCat = $("#EdNombreCat").val().trim();
    var DescCat = $("#EdDescCat").val().trim();
    var ruta = $("#RutaCatEd").val().trim();
    var opera = $("#OperacionEd").val().trim();
    var idCat = $("#IdCategoria").val().trim();
    var dataCat = 'nombreCat='+nombreCat+'&DescCat='+DescCat+'&Operacion='+opera+'&Ruta='+ruta+'&IdCategoria='+idCat+'&type=categorias';
    $.ajax({
         type: "POST",
         url: "views/modulos/update/Checker_update.php",
         data: dataCat,
         success:function(r){
             console.log(r);
             if(r==1){
               $('.close').click();
               swal.fire("¡Esta transacción requiere autorización!", "Por seguridad, está actividad debe ser autorizada en la pestaña de Autorización", "success");
               mostrarCategorias();  
             }else if(r==0){
                 swal.fire("¡Error al editar categoria!", "Error interno del sistema, por favor intentelo más tarde", "error");
             }else if(r==2){
                swal.fire("¡Error!", "Parece que esta transacción ya esta en espera de Autorización", "error");
                $('.close').click();
             }
         }
     });
}

function AgregarProductoChecker(){

var CodProd = $("#CodNomProd").val().trim();
var nombreProd = $("#NuevoNomProd").val().trim();
var DescProd = $("#NuevaDescProd").val().trim();
var CatProd = $("#nuevaCategoria").val().trim();
var Stock = $("#NuevoStockProd").val().trim();
var PrecioC = $("#NuevoPCompraProd").val().trim();
var PrecioV = $("#NuevoPVentaProd").val().trim();
var Imagen = $("#NameImage").val().trim();
var opera = $("#Operacion").val().trim();
var userejec = $("#UsuarioEjec").val().trim();
var proveedor = $("#nuevoProveedor").val().trim();
var ruta = $("#Ruta").val().trim();
var dataProd = 'Imagen='+Imagen+'&CodProd='+CodProd+'&IdProv='+proveedor+'&nombreProd='+nombreProd+'&DescProd='+DescProd+'&CatProd='+CatProd+'&Stock='+Stock+'&PrecioC='+PrecioC+'&PrecioV='+PrecioV+'&Operacion='+opera+'&ruta='+ruta+'&userejec='+userejec+'&type=productos';
$.ajax({
         type: "POST",
         url: "views/modulos/insert/Checker_insert.php",
         data: dataProd,
         success:function(r){
             console.log(r);
             if(r==1){
               $('.close').click();
               $("#CodNomProd").val("");
               $("#NuevoNomProd").val("");
               $("#NuevaDescProd").val("");
               $("#nuevaCategoria").val("");
               $("#nuevoProveedor").val("");
               $("#NuevoStockProd").val("");
               $("#NuevoPCompraProd").val("");
               $("#NuevoPVentaProd").val("");
               $("#NameImage").val("");
               
               $("#NameImage").removeClass("is-valid");
               $("#CodNomProd").removeClass("is-valid");
               $("#NuevoNomProd").removeClass("is-valid");
               $("#NuevaDescProd").removeClass("is-valid");
               $("#nuevaCategoria").removeClass("is-valid");
               $("#nuevoProveedor").removeClass("is-valid");
               $("#NuevoStockProd").removeClass("is-valid");
               $("#NuevoPCompraProd").removeClass("is-valid");
               $("#NuevoPVentaProd").removeClass("is-valid");
               swal.fire("¡Esta transacción requiere autorización!", "Por seguridad, está actividad debe ser autorizada en la pestaña de Autorización", "success");
             }else if(r==0){
                 swal.fire("¡Error al editar usuario!", "Error interno del sistema, por favor intentelo más tarde", "error");
             }else if(r==2){
                swal.fire("¡Error!", "Parece que esta transacción ya esta en espera de Autorización", "error");
                $('.close').click();
                $("#CodNomProd").val("");
               $("#NuevoNomProd").val("");
               $("#NuevaDescProd").val("");
               $("#nuevaCategoria").val("");
               $("#NuevoStockProd").val("");
               $("#NuevoPCompraProd").val("");
               $("#NuevoPVentaProd").val("");
               $("#nuevoProveedor").val("");
               
               $("#NameImage").removeClass("is-valid");
               $("#CodNomProd").removeClass("is-valid");
               $("#NuevoNomProd").removeClass("is-valid");
               $("#NuevaDescProd").removeClass("is-valid");
               $("#nuevaCategoria").removeClass("is-valid");
               $("#NuevoStockProd").removeClass("is-valid");
               $("#NuevoPCompraProd").removeClass("is-valid");
               $("#NuevoPVentaProd").removeClass("is-valid");
               $("#nuevoProveedor").removeClass("is-valid");
             }
         }
         
     });
    $("#btn-add-prod").removeClass("disabled");
     $("#btn-add-prod").val("Agregar");
}

function SubirFoto(){
        var formData = new FormData();
        var files = $('#Foto')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'views/modulos/upload/uploadFoto.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    console.log(response);
                    $("#NameImage").val(response);
                    AgregarProductoChecker();
                }
            }
        });
        
}
    
$(document).ready(function(){
    
function readURL(input) {
  if (input.files && input.files[0]) { //Revisamos que el input tenga contenido
    var reader = new FileReader(); //Leemos el contenido
    
    reader.onload = function(e) { //Al cargar el contenido lo pasamos como atributo de la imagen de arriba
      $('#FotoTemp').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

function EditreadURL(input) {
  if (input.files && input.files[0]) { //Revisamos que el input tenga contenido
    var reader = new FileReader(); //Leemos el contenido
    
    reader.onload = function(e) { //Al cargar el contenido lo pasamos como atributo de la imagen de arriba
      $('#EdFotoTemp').attr('src', e.target.result);
      $("#cambioFoto").val(1);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#EdFoto").change(function(){
    var filename = $("#EdFoto").val();
   if(filename!=""){
     var extension = filename.replace(/^.*\./, '');               
     if (extension == filename){
         extension = '';
     }else{
         extension = extension.toLowerCase();
         if((extension == 'jpg') || (extension == 'png') || (extension == 'jpeg') || (extension == 'gif')){
             EditreadURL(this);
             $("#edfichero").html(document.getElementById('EdFoto').files[0].name);
             $("#ed-remove-Photo").show();
             $("#cambioFoto").val(1);
            }else{
            swal.fire("¡Error de extensión!", "Haz seleccionado un archivo que no es una imagen, por favor intentalo de nuevo", "error"); 
            $('#EdFotoTemp').attr('src', 'views/images/productos/'+$("#EdNameImage").val());
            $("#edfichero").html('Cambiar foto del producto');
            $("#EdFoto").val("");
            $("#cambioFoto").val(0);
           }
    }
    
}else{
    $('#EdFotoTemp').attr('src', 'views/images/productos/'+$("#EdNameImage").val());
    $("#Edfichero").html('Cambiar foto del producto');
    $("#cambioFoto").val(0);
}
});

$("#ed-remove-Photo").click(function(){
    $('#EdFotoTemp').attr('src', 'views/images/productos/'+$("#EdNameImage").val());
    $("#edfichero").html('Cambiar foto del producto');
    $("#ed-remove-Photo").css('display','none');
    $("#cambioFoto").val(0);
})


$("#Foto").change(function(){
    var filename = $("#Foto").val();
   if(filename!=""){
     var extension = filename.replace(/^.*\./, '');               
     if (extension == filename){
         extension = '';
     }else{
         extension = extension.toLowerCase();
         if((extension == 'jpg') || (extension == 'png') || (extension == 'jpeg') || (extension == 'gif')){
             readURL(this);
             $("#fichero").html(document.getElementById('Foto').files[0].name);
             $("#remove-Photo").show();
            }else{
            swal.fire("¡Error de extensión!", "Haz seleccionado un archivo que no es una imagen, por favor intentalo de nuevo", "error"); 
            $('#FotoTemp').attr('src', 'views/images/plantilla/empty.png');
            $("#fichero").html('Seleccionar foto del producto');
            $("#Foto").val("");
           }
    }
    
}else{
    $('#FotoTemp').attr('src', 'views/images/plantilla/empty.png');
    $("#fichero").html('Seleccionar foto del producto');
}
});

$("#remove-Photo").click(function(){
    $('#FotoTemp').attr('src', 'views/images/plantilla/empty.png');
    $("#fichero").html('Seleccionar foto del producto');
    $("#remove-Photo").css('display','none');
})

    $("#username").keyup(function(){
        var username = $("#username").val().trim();
        if(username != "" || !validateUser(username)){
        var dataString = 'username='+username;
        $.ajax({
            type: "POST",
            url: "views/modulos/query/check_username_availablity.php",
            data: dataString,
            success: function(data) {
                if(data == '0'){
                    $("#StatusReg").val("0");
                }else{
                    $("#StatusReg").val("1");             
                }
            }

        });
    }
});
    
    
     $("#btn-user-register").click(function() {
    var mensaje = "";
    var nombre = $("#nombreuser").val().trim();
    var username = $("#username").val().trim();
    var password = $("#userpass").val().trim();
    var okuser;
    var userdispo;
    var okname;
    var okpass;
    if(nombre==""){
        mensaje += "El campo nombre esta vacío <br />";
         $("#nombreuser").addClass("is-invalid");
        okname = false;
    }else{
        if(!validateNombre(nombre)){
            $("#nombreuser").addClass("is-invalid");
            mensaje += "El campo nombre contiene caracteres no válidos <br />";
            okname = false;
        }else{
        $("#nombreuser").removeClass("is-invalid").addClass("is-valid");
        okname = true;
        }
    }
    
    if(username == ""){
        $("#username").addClass("is-invalid");
        mensaje += "El campo nombre de usuario esta vacío <br />";
        okuser = false;
    }else{
        if(!validateUser(username)){
            $("#username").addClass("is-invalid");
            mensaje += "El campo nombre de usuario contiene caracteres no válidos <br />";
            okuser = false;
        }else{
       if($("#StatusReg").val()=="0"){
        $("#username").addClass("is-invalid");
        mensaje += "¡Este nombre de usuario no esta disponible, por favor intente con otro! <br />";
        swal.fire ( "¡Upps!" ,  "¡Este nombre de usuario no esta disponible, por favor intente con otro!" ,  "error" );
        okuser = false;
        }else{
        $("#username").removeClass("is-invalid").addClass("is-valid");
        okuser = true; 
         } 
    }
   }
   
    
    if(password == ""){
        mensaje += "El campo contraseña esta vacío <br />";
        $("#userpass").addClass("is-invalid");
        okpass = false;
    }else{
        okpass = true;
    }
    
    if(password.length < 8){
        mensaje += "El campo contraseña debe tener al menos 8 caracteres <br />";
        $("#userpass").addClass("is-invalid");
        okpass = false;
        }else{
           if(!validatePass(password)){
            $("#userpass").addClass("is-invalid");
            mensaje += "El campo contraseña contiene caracteres no válidos <br />";
            okpass = false;
            }else{
            $("#userpass").removeClass("is-invalid").addClass("is-valid");
            okpass = true;
            }
    }
    
    if(okpass == false || okuser == false || okname == false){
        $("#anotation").html('<div class="alert alert-danger alert-dismissible" id="message-form" style="font-size: 12px;"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h5><i class="icon fas fa-ban"></i>Atención</h5><p>' + mensaje+ '</p></div>');
         }else{
        insertarUsuarioCheker();
        
    }
    
    
        }); 

$("#btn-user-edit").click(function(){
        var mensajeEd = "";
        var nombreEd = $("#ednombreuser").val().trim();
        var passwordEd = $("#eduserpass").val().trim();
        var EstatusEd = $("#editEstatus").val().trim();
        var okuserEd;
        var okpassEd;
        if(nombreEd==""){
        mensajeEd += "El campo nombre esta vacío <br />";
        $("#nombreuser").addClass("is-invalid");
        okuserEd = false;
    }else{
        if(!validateNombre(nombreEd)){
            $("#ednombreuser").addClass("is-invalid");
            mensajeEd += "El campo nombre contiene caracteres no válidos <br />";
            okuserEd = false;
        }else{
        $("#ednombreuser").removeClass("is-invalid");
        okuserEd = true;
        }
    }
    if(passwordEd !=""){
        okpassEd = false
        if(passwordEd.length < 8){
        mensajeEd += "El campo contraseña debe tener al menos 8 caracteres <br />";
        $("#eduserpass").addClass("is-invalid");
        okpassEd = false;
        }else{
           if(!validatePass(passwordEd)){
            $("#eduserpass").addClass("is-invalid");
            mensajeEd += "El campo contraseña contiene caracteres no válidos <br />";
            okpassEd = false;
            }else{
            $("#eduserpass").removeClass("is-invalid");
            okpassEd = true;
            }
    }
        
    }else{
        $("#eduserpass").removeClass("is-invalid");
        okpassEd = true;
    }
        
  if(okpassEd == false || okuserEd == false){
        $("#anotationEdit").html('<div class="alert alert-danger alert-dismissible" id="message-form" style="font-size: 12px;"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h5><i class="icon fas fa-ban"></i>Atención</h5><p>' + mensajeEd+ '</p></div>');
         }else{
        $("#anotationEdit").html('');
        ActualizarDatosUsuario();
    }
    
    
}); 

   
   $("#btn-add-cat").click(function(){
       var mensajeCat = "";
        var nombreCat = $("#NombreCat").val().trim();
        var DescCat = $("#DescCat").val().trim();
        var okNCat;
        var okDCat;
        if(nombreCat == ""){
        mensajeCat += "El campo nombre de categoría esta vacío <br />";
        $("#NombreCat").addClass("is-invalid");
        okNCat = false;
    }else{
        if(!validateNombre(nombreCat)){
            $("#NombreCat").addClass("is-invalid");
            mensajeCat += "El campo nombre de categoría contiene caracteres no válidos <br />";
            okNCat = false;
        }else{
        $("#NombreCat").removeClass("is-invalid");
        okNCat = true;
        }
    }
    
    if(DescCat!=""){
        if(!validateDesc(DescCat)){
            $("#DescCat").addClass("is-invalid");
            mensajeCat += "El campo nombre de categoría contiene caracteres no válidos <br />";
            okDCat = false;
        }
    }else{
        $("#DescCat").removeClass("is-invalid");
        okDCat = true;
    }
    
    if(okNCat == false || okDCat == false){
        $("#anotationCat").html('<div class="alert alert-danger alert-dismissible" id="message-form" style="font-size: 12px;"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h5><i class="icon fas fa-ban"></i>Atención</h5><p>' + mensajeCat+ '</p></div>');
         }else{
        $("#anotationCat").html('');
       InsertarCatChecker();
    }
        
   });
   
   $("#btn-edit-cat").click(function(){
       var EdmensajeCat = "";
        var EdnombreCat = $("#EdNombreCat").val().trim();
        var EdDescCat = $("#EdDescCat").val().trim();
        var EdokCat;
        var EdDokCat;
        if(EdnombreCat==""){
        EdmensajeCat += "El campo nombre de categoría esta vacío <br />";
        $("#EdNombreCat").addClass("is-invalid");
        EdokCat = false;
    }else{
        if(!validateNombre(EdnombreCat)){
            $("#EdNombreCat").addClass("is-invalid");
            EdmensajeCat += "El campo nombre de categoría contiene caracteres no válidos <br />";
            EdokCat = false;
        }else{
        $("#EdNombreCat").removeClass("is-invalid");
        EdokCat = true;
        }
    }
    
    if(EdDescCat!=""){
        if(!validateDesc(EdDescCat)){
            $("#EdDescCat").addClass("is-invalid");
            EdmensajeCat += "El campo nombre de categoría contiene caracteres no válidos <br />";
            EdDokCat = false;
        }
    }else{
        $("#EdDescCat").removeClass("is-invalid");
        EdDokCat = true;
    }
    
    if(EdokCat == false || EdDokCat == false){
        $("#anotationEdCat").html('<div class="alert alert-danger alert-dismissible" id="message-form" style="font-size: 12px;"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h5><i class="icon fas fa-ban"></i>Atención</h5><p>' + EdmensajeCat+ '</p></div>');
         }else{
        $("#anotationEdCat").html('');
       ActualizaCatChecker();
    }
        
   });
 $("#NuevoPCompraProd").change(function(){
    var PCompra = $("#NuevoPCompraProd").val();
    var decimales = Number.parseFloat(PCompra).toFixed(2);
    $("#NuevoPCompraProd").val(decimales)
})

$("#NuevoPVentaProd").change(function(){
    var PVenta = $("#NuevoPVentaProd").val();
    var decimales = Number.parseFloat(PVenta).toFixed(2);
    $("#NuevoPVentaProd").val(decimales)
})

  function validateNombProd(nombreP) {
        var CadProd = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;
        return CadProd.test(nombreP);
}
function validateCodProd(CodP) {
        var CadCod = /^([a-zA-Z0-9])+$/;
        return CadCod.test(CodP);
}

function validateStockProd(Stock) {
        var CadStock = /^([0-9])+$/;
        return CadStock.test(Stock);
}

    function validateDesc(descripcion) {
        var DescReg = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ _.,+-]+$/;
        return DescReg.test(descripcion);
}
    
    $("#CodNomProd").keyup(function(){
        var CodNomProd = $("#CodNomProd").val().trim();
        if(CodNomProd != "" || !validateNombProd(CodNomProd)){
        var dataString = 'CodigoProd='+CodNomProd;
        $.ajax({
            type: "POST",
            url: "views/modulos/query/check_codproducto_availablity.php",
            data: dataString,
            success: function(data) {
                if(data == '0'){
                    $("#StatusProd").val("0");
                }else{
                    $("#StatusProd").val("1");             
                }
            }

        });
    }
}); 

$("#btn-add-prod").click(function(){
var mensaje = "";
var CodProd = $("#CodNomProd").val().trim();
var nombreProd = $("#NuevoNomProd").val().trim();
var DescProd = $("#NuevaDescProd").val().trim();
var CatProd = $("#nuevaCategoria").val().trim();
var Stock = $("#NuevoStockProd").val().trim();
var PrecioC = $("#NuevoPCompraProd").val().trim();
var PrecioV = $("#NuevoPVentaProd").val().trim();
var Proveedor = $("#nuevoProveedor").val().trim();
var diferencia = parseFloat(PrecioV-PrecioC);


var OkNomProd;
var OkCodProd;
var okDescProd;
var OkCateg;
var OkStock;
var OkPrecioC;
var OkPrecioV;
var OkPrecioT;
var OkProveed;

    if(CodProd=="" || CodProd.length<1){
            mensaje += "El campo código debe contener al menos 1 carácter<br />";
             $("#CodNomProd").addClass("is-invalid");
            OkCodProd = false;
        }else{
            if(!validateCodProd(CodProd)){
                $("#CodNomProd").addClass("is-invalid");
                mensaje += "El campo código contiene caracteres no válidos <br />";
                OkCodProd = false;
            }else{
                if($("#StatusProd").val()=="0"){
                    $("#CodNomProd").addClass("is-invalid");
                    mensaje += "¡Este código de producto ya está siendo utilizado, por favor intente con otro! <br />";
                    swal.fire ( "¡Upps!" ,  "¡Este código de producto ya está siendo utilizado, por favor intente con otro!" ,  "error" );
                    OkCodProd = false;
                    }else{
                    $("#CodNomProd").removeClass("is-invalid").addClass("is-valid");
                    OkCodProd = true; 
                     }
            }
        }

 if(nombreProd==""){
            mensaje += "El campo nombre de producto esta vacío <br />";
             $("#NuevoNomProd").addClass("is-invalid");
            OkNomProd = false;
        }else{
            if(!validateNombProd(nombreProd)){
                $("#NuevoNomProd").addClass("is-invalid");
                mensaje += "El campo nombre contiene caracteres no válidos <br />";
                OkNomProd = false;
            }else{
                $("#NuevoNomProd").removeClass("is-invalid").addClass("is-valid");
                    OkNomProd = true; 
            }
        }

if(DescProd!=""){
        if(!validateDesc(DescProd)){
            $("#NuevaDescProd").addClass("is-invalid");
            mensaje += "El campo descripción contiene caracteres no válidos <br />";
            okDescProd = false;
        }else{
            $("#NuevaDescProd").removeClass("is-invalid").addClass("is-valid");
            okDescProd = true;
        }
    }else{
        $("#NuevaDescProd").removeClass("is-invalid");
        okDescProd = true;
    }

if(Proveedor==0){
            $("#nuevoProveedor").addClass("is-invalid");
            mensaje += "Por favor seleccione un proveedor para el producto <br />";
            OkProveed = false;
    }else{
        $("#nuevoProveedor").removeClass("is-invalid").addClass("is-valid");
        OkProveed = true;
    }
    
    
if(CatProd==0){
            $("#nuevaCategoria").addClass("is-invalid");
            mensaje += "Por favor seleccione una categoría para el producto <br />";
            OkCateg = false;
    }else{
        $("#nuevaCategoria").removeClass("is-invalid").addClass("is-valid");
        OkCateg = true;
    }

 if(Stock=="" || Stock<1){
            mensaje += "El campo Stock debe contener al menos 1 disponible <br />";
             $("#NuevoStockProd").addClass("is-invalid");
             $("#NuevoStockProd").val("1");
            OkStock = false;
        }else{
            if(!validateStockProd(Stock)){
                $("#NuevoStockProd").addClass("is-invalid");
                mensaje += "El campo nombre contiene caracteres no válidos <br />";
                OkStock = false;
                $("#NuevoStockProd").val("1");
            }else{
                $("#NuevoStockProd").removeClass("is-invalid").addClass("is-valid");
                    OkStock = true; 
            }
        }
        
if(PrecioC=="" || PrecioC<0.01){
            mensaje += "El campo Precio de compra debe ser mayor a 0.01 <br />";
             $("#NuevoPCompraProd").addClass("is-invalid");
            OkPrecioC = false;
        }else{
                $("#NuevoPCompraProd").removeClass("is-invalid").addClass("is-valid");
                    OkPrecioC = true; 
            }
if(PrecioV=="" || PrecioV<0.02){
            mensaje += "El campo Precio de Venta debe ser mayor a 0.01 <br />";
            $("#NuevoPVentaProd").addClass("is-invalid");
            OkPrecioV = false;
        }else{
                    $("#NuevoPVentaProd").removeClass("is-invalid").addClass("is-valid");
                    OkPrecioV = true; 
            }
            
if(diferencia<=0.00){
            mensaje += "El campo Precio de Venta debe ser mayor al Precio de Compra<br />";
             $("#NuevoPVentaProd").addClass("is-invalid");
              $("#NuevoPCompraProd").addClass("is-invalid");
            OkPrecioT = false;
        }else{
                $("#NuevoPVentaProd").removeClass("is-invalid").addClass("is-valid");
                $("#NuevoPCompraProd").removeClass("is-invalid").addClass("is-valid");
                OkPrecioT = true; 
            }


        
    if(OkCodProd == false || OkProveed == false || OkNomProd == false || okDescProd == false || OkStock == false || OkPrecioC == false || OkPrecioV == false || OkPrecioT == false){
        $("#anotationProd").html('<div class="alert alert-danger alert-dismissible" id="message-form" style="font-size: 12px;"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h5><i class="icon fas fa-ban"></i>Atención</h5><p>' + mensaje + '</p></div>');       
    }else{
        $("#anotationProd").html
        $("#btn-add-prod").val("Agregando producto...");
         $("#btn-add-prod").addClass("disabled");
         
         if($('#Foto').val()!=""){
            SubirFoto();
         }else{
            $("#NameImage").val("empty.png");
            AgregarProductoChecker();
         }
    }

 })     
   
  });
  $(document).ready(function(){
  $('.clientes').select2({
      placeholder: 'Selecciona un cliente',
        ajax: {
          url: 'views/modulos/query/CargaCliente.php',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
  });
  });