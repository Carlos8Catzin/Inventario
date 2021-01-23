function SelectMetodoPago(){
    var seleccion = $("#nuevoMetodoPago").val();
    if(seleccion == 2 || seleccion == 3){
       $("#ReqTarjeta").val(1);
       $("#metodoPagoEfectivo").html('');
       //$("#metodoPagoTarjeta").html('<div class="input-group mb-3" ><div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lock"></i></span></div><input type="text" class="form-control" id="nuevoCodigoTrans" name="nuevoCodigoTrans" placeholder="Código de Transacción"></div><div class="input-group mb-3" ><div class="input-group-prepend"><span class="input-group-text"> <i class="far fa-credit-card"></i></span></div><input type="number" min="0" maxlength="16" class="form-control" id="nuevatarjeta" name="nuevatarjeta" placeholder="Número de tarjeta"></div><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-check"></i></span></div><input type="text" class="form-control" id="nuevoTitutaltarjeta" name="nuevoTitutaltarjeta" placeholder="Titular de la tarjeta">  </div><div class="input-group mb-3" style="width:45%;"><div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar-week"></i></span></div><input type="text" class="form-control" id="Fechatarjeta" name="Fechatarjeta" placeholder="MM/YY"></div> <div class="input-group mb-3" style="width:45%; margin-left: 10%;"><div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-credit-card"></i></span></div><input type="number" maxlength="3" class="form-control" id="nuevoCVVtarjeta" name="nuevoCVVtarjeta" placeholder="CVV"></div>'); 
       $("#metodoPagoTarjeta").html('<div class="input-group mb-3" ><div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lock"></i></span></div><input type="text" class="form-control" id="nuevoCodigoTrans" name="nuevoCodigoTrans" placeholder="Código de Transacción"></div>'); 

    }else if (seleccion == 1){
       $("#metodoPagoEfectivo").html('<div class="input-group mb-3" ><div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span></div><input type="text" class="form-control nuevoImportePaga" id="nuevoImportePaga" name="nuevoImportePaga" placeholder="Importe que paga"></div><div class="input-group mb-3" ><div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-coins"></i></span></div><input type="text" class="form-control" id="nuevoCambioPago" name="nuevoCambioPago" placeholder="Su cambio" readonly></div>'); 
       $("#ReqTarjeta").val(0);
       $("#nuevoImportePaga").number(true, 2);
       $("#nuevoCambioPago").number(true, 2);
       $("#metodoPagoTarjeta").html('');
    }else{
       $("#metodoPagoTarjeta").html('');
       $("#metodoPagoEfectivo").html('');
       $("#ReqTarjeta").val(0);
    }
}
function ValidarCompra(){
    var cliente = $("#nuevoCliente").val();
    var metodo_pago = $("#nuevoMetodoPago").val();
    var total_venta = $("#nuevoTotalVenta").val().trim();
    var impuesto = $("#nuevoPorcentaje").val().trim(); 
if($("#DetalleProd").children().length==0){
       $("#nuevoTotalVenta").val(0);
       $("#nuevoPorcentaje").val(0);
       $("#nuevoPrecioImpuesto").val(0);
       $("#nuevoPrecioNeto").val(0);
       $("#nuevoTotalVenta").attr("total",0);
       Swal.fire(
                        'Error',
                        '¡Aún no agrega productos a la venta!',
                        'error'
                      );
              
    $("#GuardarCompra").attr("disabled","disabled");
              return;
   }else{
        if(cliente == 0 || cliente == "" || cliente == null){
            Swal.fire(
                        'Error',
                        '¡Por favor, selecione un cliente de la lista!',
                        'error'
                      );
              return;
        }else{
            if(metodo_pago==1){
                var importe_pago = $("#nuevoImportePaga").val().trim();
                console.log(importe_pago);
                if(importe_pago == "" || importe_pago =="0"  || Number(importe_pago)<Number(total_venta)){
                  Swal.fire(
                            'Error',
                            '¡Por favor revise el importe de pago importe para proceder con la compra!',
                            'error'
                          );
                  console.log(Number(importe_pago-total_venta));
                  $("#nuevoImportePaga").focus();
                  return;  
                }else{
                    var editar = $("#EditVenta").val();
                    if(editar==1){
                       ProcesaPagoEditadoEfectivo(); 
                    }else{
                        ProcesarPagoEfectivo();
                    }
                }
            }else if(metodo_pago==2 || metodo_pago==3){
                if($("#nuevoCodigoTrans").val().trim()=="" || $("#nuevoCodigoTrans").val().trim()==0){
                    Swal.fire(
                                 'Error',
                                 '¡Por favor ingrese el código de transaccion generado!',
                                 'error'
                               );
                       $("#nuevoCodigoTrans").focus();
                       $("#GuardarCompra").removeAttr("disabled");
                       return;   
                    }else{
                        var editar = $("#EditVenta").val();
                        if(editar==1){
                              ProcesaPagoEditadoTarjeta();
                        }else{
                              ProcesarPagoTarjeta();
                          }
                    }
            }
        }
    }
    
}

