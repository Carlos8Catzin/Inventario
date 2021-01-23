<script type="text/javascript">
    mostrarProductosVenta();
</script> 
<?php
if(isset($_GET['IdVenta'])&& ($_GET['IdVenta'])!=""){
    $item = "IdVenta";
    $valor = $_GET['IdVenta'];
    $ventas = ControladorVentas::ctrMostrarVentasEdit($item, $valor);
                
    if($ventas==0){
        echo '<script>location.href="admin-venta";</script>';
    }else{
        foreach($ventas as $key => $value){

        }
    }
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar venta
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ventas</a></li>
              <li class="breadcrumb-item active">Editar venta</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-6">
                <div class="card card-warning">
                    <div class="card-header"><h6><b>Facturación</b></h6></div>
                      <div class="card-body">
                         
                          <form role="form" method="post" class="formularioVenta">
                              <div class="form-group row" style="margin-bottom: 0;">
                                  <div class="col-sm-8" style="padding-right: 0px;">
                                                <div class="input-group mb-3">
                                                <label for="nuevoVendedor" style="width: 100%;">Atiendió:</label>
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                   <i class="fa fa-user"></i>
                                                </span>
                                                </div>
                                              <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVend" value="<?php echo $value['Usuario']; ?>" readonly>
                                              <input type="hidden" id="IdUsuario" name="IdUsuario" value="<?php echo $value['IdUsuario']; ?>" />
                                              <input type="hidden" id="IdVenta" name="IdVenta" value="<?php echo $value['IdVenta']; ?>" />
                                                </div>
                                  </div>
                                  <div class="col-sm-4" style="padding-right: 0px;">
                                                <div class="input-group mb-3">
                                                    <label for="nuevaFact"  style="width: 100%;">No. de Factura:</label><br />
                                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                           <i class="fas fa-file-invoice-dollar"></i>
                                        </span>
                                        </div>
                                          <input type="text" class="form-control" id="nuevaFact" name="nuevaFact" value="<?php echo $value['CodFactura']; ?>" readonly>
                                    </div> 
                                 </div>
                              </div>
                                  <div class="form-group">
                                      <div class="input-group mb-3">
                                          <label for="nuevoCliente" style="width: 100%;">Cliente:</label>
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                           <i class="fa fa-user"></i>
                                        </span>
                                        </div>
                                          <input type="text" class="form-control" name="nuevoCliente" id="nuevoCliente" value="<?php echo $value['NombreCliente']; ?>" readonly>
                                          <input type="hidden" id="IdCliente" name="IdCliente" value="<?php echo $value['IdCliente']; ?>" />
                                      </div>
                                  </div>
                              <!-- -->
                              <div class="row">
                                  <table class="table">
                                          <thead>
                                            <th>Listado de compras:</th>
                                          </thead>
                                  </table>
                              </div>
                              <div class="form-group row" id="DetalleProd">
                                  <?php
                                  $listarProductos = json_decode($value['Productos'],true);
                                  foreach($listarProductos as $llave => $valor){
                                      $item= 'IdProducto'; $idprod = $valor['id'];
                                      $respuesta = ControladorProductos::ctrMostrarProductos($item, $idprod);
                                      foreach ($respuesta as $res => $prod){
                                          
                                      }
                                      
                                    echo '<div class="row" style="padding: 5px 15px;"><div class="col-sm-4" style="padding-right: 0px;">
                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <button class="btn btn-danger btn-xs quitarProducto" idproducto="'.$valor['id'].'"><i class="fas fa-times"></i></button></span>'
                                            . '</div>'
                                            . '<input type="text" class="form-control nuevaDescripcionProducto" id="nuevoProducto" name="nuevoProd" idproducto="'.$valor['id'].'" value="'.$valor['descripcion'].'" placeholder="Descripción del producto" readonly>'
                                            . '</div>'
                                            . '</div>'
                                            . '<div class="col-sm-3" style="padding-right: 0px;">'
                                            . '<div class="input-group mb-3">'
                                            . '<div class="input-group-prepend">'
                                            . '<span class="input-group-text">'
                                            . '<i class="fas fa-sort-numeric-up-alt"></i>'
                                            . '</span>'
                                            . '</div>'
                                            . '<input type="number" min="1" class="form-control nuevaCantidadProducto" id="nuevoStock" name="nuevoStock" stock="'.($prod['Stock']+$valor['cantidad']).'" nuevoStock="'.$valor['stock'].'" value="'.$valor['cantidad'].'" placeholder="Cantidad">'
                                            . '</div>'
                                            . '</div>'
                                            . '<div class="col-sm-5 ingresoPrecio" style="padding-right: 0px;">'
                                            . '<div class="input-group mb-3">'
                                            . '<div class="input-group-prepend">'
                                            . '<span class="input-group-text">'
                                            . '<i class="fas fa-dollar-sign"></i>'
                                            . '</span>'
                                            . '</div>'
                                            . '<input type="text" min="1" class="form-control nuevoPrecioProducto decimal" id="nuevoPrecio" precio="'.$valor['precio'].'" precioreal="'.$prod['PrecioVenta'].'" name="nuevoPrecio" value="'.$valor['total'].'" placeholder="Precio" readonly="">'
                                            . '</div>'
                                            . '</div></div>';
                                  }
                                  
                                  ?>
                              </div>
                              <div class="row">
                                  <div class="col-sm-12 pull-right" style="float: right;">
                                      <table class="table">
                                          <thead>
                                            <th>Metódo de pago:</th>
                                            <th>Impuestos:</th>
                                            <th>Total a pagar:</th>
                                          </thead>
                                          <tbody>
                                            <td style="width: 42%;">
                                              <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-money-check-alt"></i>
                                                </span>
                                                </div>
                                                  <select class="custom-select" name="nuevoMetodoPag" id="nuevoMetodoPago" onchange="SelectMetodoPago();">
                                                    <option value="0" selected>Selecciona un metódo de pago</option>
                                                  <?php $categorias = mysqli_query($connexion, "SELECT * FROM formapago WHERE Estatus=1"); 
                                                        while($list = mysqli_fetch_array($categorias)){
                                                            echo '<option value="'.$list['IdFormaPago'].'" transaccion="'.$list['AbrevFormaPago'].'">'.$list['DescFormaPago'].'</option>';
                                                        }
                                                  ?>
                                                </select>  
                                                </div>
                                                <div class="row" id="metodoPagoTarjeta">
                                                    
                                                </div>
                                            </td>
                                          <td style="width: 20%;">
                                              <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-percent"></i>
                                                </span>
                                                </div>
                                                  <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" value="<?php echo $value['Impuesto']; ?>" required="">
                                                  <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" value="<?php echo $value['PagoNeto']; ?>" required="">
                                                  <input type="hidden" name="nuevaTransaccion" id="nuevaTransaccion">
                                                  <input type="number" min="0" class="form-control" id="nuevoPorcentaje" name="nuevoPorcentaje" placeholder="Impuesto" value="<?php echo $value['IVA']; ?>">   
                                                </div>
                                          </td>
                                          <td style="width: 38%;">
                                              <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </span>
                                                </div>
                                                  <input type="text" class="form-control decimal" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" value="<?php echo $value['PagoTotal']; ?>" readonly="" placeholder="Total de la venta">   
                                                </div>
                                              <div class="row" id="metodoPagoEfectivo">
                                                    
                                                </div>
                                          </td>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                              <div class="row" style="float:right;">
                                  <input type="hidden" value="0" id="ReqTarjeta">
                                  <input type="hidden" value="" id="ListaProductos">
                                  <button type="button" id="CancelCompra"  class="btn btn-danger" onclick="location.href='admin-venta'">Cancelar</button>
                                  <input type="hidden" value="1" id="EditVenta">
                                  <button type="button" id="GuardarCompra" style="margin-left: 10px;" disabled="disabled" onclick="ValidarCompra();" class="btn btn-primary">Guardar cambios</button>
                              </div>
                          </form>
                      </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card card-success">
                    <div class="card-header"><h6><b>Listado de productos</b></h6></div>
                      <div class="card-body">
                                        <style>
                              .dataTables_filter{
                                  float: right;
                              }
                          </style>

                          <div id="tablaProductosVenta">

                          </div>
                      </div>
                </div>
            </div>
            
            
        </div>
        <div class="modal fade" id="modalAgregarCliente" tabindex="-1" role="dialog" aria-labelledby="AgregarCliente" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form role="form" method="post" autocomplete="off">  
      <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel"><b>Agregar Cliente</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
        <div class="modal-body">
            <div class="form-group">
            <div id="anotation"></div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fas fa-user-shield"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="CodCliente" id="codcliente" disabled="" autocomplete="off" placeholder="Código del Cliente" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-user"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="Nombre" id="nombrecliente" onchange="ObtCodCliente();" autocomplete="off" placeholder="Ingresa Nombre del cliente" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fa fa-user"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="apellido" id="apellcliente" autocomplete="off" placeholder="Ingresa Apellido del cliente" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fas fa-at"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="correocliente" id="emailcliente" autocomplete="off" placeholder="Ingresa Correo electrónico" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="far fa-address-card"></i>
                  </span>
              </div>
                <textarea class="form-control" name="dircliente" id="direcliente" placeholder="Ingresa Dirección del cliente"></textarea>     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                  </span>
              </div>
                <input class="form-control date" data-date-format="dd/mm/yyyy" placeholder="Fecha de nacimiento" onfocus="(this.type='date')" name="fecnaccliente" id="fechacliente" />     
            </div>
            
            </div>
            
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn-save-client" onclick="SaveCliente();">Guardar Cliente</button>
      </div>
      </form>
          </div>
      
        <!-- /.card-footer-->
      </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<?php }else{
echo '<script>location.href="admin-venta";</script>';   
} ?>