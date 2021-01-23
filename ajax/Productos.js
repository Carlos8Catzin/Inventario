function validateNombProd2(nombreP) {
        var CadProd = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;
        return CadProd.test(nombreP);
}
function validateCodProd2(CodP) {
        var CadCod = /^([a-zA-Z0-9])+$/;
        return CadCod.test(CodP);
}

function validateStockProd2(Stock) {
        var CadStock = /^([0-9])+$/;
        return CadStock.test(Stock);
}

    function validateDesc2(descripcion) {
        var DescReg = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ _.:(),+-]+$/;
        return DescReg.test(descripcion);
}

function obtProducto(IdProducto){
    $.ajax({
         type: "POST",
         url: "views/modulos/query/ObtenerProducto.php",
         data: "IdProducto="+IdProducto,
         success:function(r){
             console.log(r);
             r=jQuery.parseJSON(r);
             $("#IdProducto").val(r['IdProducto']);
             $("#EdCodNomProd").val(r['CodigoProd']);
             $("#EdNomProd").val(r['NombreProducto']);
             $("#EdDescProd").val(r['DescProducto']);
             $("#EdCategoria option[value='"+ r['IdCategoria'] +"']").attr("selected",true);
             $("#EdStockProd").val(r['Stock']);
             $("#EdProveedor option[value='"+ r['IdProveedor'] +"']").attr("selected",true);
             $("#EdEstatus option[value='"+ r['StatusProd'] +"']").attr("selected",true);
             $("#EdPCompraProd").val(parseFloat(r['PrecioCompra']));
             $("#EdPVentaProd").val(parseFloat(r['PrecioVenta']));
             $("#EdNameImage").val(r['ImgProd']);
             $('#EdFotoTemp').attr('src', 'views/images/productos/'+r['ImgProd']);
             if(r['ImgProd']!="empty.png"){
                $("#quit-foto").show();
            }else{
                $("#quit-foto").hide();
            }
         }
     });
   
}

