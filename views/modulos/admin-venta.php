<script type="text/javascript">
    $(document).ready(function(){
         mostrarAdminVentas();
    })    
   
  </script>   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar ventas
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ventas</a></li>
              <li class="breadcrumb-item active">Administrar ventas</li>
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
            <a href="nueva-venta" class="btn btn-app" role="button" aria-disabled="true">
                <i class="fas fa-plus"></i>Agregar nueva venta
            </a>
            <button class="btn btn-app">
              <i class="fa fa-file-excel"></i> Generar Excel
            </button>
            <button class="btn btn-app">
              <i class="fa fa-file-pdf"></i> Generar PDF
            </button>
        </div>
        <div class="card-body">
          <div id="tablaDatosVentas">
                
            </div> 
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
      
    </section>
    <!-- /.content -->
  </div>