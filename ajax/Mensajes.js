  $(document).ready(function(){

     $(".TablaMensajeUsuarios tbody").on("click", "button.nuevoMensaje", function(){
         var IdUsuario = $(this).attr("idusuario");
         var Nombre = $(this).attr("nombre");
        var Foto = $(this).attr("foto");
        var Usuario = $(this).attr("usuario");
        $("#tablaMensajes").html('<div class="card border-primary mb-12" style="margin 0 auto;">'+
                                        '<div class="card-header"><span class="card-title font-weight-bold"><img src="views/images/usuarios/'+Foto+'" width="45" heigth="45" style="border-radius:10px;"/> '+Usuario+' -'+
                                        '<span class="font-weight-light">'+Nombre+'</span></span></div>'+
                                        '<div class="card-body text-primary" style="max-height: 405px; overflow-y: auto;">'+
                                                '<div class="mesgs">'+
                                                     '<div class="msg_history" id="msg_history">'+
                                                     '</div>'+
                           '<div class="type_msg" id="type_msg">'+
                             '<div class="input_msg_write">'+
                             
                             '<input type="hidden" id="ArchivoURL" value="" />'+
                               '<input type="text" class="write_msg" id="Mensaje" placeholder="Escribe un mensaje" onkeypress="return EnterBtn(event)" />'+
                               '<button class="msg_send_btn" id="SendMensaje" onclick="ValidaMensaje();" type="button"><i class="fas fa-share-square"></i></button><br />'+
                               '<div class="file-input">'+
                                    '<input type="file" id="file" onchange="validarArchivo()" size="5120" class="file">'+
                                    '<label for="file"><i class="fas fa-paperclip"></i></label>'+
                                    '<span id="file_name" class="file_name">Adjuntar un archivo(Max. 5MB)</span>'+
                                '</div>'+
                             '</div>'+
                           '</div>'+
                         '</div>'+
                '</div>'+
        '</div>');
$("#bandera").val(1);
$("#IdUsuarios").val(IdUsuario);
$("#msg_history").html('<div class="text-center"><div class="spinner-border text-primary" style="text-align: center !important;" role="status"></div><p align="center" class="font-weight-bold">Cargando...</p></div>');
ObtenerBuzon(IdUsuario);
           
        
});
               
     
     
  });

function ValidaMensaje(){

       var Mensaje = $("#Mensaje").val().trim();
       var okmensaje;
       if(Mensaje==""){
           okmensaje = false;
       }else{
           okmensaje = true;
       }
       console.log(Mensaje);
       console.log(okmensaje);

       if(okmensaje == false){
           $("#SendMensaje").effect("shake");
       }else{
           EnviarMensaje();
       }
};

function EnviarMensaje(){
    var BuzonEmisor =  $("#BuzonEmisor").val();
    var BuzonReceptor =  $("#BuzonReceptor").val();
    var IdUsuario = $("#IdUsuario").val();
    var ArchivoURL = $("#ArchivoURL").val();
    var Mensaje = $("#Mensaje").val().trim();
    var dataMensaje = 'BuzonEmisor='+BuzonEmisor+'&BuzonReceptor='+BuzonReceptor+'&ArchivoURL='+ArchivoURL+'&IdUsuario='+IdUsuario+'&Mensaje='+Mensaje+'&type=mensaje';    
        $.ajax({
         type: "POST",
         url: "views/modulos/insert/insert_mensaje.php",
         data: dataMensaje,
         success:function(r){
             console.log(r);
             if(r==1){
                 $("#Mensaje").val("");
                 $("#ArchivoURL").val("");
                 $("#file_name").html('Adjuntar un archivo');
                 $("#file").val("");
                 ObtenerBuzon(IdUsuario);
             }else{
                 swal.fire("¡Error al enviar mensaje!", "Error interno del sistema, por favor intentelo más tarde", "error");
             }
         }
     });
    
    
}

function EnterBtn(e)
{
	if(e.keyCode == 13){ // 13 es el código de tecla del enter
	ValidaMensaje();
	return true; 
    }// Devuelvo true en caso de no ser el enter
}

function cargarArchivo(){
    
}

function ObtenerDatosArchivo() {
  var filename = $("#file").val();
  
  if(filename!=""){
     var extension = filename.replace(/^.*\./, '');               
     if (extension == filename){
         extension = '';
     }else{
         extension = extension.toLowerCase();
         if((extension == 'jpg') || (extension == 'png') || (extension == 'jpeg') || (extension == 'gif')
                 || (extension == 'xls') || (extension == 'pdf') || (extension == 'txt') || (extension == 'doc') 
                 || (extension == 'docx') || (extension == 'csv')){
                 if((extension == 'jpg') || (extension == 'png') || (extension == 'jpeg') || (extension == 'gif')){
                    $("#file_name").html('<i class="fas fa-images"></i> '+document.getElementById('file').files[0].name);
                }else if((extension == 'xls') || (extension == 'csv')){
                    $("#file_name").html('<i class="fas fa-file-excel"></i> '+document.getElementById('file').files[0].name);
                }else if((extension == 'docx') || (extension == 'doc')){
                    $("#file_name").html('<i class="fas fa-file-word"></i> '+document.getElementById('file').files[0].name);
                }else if((extension == 'pdf')){
                    $("#file_name").html('<i class="fas fa-file-pdf"></i> '+document.getElementById('file').files[0].name);
                }else{
                    $("#file_name").html('<i class="fas fa-file-alt"></i> '+document.getElementById('file').files[0].name);
                }
             $("#SendMensaje").attr('disabled');
             SubirArchivo();
            }else{
            swal.fire("¡Error de extensión!", "Haz seleccionado un archivo no admitido, por favor intentalo de nuevo", "error"); 
            $("#file_name").html('Adjuntar un archivo');
            $("#file").val("");
            $("#ArchivoURL").val("");
            $("#SendMensaje").removeAttr('disabled')
           }
    }
    
}else{
    $("#ArchivoURL").val("");
    $("#file_name").html('Adjuntar un archivo');
    $("#file").val("");
    $("#SendMensaje").removeAttr('disabled')
}
}

function SubirArchivo(){
        var formData = new FormData();
        var files = $('#file')[0].files[0];
        formData.append('file',files);
        $("#SendMensaje").attr('disabled');
        $("#file_name").html('<div class="spinner-border text-primary" role="status"><span class="sr-only">Subiendo...</span></div>');
        $.ajax({
            url: 'views/modulos/upload/uploadArchivo.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    console.log(response);
                    $("#file_name").html(response);
                    $("#ArchivoURL").val(response);
                    $("#SendMensaje").removeAttr('disabled')
                }else{
                    swal.fire("¡Error en el servidor!", "¡Lo sentimos ocurrio un error en el servido, intentelo más tarde!", "error"); 
                }
            }
        });
        
}

function validarArchivo() {
    var fileSize = $('#file')[0].files[0].size;
    var siezekiloByte = parseInt(fileSize / 1024);
    if (siezekiloByte >  $('#file').attr('size')) {
        swal.fire("¡Error de tamaño!", "Este archivo pesa más de 5MB", "error"); 
        return false;
    }else{
       ObtenerDatosArchivo(); 
    }
}