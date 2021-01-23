<script src="Ajax/Proveedores.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content-header">
     
    </section>
    <section class="content">

      <!-- Default box -->
      <div class="card" style="width: 60%; margin: 0 auto;">
          <div class="card-header">
              <center><h3>Agregar nuevo proveedor</h3></center>
        </div>
        <div class="card-body">
                    <div class="form-group">
                        <div id="anotationProv"></div>

                        <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fa fa-list-alt"></i>
                              </span>
                          </div>
                            <input class="form-control" type="text" name="NombreProveedor" id="NombreProveedor" placeholder="Nombre del proveedor" />
                        </div>
                        
                        <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fas fa-key"></i>
                              </span>
                          </div>
                            <input class="form-control" type="text" name="RazonSocial" id="RazonSocial" placeholder="Razón social"/>     
                        </div>

                        <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fas fa-map-marker-alt"></i>
                              </span>
                          </div>
                            <textarea class="form-control" type="text" name="Domicilio" style="resize: none; height: 60px;" id="Domicilio" placeholder="Domicilio"></textarea>     
                        </div>
                        
                        <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fas fa-map-marked"></i>
                              </span>
                          </div>
                            <input class="form-control" type="text" name="Poblacion" id="Poblacion" placeholder="Población"/>     
                        </div>
                        
                        <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fas fa-search"></i>
                              </span>
                          </div>
                            <input class="form-control" type="number" name="CodigoPostal" id="CodigoPostal" maxlength="6" minlength="5" placeholder="Código postal"/>     
                        </div>
                        
                        <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fas fa-globe-americas"></i>
                              </span>
                          </div>
                            <input class="form-control" type="text" name="Pais" id="Pais" placeholder="País"/>     
                        </div>
                        
                        <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fas fa-phone"></i>
                              </span>
                          </div>
                            <input class="form-control" type="tel" minlength="10" maxlength="10" name="Telefono" id="Telefono" placeholder="Teléfono" pattern="[0-9]+" />     
                        </div>
                        
                        <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fas fa-at"></i>
                              </span>
                          </div>
                            <input class="form-control" type="text" name="Email" id="Email" placeholder="Correo eletrónico"/>     
                        </div>
                        
                        <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fab fa-chrome"></i>
                              </span>
                          </div>
                            <input class="form-control" type="text" name="URL" id="URL" placeholder="URL: http://" />     
                        </div>
                        
                        <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fas fa-shield-alt"></i>
                              </span>
                          </div>
                            <input class="form-control" type="text" name="StatusProveedor" id="StatusProveedor" placeholder="Proveedor activo" readonly="" />     
                        </div>
                        <a href="proveedores"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button></a>
                    <button type="button" id="btn-save-proveed" class="btn btn-primary">Guardar Proveedor</button>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <i class="fas fa-lock"></i> Solo los administradores tienen acceso a esta página, no haga mal uso de ella
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>