function ProcesarPagoEfectivo(){
    var codfactura = $("#nuevaFact").val();
    var idcliente = $("#nuevoCliente").val();
    var formapago = $("#nuevoMetodoPago").val();//Efectivo
    var precioneto = $("#nuevoPrecioNeto").val();
    var impuestos = $("#nuevoPrecioImpuesto").val();
    var IVA = $("#nuevoPorcentaje").val();
    var preciototal = $("#nuevoTotalVenta").val();
    var Productos = $("#ListaProductos").val();
    
    var dataVenta = 'CodFactura='+codfactura+'&IdCliente='+idcliente+'&IdFormaPago='+formapago+'&Productos='+Productos+'&Impuesto='+impuestos+'&IVA='+IVA+'&PagoNeto='+precioneto+'&PagoTotal='+preciototal;
    
    $.ajax({
         type: "POST",
         url: "views/modulos/insert/save_venta.php",
         data: dataVenta,
         success:function(r){
             console.log(r);
             if(r==1){
               swal.fire("¡Venta realizada con exito!", "La venta se ha realizado con exito", "success");
               setTimeout("location.href='admin-venta'", 1000);
             }else{
                 swal.fire("¡Error al realizar la venta!", "Error interno del sistema, por favor intentelo más tarde", "error");
             }
         }
         
     });
    
}

function ProcesarPagoTarjeta(){
    var codfactura = $("#nuevaFact").val();
    var idcliente = $("#nuevoCliente").val();
    var formapago = $("#nuevoMetodoPago").val();//Pago con Tarjeta
    var precioneto = $("#nuevoPrecioNeto").val();
    var impuestos = $("#nuevoPrecioImpuesto").val();
    var IVA = $("#nuevoPorcentaje").val();
    var preciototal = $("#nuevoTotalVenta").val();
    var Productos = $("#ListaProductos").val();
    var codigotrans = $("#nuevoCodigoTrans").val();
    
    var dataVenta = 'CodFactura='+codfactura+'&IdCliente='+idcliente+'&IdFormaPago='+formapago+'&Productos='+Productos+'&Impuesto='+impuestos+'&IVA='+IVA+'&PagoNeto='+precioneto+'&PagoTotal='+preciototal+'&CodTransaccion='+codigotrans;
    
    $.ajax({
         type: "POST",
         url: "views/modulos/insert/save_venta.php",
         data: dataVenta,
         success:function(r){
             console.log(r);
             if(r==1){
               swal.fire("¡Venta realizada con exito!", "La venta se ha realizado con exito", "success");
               setTimeout("location.href='admin-venta'", 3000);
             }else{
                 swal.fire("¡Error al realizar la venta!", "Error interno del sistema, por favor intentelo más tarde", "error");
             }
         }
         
     });
    
}

