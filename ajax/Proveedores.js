jQuery(document).ready(function(){
	// Listen for the input event.
	jQuery("#Telefono").on('input', function (evt) {
		// Allow only numbers.
		jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
	});
});

function SaveProveedor(){
        var NombreProveedor = $("#NombreProveedor").val().trim();
        var RazonSocial = $("#RazonSocial").val().trim();
        var Domicilio = $("#Domicilio").val().trim();
        var Poblacion = $("#Poblacion").val().trim();
        var CodigoPostal = $("#CodigoPostal").val().trim();
        var Telefono = $("#Telefono").val().trim();
        var Pais = $("#Pais").val().trim();
        var Email = $("#Email").val().trim();
        var URL = $("#URL").val().trim();
    
    var dataProveed = 'NombreProveedor='+NombreProveedor+'&RazonSocial='+RazonSocial+'&Domicilio='+Domicilio+'&Poblacion='+Poblacion+'&CodigoPostal='+CodigoPostal+'&Telefono='+Telefono+'&Pais='+Pais+'&Email='+Email+'&URL='+URL+'&type=proveedor';
    $.ajax({
         type: "POST",
         url: "views/modulos/insert/insert_proveedor.php",
         data: dataProveed,
         success:function(r){
             if(r==1){
               console.log(r);
               $("#NombreProveedor").val("");
               $("#RazonSocial").val("");
               $("#Domicilio").val("");
               $("#Poblacion").val("");
               $("#CodigoPostal").val("");
               $("#Telefono").val("");
               $("#Pais").val("");
               $("#Email").val("");
               $("#URL").val("");
               swal.fire("¡Proveedor creado!", "Este proveeedor se ha creado con exito", "success");
               setTimeout("location.href='proveedores'", 2000);
             }else if(r==0){
                 swal.fire("¡Error al crear Proveedor!", "Error interno del sistema, por favor intentelo más tarde", "error");
             }
         }
         
     });

}
    function validateNombre(nombre) {
        var userReg = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;
        return userReg.test(nombre);
}

    function validateDesc(descripcion) {
        var DescReg = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ _.:(),+-]+$/;
        return DescReg.test(descripcion);
}

$(document).ready(function(){
    $("#btn-save-proveed").click(function(){
        var NombreProveedor = $("#NombreProveedor").val().trim();
        var RazonSocial = $("#RazonSocial").val().trim();
        var Domicilio = $("#Domicilio").val().trim();
        var Poblacion = $("#Poblacion").val().trim();
        var CodigoPostal = $("#CodigoPostal").val().trim();
        var Telefono = $("#Telefono").val().trim();
        var Pais = $("#Pais").val().trim();
        var Email = $("#Email").val().trim();
        var URL = $("#URL").val().trim();
        var emailRegex = /^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        var urlRegex = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
        var oknomprov;
        var okrazs;
        var okdomic;
        var okpob;
        var okcp;
        var okpais;
        var oktel;
        var okemail;
        var okurl;
        var mensaje="";
        
        if(NombreProveedor=="" || !validateNombre(NombreProveedor)){
            mensaje += "El campo Nombre Proveedor esta vació o contiene cáracteres invalidos<br />";
            oknomprov = false;
            $("#NombreProveedor").addClass("is-invalid");
        }else{
            mensaje += "";
            oknomprov = true;
            $("#NombreProveedor").removeClass("is-invalid");
        }
        
        if(RazonSocial==""){
            mensaje += "El campo Razon Social esta vació<br />";
            $("#RazonSocial").addClass("is-invalid");
            okrazs = false;
        }else{
            mensaje += "";
            $("#RazonSocial").removeClass("is-invalid");
            okrazs = true;
        }
        
        if(Domicilio=="" || !validateDesc(Domicilio)){
            mensaje += "El campo Domicilio esta vació o contiene cáracteres invalidos <br />";
            okdomic = false;
            $("#Domicilio").addClass("is-invalid");
        }else{
            mensaje += "";
            okdomic = true;
            $("#Domicilio").removeClass("is-invalid");
        }
        
        if(Poblacion=="" || !validateNombre(Poblacion)){
            mensaje += "El campo Población esta vació o contiene cáracteres invalidos <br />";
            $("#Poblacion").addClass("is-invalid");
            okpob = false;
        }else{
            mensaje += "";
            $("#Poblacion").removeClass("is-invalid");
            okpob = true;
        }
        if(CodigoPostal==""){
            mensaje += "El campo Código Postal esta vació <br />";
            okcp = false;
            $("#CodigoPostal").addClass("is-invalid");
        }else if(CodigoPostal.length<5 || CodigoPostal.length>5){
            mensaje += "El campo Código Postal debe contener 5 digitos <br />";
            okcp = false;
            $("#CodigoPostal").addClass("is-invalid");
        }else{
            mensaje += "";
            okcp = true;
            $("#CodigoPostal").removeClass("is-invalid");
        }
        
        if(Pais=="" || !validateNombre(Pais)){
            mensaje += "El campo Pais esta vació o contiene cáracteres invalidos <br />";
            $("#Pais").addClass("is-invalid");
            okpais = false;
        }else{
            mensaje += "";
            $("#Pais").removeClass("is-invalid");
            okpais = true;
        }
        
        if(Telefono==""){
            mensaje += "El campo Teléfono esta vació <br />";
            $("#Telefono").addClass("is-invalid");
            oktel = false;
        }else if(Telefono.length<10 || Telefono.length>10){
            mensaje += "El campo Teléfono debe contener 10 digitos <br />";
            oktel = false;
            $("#Telefono").addClass("is-invalid");
        }else{
            mensaje += "";
            $("#Telefono").removeClass("is-invalid");
            oktel = true;
        }
        
        if(Email==""){
            mensaje += "El campo Email esta vació <br />";
            okemail = false;
            $("#Email").addClass("is-invalid");
        }else if(!emailRegex.test(Email)){
            mensaje += "El campo Email no es válido <br />";
            okemail = false;
            $("#Email").addClass("is-invalid");    
        }else{
            mensaje += "";
            okemail = true;
            $("#Email").removeClass("is-invalid");
        }
        
        if(URL!="" && !urlRegex.test(URL)){
            mensaje += "El campo ÚRL es invalido <br />";
            $("#URL").addClass("is-invalid");
            okurl = false;
        }else{
            mensaje += "";
            $("#URL").removeClass("is-invalid");
            okurl = true;
         }

        
        if(oknomprov == false || okrazs == false || okdomic == false || okpob == false || okcp == false || okpais == false || okemail == false || okurl == false){
            $("#anotationProv").html('<div class="alert alert-danger alert-dismissible" id="message-form" style="font-size: 12px;"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h5><i class="icon fas fa-ban"></i>Atención</h5><p>' + mensaje+ '</p></div>');
        }else{
            SaveProveedor();
            $("#anotationProv").html('')
        }
        
    });
})