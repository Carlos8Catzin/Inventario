<script src="Ajax/Reportes.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content-header">
     
    </section>
    <section class="content">

      <!-- Default box -->
      <div class="card" style="width: 60%; margin: 0 auto;">
          <div class="card-header">
              <center><h3>Agregar nuevo reporte</h3></center>
        </div>
        <div class="card-body">
                    <div class="form-group">
                        <div id="anotationRep"></div>

                        <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fa fa-list-alt"></i>
                              </span>
                          </div>
                            <input class="form-control" type="text" name="NombreReporte" onkeyup="NombreArchivo();" id="TituloReporte" placeholder="Titulo del reporte" />
                            <input type="hidden" id="ArchivoReporte" value="" />
                        </div>
                        
                        <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fas fa-search"></i>
                              </span>
                          </div>
                            <input class="form-control" type="text" name="TipoReporte" id="TipoReporte" placeholder="Control" readonly="" />     
                        </div>

                        <div class="input-group mb-3">
                              <div class="input-group-prepend" style="width: 41px;">
                              <span class="input-group-text">
                                  <i class="fas fa-keyboard"></i>
                              </span>
                          </div>
                            <textarea class="form-control" type="text" name="DescReporte" style="resize: none; height: 120px;" id="DescReporte" placeholder="Comandos SQL"></textarea>     
                        </div>
                        
                        <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fas fa-shield-alt"></i>
                              </span>
                          </div>
                            <input class="form-control" type="text" name="StatusReporte" id="StatusReporte" placeholder="Activo" readonly="" />     
                        </div>
                        <a href="reportes"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button></a>
                    <button type="button" id="btn-save-report" class="btn btn-primary">Guardar reporte</button>
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