function ProcesaPagoEditadoTarjeta(){
    var idventa = $("#IdVenta").val();
    var idcliente = $("#IdCliente").val();
    var codfactura = $("#nuevaFact").val();
    var Nomcliente = $("#nuevoCliente").val();
    var Vendedor = $("#nuevoVendedor").val();
    var formapago = $("#nuevoMetodoPago").val();//Efectivo
    var precioneto = $("#nuevoPrecioNeto").val();
    var impuestos = $("#nuevoPrecioImpuesto").val();
    var IVA = $("#nuevoPorcentaje").val();
    var preciototal = $("#nuevoTotalVenta").val();
    var Productos = $("#ListaProductos").val();
    var codigotrans = $("#nuevoCodigoTrans").val();
    
    var dataVenta = 'IdVenta='+idventa+'&Vendedor='+Vendedor+'&CodTransaccion='+codigotrans+'&CodFactura='+codfactura+'&NombreCliente='+Nomcliente+'&IdCliente='+idcliente+'&IdFormaPago='+formapago+'&Productos='+Productos+'&Impuesto='+impuestos+'&IVA='+IVA+'&PagoNeto='+precioneto+'&PagoTotal='+preciototal+'&type=edit-venta&Operacion=Editar Venta&Ruta=Ventas';
    
    $.ajax({
         type: "POST",
         url: "views/modulos/update/checker_update.php",
         data: dataVenta,
         success:function(r){
             console.log(r);
             if(r==1){
               swal.fire("¡Esta transacción requiere autorización!", "Por seguridad, está actividad debe ser autorizada en la pestaña de Autorización", "success");
               setTimeout("location.href='admin-venta'", 1000);
             }else if(r==0){
                 swal.fire("¡Error al editar usuario!", "Error interno del sistema, por favor intentelo más tarde", "error");
             }else if(r==2){
                swal.fire("¡Error!", "Parece que esta transacción ya esta en espera de Autorización", "error");
         }
         
         }
     });
}

