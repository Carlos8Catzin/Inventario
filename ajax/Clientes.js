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
function obtCliente(IdCliente){
    var direccion;
    $.ajax({
         type: "POST",
         url: "views/modulos/query/ObtenerCliente.php",
         data: "IdCliente="+IdCliente,
         success:function(r){
             r=jQuery.parseJSON(r);
             direccion = r['DireccionCliente'].toString().replace("<br />", " ");
             $("#IdCliente").val(r['IdCliente']);
             $("#Edcodcliente").val(r['IdCliente']);
             $("#Ednombrecliente").val(r['NombreCliente']);
             $("#Edapellcliente").val(r['ApellidoCliente']);
             $("#Edemailcliente").val(r['Email']);
             $("#Eddirecliente").val(direccion);
             $("#Edfechacliente").val(r['FechaNacimiento']);
         }
     });
}

function delCliente(IdCliente){
    swal.fire ({
          title: "¿Estás seguro de eliminar a este Cliente?",
          text: "Se enviará esta transacción a la pestaña de Autorización, ¿Deseas continuar?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, eliminar'
   }).then((result) => {
       
       var dataString = 'IdCliente='+IdCliente;
       
                if (result.value) {
                    $.ajax({
         type: "POST",
         url: "views/modulos/delete/checker_delete.php",
         data: dataString,
         success:function(r){
             console.log(r);
             if(r==1){
                  Swal.fire(
                    'Esta transacción requiere Autorización',
                    '¡Se ha enviado esta transacción a la pestaña de Autorización!',
                    'success'
                  ) 
            }else if(r==0){
                Swal.fire(
                    'Hubo un error en el servidor',
                    '¡Por favor intentelo de nuevo más tarde!',
                    'error'
                  )
        }else if(r==2){
                swal.fire("¡Error!", "Parece que esta transacción ya esta en espera de Autorización", "error");
            }
            }
           });
       }
          });
}


function EditCliente(){
    var mensaje = "";
    var nombre = $("#Ednombrecliente").val().trim();
    var apellido = $("#Edapellcliente").val().trim();
    var email = $("#Edemailcliente").val().trim();
    var direccion = $("#Eddirecliente").val().trim();
    var fechanac = $("#Edfechacliente").val().trim();
    var oknombre;
    var okapellido;
    var okemail;
    var okdireccion;
    var okfechnac;
    var emailRegex = /^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
    if(nombre == ""){
        mensaje += "El campo nombre del cliente esta vacío <br />";
        $("#Ednombrecliente").addClass("is-invalid");
        oknombre = false;
    }else{
        if(!validateNombre(nombre)){
            $("#Ednombrecliente").addClass("is-invalid");
            mensaje += "El campo nombre de cliente contiene caracteres no válidos <br />";
            oknombre = false;
        }else{
        $("#Ednombrecliente").removeClass("is-invalid");
        oknombre = true;
        }
    }
    if(apellido == ""){
        mensaje += "El campo apellido del cliente esta vacío <br />";
        $("#Edapellcliente").addClass("is-invalid");
        okapellido = false;
    }else{
        if(!validateNombre(apellido)){
            $("#Edapellcliente").addClass("is-invalid");
            mensaje += "El campo nombre de cliente contiene caracteres no válidos <br />";
            okapellido = false;
        }else{
        $("#Edapellcliente").removeClass("is-invalid");
        okapellido = true;
        }
    }
    
    if(email == ""){
        mensaje += "El campo Email del cliente esta vacío <br />";
        $("#Edemailcliente").addClass("is-invalid");
        okemail = false;
    }else{
        if (emailRegex.test(email)){
            $("#Edemailcliente").removeClass("is-invalid");
            okemail = true;
        }else{
            $("#Edemailcliente").addClass("is-invalid");
            mensaje += "El campo Email de cliente es incorrecto <br />";
            okemail = false;
        }
    }
    
    if(direccion == ""){
        mensaje += "El campo dirección del cliente esta vacío <br />";
        $("#Eddirecliente").addClass("is-invalid");
        okdireccion = false;
    }else{
        $("#Eddirecliente").removeClass("is-invalid");
        okdireccion = true;
    }
    if(fechanac == ""){
        mensaje += "El campo fecha de nacimiento del cliente esta vacío <br />";
        $("#Edfechacliente").addClass("is-invalid");
        okfechnac = false;
    }else{
        $("#Edfechacliente").removeClass("is-invalid");
        okfechnac = true;
    }
    
 if(oknombre == false || okapellido == false || okemail == false || okdireccion == false || okfechnac == false){
        $("#Edanotation").html('<div class="alert alert-danger alert-dismissible" id="message-form" style="font-size: 12px;"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h5><i class="icon fas fa-ban"></i>Atención</h5><p>' + mensaje + '</p></div>');       
    }else{
        EditarCliente();
    }
    
}

function EditarCliente(){
        var IdCliente = $("#IdCliente").val().trim();
        var nombre = $("#Ednombrecliente").val().trim();
        var apellido = $("#Edapellcliente").val().trim();
        var email = $("#Edemailcliente").val().trim();
        var direccion = $("#Eddirecliente").val().trim();
        var fechanac = $("#Edfechacliente").val().trim();
        var data = 'Nombre='+nombre+'&Apellido='+apellido+'&Email='+email+'&Direccion='+direccion+'&FechaNac='+fechanac+'&IdCliente='+IdCliente+'&type=cliente';
        $.ajax({
         type: "POST",
         url: "views/modulos/update/update_cliente.php",
         data: data,
         success:function(r){
            if(r==1){  
              $("#Edanotation").html('');
              $('.close').click();
              $("#Ednombrecliente").val("");
              $("#Edapellcliente").val("");
              $("#Edemailcliente").val("");
              $("#Eddirecliente").val("");
              $("#Edfechacliente").val("");
              swal.fire("¡Se ha editado el cliente!", "El cliente: " +nombre + " " + apellido + " se ha editado con exito", "success");
             mostrarClientes();
            }else{
                swal.fire("¡Error al editar cliente!", "Error interno del sistema, por favor intentelo más tarde", "error");
            } 
           console.log(r)
         }
})
}