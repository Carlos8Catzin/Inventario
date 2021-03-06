  <script type="text/javascript">
    $(document).ready(function(){
         mostrarProveedores();
    })    
   
  </script> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Proveedores
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Proveedores</a></li>
              <li class="breadcrumb-item active">Listado de Proveedores</li>
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
          <a href="add-proveedor" class="btn btn-app" role="button" aria-disabled="true">
                <i class="fas fa-plus"></i>Agregar nuevo proveedor
            </a>
        </div>
        <div class="card-body">
          <style>
                .dataTables_filter{
                    float: right;
                }
            </style>
            
            <div id="tablaDatosProveedores">
                
            </div> 
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>