function ProcesaPagoEditadoEfectivo(){
    var idventa = $("#IdVenta").val();
    var idcliente = $("#IdCliente").val();
    var codfactura = $("#nuevaFact").val();
    var Nomcliente = $("#nuevoCliente").val();
    var Vendedor = $("#nuevoVendedor").val();
    var formapago = $("#nuevoMetodoPago").val();//Efectivo
    var precioneto = $("#nuevoPrecioNeto").val();
    var impuestos = $("#nuevoPrecioImpuesto").val();
    var IVA = $("#nuevoPorcentaje").val();
    var preciototal = $("#nuevoTotalVenta").val();
    var Productos = $("#ListaProductos").val();
    
    var dataVenta = 'IdVenta='+idventa+'&Vendedor='+Vendedor+'&CodFactura='+codfactura+'&NombreCliente='+Nomcliente+'&IdCliente='+idcliente+'&IdFormaPago='+formapago+'&Productos='+Productos+'&Impuesto='+impuestos+'&IVA='+IVA+'&PagoNeto='+precioneto+'&PagoTotal='+preciototal+'&type=edit-venta&Operacion=Editar Venta&Ruta=Ventas';
    
    $.ajax({
         type: "POST",
         url: "views/modulos/update/checker_update.php",
         data: dataVenta,
         success:function(r){
             console.log(r);
             if(r==1){
               swal.fire("¡Esta transacción requiere autorización!", "Por seguridad, está actividad debe ser autorizada en la pestaña de Autorización", "success");
               setTimeout("location.href='admin-venta'", 1000);
             }else if(r==0){
                 swal.fire("¡Error al editar usuario!", "Error interno del sistema, por favor intentelo más tarde", "error");
             }else if(r==2){
                swal.fire("¡Error!", "Parece que esta transacción ya esta en espera de Autorización", "error");
         }
         
         }
     });
}
$(document).ready(function(){
    $(".TablaVentas tbody").on("click", "button.agregarProducto", function(){
        var idProducto = $(this).attr("idproducto");
        $(this).removeClass("btn-primary agregarProducto");
        $(this).addClass("btn-default");
        console.log(idProducto);
        $.ajax({
            type: "POST",
            url: "views/modulos/query/ObtenerProducto.php",
            data: "IdProducto="+ idProducto,
            success:function(respuesta){
            respuesta=jQuery.parseJSON(respuesta);
                var descripcion = respuesta['NombreProducto'];
                var stock = respuesta['Stock'];
                var preciov = Number.parseFloat(respuesta['PrecioVenta']);
                
                
                
                if(stock == 0){
                    Swal.fire(
                    'No hay productos disponibles',
                    '¡En este momento no esta disponible este producto!',
                    'error'
                  );
                  $("button[idproducto='"+idProducto+"']").addClass('btn-primary agregarProducto');  
                  return;
                }
                
            $("#DetalleProd").append('<div class="row" style="padding: 5px 15px;"><div class="col-sm-4" style="padding-right: 0px;">'+
                 '                     <div class="input-group mb-3">'+
                  '                      <div class="input-group-prepend">'+
                   '                     <span class="input-group-text">'+
                    '                        <button class="btn btn-danger btn-xs quitarProducto" idproducto="'+idProducto+'"><i class="fas fa-times"></i></button>'+
                     '                   </span>'+
                      '                  </div>'+
                       '                   <input type="text" class="form-control nuevaDescripcionProducto" id="nuevoProducto" name="nuevoProd" idproducto="'+idProducto+'" value="'+descripcion+'" placeholder="Descripción del producto" readonly> '+  
                        '            </div>   '+
                                  '</div>'+
                                  '<div class="col-sm-3" style="padding-right: 0px;">'+
                                   '   <div class="input-group mb-3">'+
                                    '    <div class="input-group-prepend">'+
                                     '   <span class="input-group-text">'+
                                      '      <i class="fas fa-sort-numeric-up-alt"></i>'+
                                       ' </span>'+
                                        '</div>'+
                                         ' <input type="number" min="1" class="form-control nuevaCantidadProducto" id="nuevoStock" name="nuevoStock" stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" value="1" placeholder="Cantidad">'+   
                                    '</div>'+
                                  '</div>'+
                                  '<div class="col-sm-5 ingresoPrecio" style="padding-right: 0px;">'+
                                   '   <div class="input-group mb-3">'+
                                    '    <div class="input-group-prepend">'+
                                     '   <span class="input-group-text">'+
                                      '      <i class="fas fa-dollar-sign"></i>'+
                                       ' </span>'+
                                        '</div>'+
                                         ' <input type="text" min="1" class="form-control nuevoPrecioProducto decimal" id="nuevoPrecio" precio="'+preciov+'" precioreal="'+preciov+'" name="nuevoPrecio" value="'+preciov+'" placeholder="Precio" readonly="">'+
                                    '</div>'+
                                  '</div></div>');
                          SumarTotalPrecio();
                          
                          agregarImpuesto();
                          listarProductos()
                          $('.decimal').number(true, 2);
                          $("#nuevoImportePaga").val(0);
                          $("#GuardarCompra").attr("disabled","disabled");
            }
        })
    });
    
$(".TablaVentas").on("draw.dt", function(){
   if(localStorage.getItem("quitarProducto") == null){
       var listaIdProducto = JSON.parse(localStorage.getItem("quitarProducto"));
       
       for(var i=0; i < listaIdProducto; i++){
          $("button.recuperarBoton[idproducto='"+idProducto+"']").removeClass('btn-default');
          $("button.recuperarBoton[idproducto='"+idProducto+"']").addClass('btn-primary agregarProducto');
       }
   }
})
var idQuitarProducto = [];
localStorage.removeItem("quitarProducto");

$(".formularioVenta").on("click", "button.quitarProducto", function(){
   $(this).parent().parent().parent().parent().parent().remove(); 
   var idProducto = $(this).attr("idproducto");
  
   if(localStorage.getItem("quitarProducto") == null){
       idQuitarProducto = [];
   }else{
       idQuitarProducto.concat(localStorage.getItem("quitarProducto"));
   }
   idQuitarProducto.push({"idproducto":idProducto});
   localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));
   
   $("button.recuperarBoton[idproducto='"+idProducto+"']").removeClass('btn-default');
   $("button.recuperarBoton[idproducto='"+idProducto+"']").addClass('btn-primary agregarProducto');
   if($("#DetalleProd").children().length==0){
       $("#nuevoTotalVenta").val(0);
       $("#nuevoPorcentaje").val(0);
       $("#nuevoPrecioImpuesto").val(0);
       $("#nuevoPrecioNeto").val(0);
       $("#nuevoTotalVenta").attr("total",0);
   }else{
    SumarTotalPrecio();
    agregarImpuesto();
    listarProductos()
   } 
});

$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function(){
    var precio = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
    
    var preciofinal = $(this).val()*precio.attr("precioreal");
    precio.val(preciofinal);
    
    var nuevoStock = Number($(this).attr("stock") - $(this).val());
    $(this).attr("nuevoStock", nuevoStock);
    
    if(Number($(this).val())>Number($(this).attr("stock"))){
      Swal.fire(
                    'Esta cantidad supera el Stock',
                    '¡Solo hay '+$(this).attr("stock")+' productos disponibles!',
                    'error'
                  );  
          $(this).val(1);
          precio.val(Number(precio.attr("precioreal")));
    }
    SumarTotalPrecio();
    agregarImpuesto();
    listarProductos()
    $("#nuevoImportePaga").val(0);
    $("#nuevoCambioPago").val(0);
    $("#GuardarCompra").attr("disabled");
})

