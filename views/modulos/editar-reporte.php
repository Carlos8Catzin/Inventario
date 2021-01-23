<script src="Ajax/Reportes.js"></script>
<?php
if(isset($_GET['IdReporte'])&& ($_GET['IdReporte'])!=""){
    $item = "IdReporte";
    $valor = $_GET['IdReporte'];
    $reportes = ControladorReportes::ctrMostrarReporteEdit($item, $valor);
                
    if($reportes==0){
        echo '<script>location.href="reportes";</script>';
    }else{
        foreach($reportes as $key => $value){

        }
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content-header">
     
    </section>
    <section class="content">

      <!-- Default box -->
      <div class="card" style="width: 60%; margin: 0 auto;">
          <div class="card-header">
              <center><h3>Editar reporte</h3></center>
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
                            <input class="form-control" type="text" name="NombreReporte" onkeyup="NombreArchivo();" id="TituloReporte" value="<?php echo $value['TituloReporte']; ?>" placeholder="Titulo del reporte" />
                            <input type="hidden" id="ArchivoReporte" value="<?php echo $value['ArchivoReporte']; ?>" />
                            <input type="hidden" id="IdReporte" value="<?php echo $value['IdReporte']; ?>" />
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
                            <textarea class="form-control" name="DescReporte" style="resize: none; height: 120px;" id="DescReporte"  placeholder="Comandos SQL"><?php echo trim($value['DescReporte']); ?></textarea>     
                        </div>
                        
                        <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fas fa-shield-alt"></i>
                              </span>
                          </div>
                            <select class="custom-select" id="StatusReporte" name="StatusReporte">                   
                                <option value="1" <?php if($value['StatusReporte']==1) echo 'selected="selected"';?>>Activo</option>
                                <option value="0" <?php if($value['StatusReporte']==0) echo 'selected="selected"'; ?>>Inactivo</option>
                             </select>
                        </div>
                        
                        <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="far fa-calendar-alt"></i>
                              </span>
                          </div>
                            <input class="form-control" type="datetime" name="FechaCreacion" id="FechaCreacion" value="<?php echo date("d/m/Y g:i a", strtotime($value['FechaCreacion'])); ?>" readonly="" />     
                        </div>
                        
                        <a href="reportes"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button></a>
                    <button type="button" id="btn-edit-report" class="btn btn-primary">Editar reporte</button>
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
<?php }else{
echo '<script>location.href="reportes";</script>';   
} ?>