function delProducto(IdProducto){
     swal.fire ({
          title: "¿Estás seguro de eliminar este Producto?",
          text: "Se enviará esta transacción a la pestaña de Autorización, ¿Deseas continuar?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, eliminar'
   }).then((result) => {
       
       var dataString = 'IdProducto='+IdProducto;
       
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

$(document).ready(function(){
$("#nuevaCategoria").change(function(){
    var Seleccion = $("#nuevaCategoria").val().trim();
    if(Seleccion!=0){
    $.ajax({
         type: "POST",
         url: "views/modulos/query/ObtCodigoProd.php",
         data: "IdCategoria="+Seleccion,
         dataType: 'json',
         success:function(r){
             console.log(r);
            if(!r){
                 $("#CodNomProd").val(Seleccion+"0001");   
             }else{ 
                 var nuevoCodigo = Number(r['CodigoProd'])+1;
                $("#CodNomProd").val(nuevoCodigo);
             }
             
         }
     });
 }else{
     $("#CodNomProd").val("");
 }
 });
 
 $("#EdCategoria").change(function(){
    var Seleccion = $("#EdCategoria").val().trim();
    if(Seleccion!=0){
    $.ajax({
         type: "POST",
         url: "views/modulos/query/ObtCodigoProd.php",
         data: "IdCategoria="+Seleccion,
         dataType: 'json',
         success:function(r){
             console.log(r);
            if(!r){
                 $("#EdCodNomProd").val(Seleccion+"0001");   
             }else{ 
                 var nuevoCodigo = Number(r['CodigoProd'])+1;
                $("#EdCodNomProd").val(nuevoCodigo);
             }
             
         }
     });
 }else{
     $("#EdCodNomProd").val("");
 }
 });
 
 $("#quit-foto").click(function(){
    $("#EdNameImage").val("empty.png"); 
    $('#EdFotoTemp').attr('src', 'views/images/productos/empty.png');
    $("#quit-foto").hide();
    $("#cambioFoto").val(0);
    
 });
 
 function SubirFotoEdit(){
        var formData = new FormData();
        var files = $('#EdFoto')[0].files[0];
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
                    $("#EdNameImage").val(response);
                    EditarProductoChecker();
                }
            }
        });
        
}
 
 $("#btn-edit-prod").click(function(){
var mensaje = "";
var CodProd = $("#EdCodNomProd").val().trim();
var nombreProd = $("#EdNomProd").val().trim();
var DescProd = $("#EdDescProd").val().trim();
var CatProd = $("#EdCategoria").val().trim();
var Stock = $("#EdStockProd").val().trim();
var Proveedor = $("#EdProveedor").val().trim();
var PrecioC = $("#EdPCompraProd").val().trim();
var PrecioV = $("#EdPVentaProd").val().trim();
var diferencia = parseFloat(PrecioV-PrecioC);


var OkNomProd;
var OkCodProd;
var okDescProd;
var OkCateg;
var OkStock;
var OkProvee;
var OkPrecioC;
var OkPrecioV;
var OkPrecioT;

    if(CodProd=="" || CodProd.length<1){
            mensaje += "El campo código debe contener al menos 1 carácter<br />";
             $("#EdCodNomProd").addClass("is-invalid");
            OkCodProd = false;
        }else{
            if(!validateCodProd2(CodProd)){
                $("#EdCodNomProd").addClass("is-invalid");
                mensaje += "El campo código contiene caracteres no válidos <br />";
                OkCodProd = false;
            }else{
                $("#EdCodNomProd").removeClass("is-invalid").addClass("is-valid");
                OkCodProd = true; 
            }
        }

 if(nombreProd==""){
            mensaje += "El campo nombre de producto esta vacío <br />";
             $("#EdNomProd").addClass("is-invalid");
            OkNomProd = false;
        }else{
            if(!validateNombProd2(nombreProd)){
                $("#EdNomProd").addClass("is-invalid");
                mensaje += "El campo nombre contiene caracteres no válidos <br />";
                OkNomProd = false;
            }else{
                $("#EdNomProd").removeClass("is-invalid").addClass("is-valid");
                    OkNomProd = true; 
            }
        }

if(DescProd!=""){
        if(!validateDesc2(DescProd)){
            $("#EdDescProd").addClass("is-invalid");
            mensaje += "El campo descripción contiene caracteres no válidos <br />";
            okDescProd = false;
        }else{
            $("#EdDescProd").removeClass("is-invalid").addClass("is-valid");
            okDescProd = true;
        }
    }else{
        $("#EdDescProd").removeClass("is-invalid");
        okDescProd = true;
    }

if(Proveedor==0){
            $("#EdProveedor").addClass("is-invalid");
            mensaje += "Por favor seleccione un proveedor para el producto <br />";
            OkProvee = false;
    }else{
        $("#EdProveedor").removeClass("is-invalid").addClass("is-valid");
        OkProvee = true;
    }

if(CatProd==0){
            $("#EdCategoria").addClass("is-invalid");
            mensaje += "Por favor seleccione una categoría para el producto <br />";
            OkCateg = false;
    }else{
        $("#EdCategoria").removeClass("is-invalid").addClass("is-valid");
        OkCateg = true;
    }

 if(Stock=="" || Stock<1){
            mensaje += "El campo Stock debe contener al menos 1 disponible <br />";
             $("#EdStockProd").addClass("is-invalid");
             $("#EdStockProd").val("1");
            OkStock = false;
        }else{
            if(!validateStockProd2(Stock)){
                $("#EdStockProd").addClass("is-invalid");
                mensaje += "El campo nombre contiene caracteres no válidos <br />";
                OkStock = false;
                $("#EdStockProd").val("1");
            }else{
                $("#EdStockProd").removeClass("is-invalid").addClass("is-valid");
                    OkStock = true; 
            }
        }
        
if(PrecioC=="" || PrecioC<0.01){
            mensaje += "El campo Precio de Compra debe ser mayor a 0.01 <br />";
             $("#EdPCompraProd").addClass("is-invalid");
            OkPrecioC = false;
        }else{
                $("#EdPCompraProd").removeClass("is-invalid").addClass("is-valid");
                    OkPrecioC = true; 
            }
if(PrecioV=="" || PrecioV<0.02){
            mensaje += "El campo Precio de Venta debe ser mayor a 0.01 <br />";
            $("#EdPVentaProd").addClass("is-invalid");
            OkPrecioV = false;
        }else{
                    $("#EdPVentaProd").removeClass("is-invalid").addClass("is-valid");
                    OkPrecioV = true; 
            }
            
if(PrecioV=="" || PrecioC=="" || diferencia<=0.00){
            mensaje += "El campo Precio de Venta debe ser mayor al Precio de Compra<br />";
             $("#EdPVentaProd").addClass("is-invalid");
              $("#EdPCompraProd").addClass("is-invalid");
            OkPrecioT = false;
        }else{
                $("#EdPVentaProd").removeClass("is-invalid").addClass("is-valid");
                $("#EdPCompraProd").removeClass("is-invalid").addClass("is-valid");
                OkPrecioT = true; 
            }


        
    if(OkCodProd == false || OkProvee== false || OkNomProd == false || okDescProd == false || OkStock == false || OkPrecioC == false || OkPrecioV == false || OkPrecioT == false){
        $("#EdanotationProd").html('<div class="alert alert-danger alert-dismissible" id="message-form" style="font-size: 12px;"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h5><i class="icon fas fa-ban"></i>Atención</h5><p>' + mensaje + '</p></div>');       
    }else{
        $("#EdanotationProd").html('');
        $("#btn-edit-prod").val("Procesando...");
         $("#btn-edit-prod").addClass("disabled");
         if($('#cambioFoto').val()==1){    
            SubirFotoEdit();
         }else{
            EditarProductoChecker();
         }
   }
 })     
   
 
 
 });

