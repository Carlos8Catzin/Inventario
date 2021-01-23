  <script type="text/javascript">
    $(document).ready(function(){
         mostrarBitacora();
    })    
   
  </script>   
 <script type="text/javascript">
      $(document).ready(function(){
      $("#reload-bitacora").click(function(){
          $("#reload-bitacora").addClass("disabled");
          $("#act-bita").html("Actualizando...");
       setTimeout(function(){
          $("#reload-bitacora").removeClass("disabled");
          $("#act-bita").html("Actualizar");
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
            <h1>Bitácora de Control
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bitácora</a></li>
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
          <button class="btn btn-app" id="reload-bitacora"  onclick="mostrarBitacora();">
                <i class="fas fa-redo"></i><span id="act-bita"> Actualizar</span>
            </button>
        </div>
        <div class="card-body">
          <style>
                .dataTables_filter{
                    float: right;
                }
            </style>
            
            <div id="tablaDatosBitacora">
                
            </div>   
        </div>

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>