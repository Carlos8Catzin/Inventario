<script type="text/javascript">
    mostrarProductosVenta();
</script> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar nueva venta
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ventas</a></li>
              <li class="breadcrumb-item active">Nueva venta</li>
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
                                                <label for="nuevoVendedor" style="width: 100%;">Atiende:</label>
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                   <i class="fa fa-user"></i>
                                                </span>
                                                </div>
                                              <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVend" value="<?php echo $_SESSION['Nombre']; ?>" readonly>
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
                                          <?php 
                                          try {
                                            $codfacturacion = mysqli_query($connexion, "SELECT * FROM ventas ORDER BY CodFactura DESC"); 
                                            $resultado = mysqli_fetch_array($codfacturacion);
                                            if(mysqli_num_rows($codfacturacion)==0){
                                               echo '<input type="text" class="form-control" id="nuevaFact" name="nuevaFact" value="1" readonly>'; 
                                            }else{
                                               $codigo = $resultado['CodFactura']+1;
                                               echo '<input type="text" class="form-control" value="'.$codigo.'" id="nuevaFact" name="nuevaFact" value="Número de factura" readonly>'; 
                                            }
                                          } catch (Exception $ex) {
                                             echo "Error: ".$ex; 
                                          }
                                            
                                            
                                          ?>
                                    </div> 
                                 </div>
                              </div>
                                  <div class="form-group">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                           <i class="fa fa-user"></i>
                                        </span>
                                        </div>
                                          <select class="custom-select clientes" name="nuevoCliente" id="nuevoCliente" style="width: 67%">
                                          </select>
                                          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalAgregarCliente" type="button" style="float: right;width: 25%">
                                            <i class="fa fa-plus"></i> Agregar nuevo cliente
                                          </button>
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
                                                  <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required="">
                                                  <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required="">
                                                  <input type="hidden" name="nuevaTransaccion" id="nuevaTransaccion">
                                                  <input type="number" min="0" class="form-control" id="nuevoPorcentaje" name="nuevoPorcentaje" placeholder="Impuesto" value="0">   
                                                </div>
                                          </td>
                                          <td style="width: 38%;">
                                              <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </span>
                                                </div>
                                                  <input type="text" class="form-control decimal" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" readonly="" placeholder="Total de la venta">   
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
                                  <input type="hidden" value="0" id="ListaProductos">
                                  <input type="hidden" value="0" id="EditVenta">
                                  <button type="button" id="CancelCompra"  class="btn btn-danger" onclick="location.href='inicio'">Cancelar</button>
                                  <button type="button" id="GuardarCompra" style="margin-left: 10px;" disabled="disabled" onclick="ValidarCompra();" class="btn btn-primary">Guardar compra</button>
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