function EditarProductoChecker(){
    var IdProd = $("#IdProducto").val();
    var CodProd = $("#EdCodNomProd").val().trim();
var nombreProd = $("#EdNomProd").val().trim();
var DescProd = $("#EdDescProd").val().trim();
var CatProd = $("#EdCategoria").val().trim();
var Stock = $("#EdStockProd").val().trim();
var PrecioC = $("#EdPCompraProd").val().trim();
var PrecioV = $("#EdPVentaProd").val().trim();
var Status = $("#EdEstatus").val().trim();
var Imagen = $("#EdNameImage").val().trim();
var Proveedor = $("#EdProveedor").val().trim();
var opera = $("#EdOperacion").val().trim();
var userejec = $("#EdUsuarioEjec").val().trim();
var ruta = $("#EdRuta").val().trim();
var dataProd = 'IdProducto='+IdProd+'&Imagen='+Imagen+'&IdProv='+Proveedor+'&CodProd='+CodProd+'&nombreProd='+nombreProd+'&DescProd='+DescProd+'&CatProd='+CatProd+'&Stock='+Stock+'&PrecioC='+PrecioC+'&PrecioV='+PrecioV+'&Operacion='+opera+'&Ruta='+ruta+'&userejec='+userejec+'&status='+Status+'&type=productos';
$.ajax({
         type: "POST",
         url: "views/modulos/update/Checker_update.php",
         data: dataProd,
         success:function(r){
             console.log(r);
             if(r==1){
               $('.close').click();
               $("#EdCodNomProd").val("");
               $("#EdNomProd").val("");
               $("#EdDescProd").val("");
               $("#EdCategoria").val("");
               $("#EdStockProd").val("");
               $("#EdPCompraProd").val("");
               $("#EdPVentaProd").val("");
               $("#EdNameImage").val("");
               $("#EdProveedor").val("");
               
               $("#EdProveedor").removeClass("is-valid");
               $("#EdNameImage").removeClass("is-valid");
               $("#EdCodNomProd").removeClass("is-valid");
               $("#EdNomProd").removeClass("is-valid");
               $("#EdDescProd").removeClass("is-valid");
               $("#EdCategoria").removeClass("is-valid");
               $("#EdStockProd").removeClass("is-valid");
               $("#EdPCompraProd").removeClass("is-valid");
               $("#EdPVentaProd").removeClass("is-valid");
               swal.fire("¡Esta transacción requiere autorización!", "Por seguridad, está actividad debe ser autorizada en la pestaña de Autorización", "success");
             }else if(r==0){
                 swal.fire("¡Error al editar usuario!", "Error interno del sistema, por favor intentelo más tarde", "error");
             }else if(r==2){
                swal.fire("¡Error!", "Parece que esta transacción ya esta en espera de Autorización", "error");
                $('.close').click();
                
               $("#EdProveedor").val("");
               $("#EdCodNomProd").val("");
               $("#EdNomProd").val("");
               $("#EdDescProd").val("");
               $("#EdCategoria").val("");
               $("#EdStockProd").val("");
               $("#EdPCompraProd").val("");
               $("#EdPVentaProd").val("")
               
               $("#EdNameImage").removeClass("is-valid");
               $("#EdProveedor").removeClass("is-valid");
               $("#EdCodNomProd").removeClass("is-valid");
               $("#EdNomProd").removeClass("is-valid");
               $("#EdDescProd").removeClass("is-valid");
               $("#EdCategoria").removeClass("is-valid");
               $("#EdStockProd").removeClass("is-valid");
               $("#EdPCompraProd").removeClass("is-valid");
               $("#EdPVentaProd").removeClass("is-valid");
             }
         }
         
     });
    $("#btn-edit-prod").removeClass("disabled");
     $("#btn-edit-prod").val("Editar");
}