  <script type="text/javascript">
    $(document).ready(function(){
         mostrarProductos();
    })    
   
  </script>  
  <script type="text/javascript">
      $(document).ready(function(){
      $("#reload-producto").click(function(){
          $("#reload-producto").addClass("disabled");
          $("#act-prod").html("Actualizando...");
       setTimeout(function(){
          $("#reload-producto").removeClass("disabled");
          $("#act-prod").html("Actualizar");
       },1000);     
   })
    }) 
  </script>   

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inventario de productos
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Productos</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <div class="dt-buttons">
          <button class="btn btn-app" data-toggle="modal" data-target="#modalAgregarProducto">
                <i class="fas fa-plus"></i><span id="act-check"> Agregar producto</span>
            </button>
            <button class="btn btn-app" id="reload-producto"  onclick="mostrarProductos();">
                <i class="fas fa-redo"></i><span id="act-prod"> Actualizar</span>
            </button>
            </div>
        </div>
        <div class="card-body">
         <style>
                .dataTables_filter{
                    float: right;
                }
            </style>
            
            <div id="tablaDatosProductos">
                
            </div>
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
  
  <!-- REGISTRO DE PRODUCTO -->
  <div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="AgregarProducto" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content" style="width:560px;">
          <div class="modal-header">
            <h4 class="modal-title" id="ModalLabel"><b>Agregar Producto</b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div id="anotationProd"></div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fa fa-list"></i>
                  </span>
              </div>
                <select class="custom-select" name="nuevaCat" id="nuevaCategoria">
                      <option value="0" selected>Selecciona una categoría</option>
                    <?php $categorias = mysqli_query($connexion, "SELECT * FROM categorias"); 
                          while($list = mysqli_fetch_array($categorias)){
                              echo '<option value="'.$list['IdCategoria'].'">'.$list['NombreCategoria'].'</option>';
                          }
                    ?>
                 </select>
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                     <i class="fas fa-barcode"></i>
                  </span>
              </div>
                <input class="form-control" type="number" id="CodNomProd" placeholder="Ingresa código del Producto(Obligatorio)" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-tag"></i>
                  </span>
              </div>
                <input class="form-control" type="text" id="NuevoNomProd" placeholder="Ingresa Nombre del Producto(Obligatorio)" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fas fa-keyboard"></i>
                  </span>
              </div>
                <textarea class="form-control" style="resize: none; height: 70px;" id="NuevaDescProd" placeholder="Ingresa Descripción (Opcional)"></textarea>     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-building"></i>
                  </span>
              </div>
                <select class="custom-select" name="nuevoProv" id="nuevoProveedor">
                      <option value="0" selected>Selecciona un proveedor</option>
                    <?php $proveedores = mysqli_query($connexion, "SELECT * FROM proveedores"); 
                          while($listprove = mysqli_fetch_array($proveedores)){
                              echo '<option value="'.$listprove['IdProvedor'].'">'.$listprove['NombreProveedor'].'</option>';
                          }
                    ?>
                 </select>  
            </div>
            
            <div class="form-group row">
                <div class="col-sm-6">
                    <div class="input-group mb-3">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-sort-numeric-up-alt"></i>
                          </span>
                      </div>
                        <input class="form-control" step="1" type="number" min="1" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;" id="NuevoStockProd" placeholder="Stock" />  
                        <div class="input-group-append">
                        <span class="input-group-text font-weight-normal">
                              Disponibles
                          </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-lightbulb"></i>
                          </span>
                      </div>
                        <input type="hidden" name="nuevoStatus" value="1">
                        <select class="custom-select" id="nuevoEstatus" disabled>                   
                            <option value="1" selected>Activo</option>
                         </select>
                    </div>
                </div>
            </div>
            
            
            <div class="form-group row">
                <div class="col-sm-6">
                    <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-coins"></i>
                          </span>
                        </div>
                        <input class="form-control" step="1" type="number" min="0.01" onpaste="return false;" id="NuevoPCompraProd" placeholder="Precio de compra" />  
                        <div class="input-group-append">
                        <span class="input-group-text font-weight-normal">
                              MXN
                          </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="far fa-money-bill-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" step="1" type="number" min="0.01" onpaste="return false;" id="NuevoPVentaProd" placeholder="Precio de venta" />  
                        <div class="input-group-append">
                        <span class="input-group-text font-weight-normal">
                              MXN
                          </span>
                        </div>
                    </div>
                </div>
                
          </div>
            
            <div class="form-group row">
            <div class="col-sm-9">
            <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="fas fa-image"></i>
                      </span>
                      <div class="custom-file">
                        <input type="file" name="nuevaFoto" accept=".png, .jpg, .jpeg, .gif" class="custom-file-input" id="Foto">
                        <label class="custom-file-label" id="fichero" for="Foto">Seleccionar foto del producto</label>
                      </div>
              </div>
            </div>
            </div>
                <div class="col-sm-3">
                    <button type="button" class="close" id="remove-Photo" style="display:none;">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    <div class="input-group">
                        <img src="views/images/plantilla/empty.png" id="FotoTemp" width="75" height="75">
                    </div>
                </div>
            </div>
            
          </div>
        </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btn-add-prod" class="btn btn-primary">Agregar</button>
        <input type="hidden" id="StatusProd">
        <input type="hidden" id="Operacion" value="Agregar Producto">
        <input type="hidden" id="Ruta" value="<?php echo $_GET['ruta']; ?>">
        <input type="hidden" id="UsuarioEjec" value="<?php echo $_SESSION['IdUsuario']; ?>">
        <input type="hidden" id="NameImage">
      </div>
      </div>
  </div>
  </div>
  
  <!-- EDITAR PRODUCTO -->
  
  <div class="modal fade" id="modalEditarProducto" tabindex="-1" role="dialog" aria-labelledby="EditarProducto" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content" style="width:560px;">
          <div class="modal-header">
            <h4 class="modal-title" id="ModalLabel"><b>Editar Producto</b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div id="EdanotationProd"></div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fa fa-list"></i>
                  </span>
              </div>
                  <select class="custom-select" name="EdCat" id="EdCategoria">
                    <?php $categorias = mysqli_query($connexion, "SELECT * FROM categorias"); 
                          while($list = mysqli_fetch_array($categorias)){
                              echo '<option value="'.$list['IdCategoria'].'">'.$list['NombreCategoria'].'</option>';
                          }
                    ?>
                 </select>
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                     <i class="fas fa-barcode"></i>
                  </span>
              </div>
                <input class="form-control" type="number" id="EdCodNomProd" placeholder="Ingresa código del Producto(Obligatorio)" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-tag"></i>
                  </span>
              </div>
                <input class="form-control" type="text" id="EdNomProd" placeholder="Ingresa Nombre del Producto(Obligatorio)" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fas fa-keyboard"></i>
                  </span>
              </div>
                <textarea class="form-control" style="resize: none; height: 70px;" id="EdDescProd" placeholder="Ingresa Descripción (Opcional)"></textarea>     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-building"></i>
                  </span>
              </div>
                <select class="custom-select" name="EdProv" id="EdProveedor">
                      <option value="0" selected>Selecciona un proveedor</option>
                    <?php $proveedores = mysqli_query($connexion, "SELECT * FROM proveedores"); 
                          while($listprove = mysqli_fetch_array($proveedores)){
                              echo '<option value="'.$listprove['IdProvedor'].'">'.$listprove['NombreProveedor'].'</option>';
                          }
                    ?>
                 </select>  
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <div class="input-group mb-3">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-sort-numeric-up-alt"></i>
                          </span>
                      </div>
                        <input class="form-control" step="1" type="number" min="1" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;" id="EdStockProd" placeholder="Stock" />  
                        <div class="input-group-append">
                        <span class="input-group-text font-weight-normal">
                              Disponibles
                          </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-lightbulb"></i>
                          </span>
                      </div>
                        <select class="custom-select" id="EdEstatus">                   
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                         </select>
                    </div>
                </div>
            </div>
            
            
            <div class="form-group row">
                <div class="col-sm-6">
                    <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-coins"></i>
                          </span>
                        </div>
                        <input class="form-control" step="1" type="number" min="0.01" onpaste="return false;" id="EdPCompraProd" placeholder="Precio de compra" />  
                        <div class="input-group-append">
                        <span class="input-group-text font-weight-normal">
                              MXN
                          </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="far fa-money-bill-alt"></i>
                          </span>
                        </div>
                        <input class="form-control" step="1" type="number" min="0.01" onpaste="return false;" id="EdPVentaProd" placeholder="Precio de venta" />  
                        <div class="input-group-append">
                        <span class="input-group-text font-weight-normal">
                              MXN
                          </span>
                        </div>
                    </div>
                </div>
          </div>
            
            <div class="form-group row">
            <div class="col-sm-9">
            <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="fas fa-image"></i>
                      </span>
                      <div class="custom-file">
                        <input type="file" name="EdNFoto" accept=".png, .jpg, .jpeg, .gif" class="custom-file-input" id="EdFoto">
                        <label class="custom-file-label" id="edfichero" for="EdFoto">Cambiar foto del producto</label>
                      </div>
              </div>
            </div>
            </div>
                <div class="col-sm-3">
                    <button type="button" class="close" id="ed-remove-Photo" style="display:none;">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    <div class="input-group">
                        <img src="views/images/productos/empty.png" id="EdFotoTemp" width="75" height="75">
                        <center><a href="javascript:void(0);" id="quit-foto" style="display:none;">Quitar foto</a></center> 
                    </div>
                </div>
            </div>
            
          </div>
        </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btn-edit-prod" class="btn btn-primary">Editar producto</button>
        <input type="hidden" id="EdStatusProd">
        <input type="hidden" id="EdOperacion" value="Editar Producto">
        <input type="hidden" id="EdRuta" value="<?php echo $_GET['ruta']; ?>">
        <input type="hidden" id="EdUsuarioEjec" value="<?php echo $_SESSION['IdUsuario']; ?>">
        <input type="hidden" id="EdNameImage">
        <input type="hidden" id="IdProducto">
        <input type="hidden" id="cambioFoto" value="0">
        
      </div>
      </div>
  </div>
  </div>