function SumarTotalPrecio(){
    var precioItem = $(".nuevoPrecioProducto");
    var arraySumarPrecio = [];
    for (var i=0; i<precioItem.length; i++){
        arraySumarPrecio.push(Number($(precioItem[i]).val()));
    }
    function sumarArrayPrecios(total, numero){
        return total + numero;
    }
    
    var sumaTotalPrecio = arraySumarPrecio.reduce(sumarArrayPrecios);
    $("#nuevoTotalVenta").val(sumaTotalPrecio);
    $("#nuevoTotalVenta").attr("total",sumaTotalPrecio);
}

function agregarImpuesto(){
    var impuesto = $("#nuevoPorcentaje").val();
    var precioTotal = $("#nuevoTotalVenta").attr("total");
    
    var precioImpuesto = Number(precioTotal * impuesto/100);
    var totalconImpuesto = Number(precioImpuesto) + Number(precioTotal);
    $("#nuevoTotalVenta").val(totalconImpuesto);
    $("#nuevoPrecioImpuesto").val(precioImpuesto);
    $("#nuevoPrecioNeto").val(precioTotal);
    $("#nuevoImportePaga").val(0);
    $("#nuevoCambioPago").val(0);
    $("#GuardarCompra").attr("disabled","disabled");
    
}
$("#nuevoPorcentaje").change(function(){
    agregarImpuesto();
    listarProductos();
});
$("#nuevoMetodoPago").change(function(){
    var metodo = $(this).val();
     $("#GuardarCompra").removeAttr("disabled");
});

$(".formularioVenta").on("change", "input.nuevoImportePaga", function(){
   var efectivo = $(this).val();
   
   var cambio = Number(efectivo) - Number($("#nuevoTotalVenta").val());
   
   if(cambio<0){
       Swal.fire(
                    'Pago incompleto',
                    '¡No hay suficiente dinero para cubrir el pago!',
                    'error'
                  );  
          $(this).val($("#nuevoTotalVenta").val());
          $("#nuevoCambioPago").val(0);
          $("#GuardarCompra").removeAttr("disabled");
          return;
   }else{
       if($(this).val()=="" || $(this).val()=="0.00"){
          Swal.fire(
                    'Monto incorrecto',
                    '¡Por favor ingrese un monto válido!',
                    'error'
                  );  
       }else{
      $("#nuevoCambioPago").val(cambio);
      $("#GuardarCompra").removeAttr("disabled");
        }
   }
});

function listarProductos(){
    var listarProd = [];
    var descripcion = $(".nuevaDescripcionProducto");
    var cantidad = $(".nuevaCantidadProducto");
    var precio = $(".nuevoPrecioProducto");
    
    for(var i= 0; i < descripcion.length; i++){
        listarProd.push({
            "id": $(descripcion[i]).attr("idproducto"),
            "descripcion": $(descripcion[i]).val(),
            "cantidad": $(cantidad[i]).val(),
            "stock": $(cantidad[i]).attr("nuevoStock"),
            "precio": $(precio[i]).attr("precioreal"),
            "total": $(precio[i]).val()
        });
        
    }
    $("#ListaProductos").val(JSON.stringify(listarProd));

}



    $('.TablaVentas').DataTable({
      "language":{
        "decimal":        "",
        "emptyTable":     "Datos no disponibles en la tabla",
        "info":           "Mostrando _START_ a _END_ de _TOTAL_ entradas",
        "infoEmpty":      "Mostrando 0 a 0 en 0 entradas",
        "infoFiltered":   "(Filtrando de _MAX_ total entradas)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Mostrar _MENU_",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search":         "Búsqueda:",
        "zeroRecords":    "No se ha encontrado ningún resultado",
        "paginate": {
            "first":      "Primero",
            "last":       "Último",
            "next":       "Siguiente",
            "previous":   "Anterior"
            },
          },
      
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "fixedHeader": true,
    });

})