  <script type="text/javascript">
    $(document).ready(function(){
         mostrarChecker();
    })    
   
  </script>   
  <script type="text/javascript">
      $(document).ready(function(){
      $("#reload-checker").click(function(){
          $("#reload-checker").addClass("disabled");
          $("#act-check").html("Actualizando...");
       setTimeout(function(){
          $("#reload-checker").removeClass("disabled");
          $("#act-check").html("Actualizar");
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
            <h1>Autorización de actividades
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Autorización</a></li>
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
         <button class="btn btn-app" data-toggle="modal" data-target="#modalAllChecker">
              <i class="fas fa-eye"></i> Ver más transacciones
            </button>
            
            <button class="btn btn-app" id="reload-checker"  onclick="mostrarChecker();">
                <i class="fas fa-redo"></i><span id="act-check"> Actualizar</span>
            </button>
            
            <button class="btn btn-app">
              <i class="fa fa-file-excel"></i> Generar Excel
            </button>
        </div>
        <div class="card-body">
                      <style>
                .dataTables_filter{
                    float: right;
                }
            </style>
            
            <div id="tablaDatosChecker">
                
            </div>   
        </div>

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade" id="modalAllChecker" tabindex="-1" role="dialog" aria-labelledby="AgregarUsuario" aria-hidden="true">
      <div class="modal-dialog" role="document" style="min-width: 1200px">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ModalLabel"><b>Todas las transacciones del Checker</b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div id="tablaAllChecker" style="padding:12px;"></div>  
      </div>
  </div>
  </div>