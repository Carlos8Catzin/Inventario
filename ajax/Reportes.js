function GeneraExcel(IdReporte){
    $.ajax({
         type: "GET",
         url: "views/modulos/query/EjecutaExcel.php",
         data: "IdReporte="+IdReporte,
         success:function(r){
             if(r!=0){
                  Swal.fire(
                    'Descargando el archivo',
                    '¡El archivo empezara a descargarse!',
                    'success'
                  ) 
                  location.href='views/modulos/query/EjecutaExcel.php?IdReporte='+IdReporte
            }else if(r==0){
                Swal.fire(
                    'Hubo un error en el servidor',
                    '¡Por favor intentelo de nuevo más tarde!',
                    'error'
            )
         }
     }
     });
}
function delReporte(IdReporte){
     swal.fire ({
          title: "¿Estás seguro de eliminar este reporte?",
          text: "Se enviará esta transacción a la pestaña de Autorización, ¿Deseas continuar?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, eliminar'
   }).then((result) => {
       
       var dataString = 'IdReporte='+IdReporte;
       
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

function PreviewReporte(IdReporte){
    $.ajax({
         type: "POST",
         url: "views/modulos/query/PreviewReporte.php",
         data: "IdReporte="+IdReporte,
         success:function(r){
            $("#contentReporte").html(r);
         }
     });
}
function HabilitarReportes(){
    $.ajax({
         type: "POST",
         url: "views/modulos/update/update_reporte.php",
         data: "action-report=1",
         success:function(r){
            mostrarReportes();
         }
     });
}
function DeshabilitarReportes(){
    $.ajax({
         type: "POST",
         url: "views/modulos/update/update_reporte.php",
         data: "action-report=0",
         success:function(r){
             if(r==1){
            mostrarReportes();
             }
         }
     });
}
function NombreArchivo(){
    var TituloReporte = $("#TituloReporte").val().trim();
    var nuevoNombre = TituloReporte.replace(/ /g, "_");
    $("#ArchivoReporte").val(nuevoNombre);
}

function SaveReporte(){
    var TituloReporte = $("#TituloReporte").val().trim();
    var DescReporte = $("#DescReporte").val().trim();
    var ArchivoReporte = $("#ArchivoReporte").val().trim();
    
    var dataReport = 'TituloReporte='+TituloReporte+'&DescReporte='+DescReporte+'&ArchivoReporte='+ArchivoReporte+'&type=reporte';
    $.ajax({
         type: "POST",
         url: "views/modulos/insert/insert_reporte.php",
         data: dataReport,
         success:function(r){
             if(r==1){
               $("#TituloReporte").val("");
               $("#DescReporte").val("");
               $("#ArchivoReporte").val("");
               swal.fire("¡Reporte creado!", "Este reporte se ha creado con exito", "success");
               setTimeout("location.href='reportes'", 2000);
             }else if(r==0){
                 swal.fire("¡Error al crear reporte!", "Error interno del sistema, por favor intentelo más tarde", "error");
             }
         }
         
     });

}

function EditReporte(){
    var IdReporte = $("#IdReporte").val().trim();
    var TituloReporte = $("#TituloReporte").val().trim();
    var DescReporte = $("#DescReporte").val().trim();
    var ArchivoReporte = $("#ArchivoReporte").val().trim();
    var StatusReporte = $("#StatusReporte").val().trim();
    
    var dataReport = 'IdReporte='+IdReporte+'&TituloReporte='+TituloReporte+'&DescReporte='+DescReporte+'&ArchivoReporte='+ArchivoReporte+'&StatusReporte='+StatusReporte+'&type=reporte';
    $.ajax({
         type: "POST",
         url: "views/modulos/update/update_reporte.php",
         data: dataReport,
         success:function(r){
             console.log(r);
             if(r==1){
               swal.fire("¡Reporte editado!", "Este reporte se ha editado con exito", "success");
               setTimeout("location.href='reportes'", 2000);
             }else if(r==0){
                 swal.fire("¡Error al editar reporte!", "Error interno del sistema, por favor intentelo más tarde", "error");
             }
         }
         
     });

}

$(document).ready(function(){
    $("#btn-save-report").click(function(){
        var TituloReporte = $("#TituloReporte").val().trim();
        var DescReporte = $("#DescReporte").val().trim();
        //var ArchivoReporte = $("#ArchivoReporte").val().trim();
        var oktitulo;
        var okdesc;
        //var okarch;
        var mensaje="";
        
        if(TituloReporte==""){
            mensaje += "El campo Titulo del reporte esta vació <br />";
            oktitulo = false;
            $("#TituloReporte").addClass("is-invalid");
        }else{
            mensaje += "";
            oktitulo = true;
            $("#TituloReporte").removeClass("is-invalid");
        }
        
        if(DescReporte==""){
            mensaje += "El campo SQL del reporte esta vació <br />";
            $("#DescReporte").addClass("is-invalid");
            okdesc = false;
        }else{
            mensaje += "";
            $("#DescReporte").removeClass("is-invalid");
            okdesc = true;
        }
        
        if(oktitulo == false || okdesc == false){
            $("#anotationRep").html('<div class="alert alert-danger alert-dismissible" id="message-form" style="font-size: 12px;"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h5><i class="icon fas fa-ban"></i>Atención</h5><p>' + mensaje+ '</p></div>');
        }else{
            SaveReporte();
            $("#anotationRep").html('')
        }
        
        
    });
    
    $("#btn-edit-report").click(function(){
        var TituloReporte = $("#TituloReporte").val().trim();
        var DescReporte = $("#DescReporte").val().trim();
        //var ArchivoReporte = $("#ArchivoReporte").val().trim();
        var oktitulo;
        var okdesc;
        //var okarch;
        var mensaje="";
        
        if(TituloReporte==""){
            mensaje += "El campo Titulo del reporte esta vació <br />";
            oktitulo = false;
            $("#TituloReporte").addClass("is-invalid");
        }else{
            mensaje += "";
            oktitulo = true;
            $("#TituloReporte").removeClass("is-invalid");
        }
        
        if(DescReporte==""){
            mensaje += "El campo SQL del reporte esta vació <br />";
            $("#DescReporte").addClass("is-invalid");
            okdesc = false;
        }else{
            mensaje += "";
            $("#DescReporte").removeClass("is-invalid");
            okdesc = true;
        }
        
        if(oktitulo == false || okdesc == false){
            $("#anotationRep").html('<div class="alert alert-danger alert-dismissible" id="message-form" style="font-size: 12px;"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h5><i class="icon fas fa-ban"></i>Atención</h5><p>' + mensaje+ '</p></div>');
        }else{
            EditReporte();
            $("#anotationRep").html('')
        }
        
        
    });
    
})