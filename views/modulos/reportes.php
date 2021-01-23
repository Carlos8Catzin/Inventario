  <script type="text/javascript">
    $(document).ready(function(){
         mostrarReportes();
    })    
   
  </script>   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Control de reportes
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Reportes</a></li>
              <li class="breadcrumb-item active">Listado de reportes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
          <?php if($_SESSION['Rol']==1 || $_SESSION['Rol']==2){ ?>
        <div class="card-header">
          
          <a href="add-reporte" class="btn btn-app" role="button" aria-disabled="true">
                <i class="fas fa-plus"></i>Agregar nuevo reporte
            </a>
            <button class="btn btn-app" role="button" onclick="HabilitarReportes();" aria-disabled="true">
                <i class="fas fa-toggle-on"></i>Habilitar todos los reportes
            </button>
            <button class="btn btn-app" role="button" onclick="DeshabilitarReportes();" aria-disabled="true">
                <i class="fas fa-toggle-off"></i>Deshabilitar todos los reportes
            </button>
          
        </div>
          <?php } ?>
        <div class="card-body">
          <style>
                .dataTables_filter{
                    float: right;
                }
            </style>
            
            <div id="tablaDatosReportes">
                
            </div>   
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
    <div class="modal fade" id="modalPreviewReporte" tabindex="-1" role="dialog" aria-labelledby="PreviewReporte" aria-hidden="true">
      <div class="modal-dialog" role="document" style="min-width: 1400px">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel"><b>Previsualización del reporte</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="form-group" id="contentReporte">
            
            </div>
        </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
  </div>