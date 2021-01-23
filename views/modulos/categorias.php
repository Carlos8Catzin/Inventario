  <script type="text/javascript">
    $(document).ready(function(){
         mostrarCategorias();
    })    
   
  </script>  
  <script type="text/javascript">
      $(document).ready(function(){
      $("#reload-categoria").click(function(){
          $("#reload-categoria").addClass("disabled");
          $("#act-cat").html("Actualizando...");
       setTimeout(function(){
          $("#reload-categoria").removeClass("disabled");
          $("#act-cat").html("Actualizar");
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
            <h1>Categorías
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Categorías</a></li>
              <li class="breadcrumb-item active">Todas las categoría</li>
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
            <button class="btn btn-app" data-toggle="modal" data-target="#modalAgregarCategoria">
                <i class="fas fa-plus"></i><span id="act-check"> Agregar Categoría</span>
            </button>
            <button class="btn btn-app" id="reload-categoria"  onclick="mostrarCategorias();">
                <i class="fas fa-redo"></i><span id="act-cat"> Actualizar</span>
            </button>
          </div>
        
        <div class="card-body">
          <style>
                .dataTables_filter{
                    float: right;
                }
            </style>
            
            <div id="tablaDatosCategoria">
                
            </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
</div>
    </section>
    <!-- /.content -->
  </div>
  
  <div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="AgregarCategoria" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ModalLabel"><b>Agregar categoría</b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div id="anotationCat"></div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-list-alt"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="NombreCategoria" id="NombreCat" placeholder="Ingresa Nombre de la categoría(Obligatorio)" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fa fa-list"></i>
                  </span>
              </div>
                <textarea class="form-control" type="text" name="DescCategoria" style="resize: none; height: 70px;" id="DescCat" placeholder="Ingresa Descripción (Opcional)"></textarea>     
            </div>
            
          </div>
        </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btn-add-cat" class="btn btn-primary">Agregar</button>
        <input type="hidden" id="Status">
        <input type="hidden" id="Operacion" value="Agregar Categoría">
        <input type="hidden" id="RutaCat" value="<?php echo $_GET['ruta']; ?>">
        <input type="hidden" id="UsuarioEjec" value="<?php echo $_SESSION['IdUsuario']; ?>">
      </div>
      </div>
  </div>
  </div>
  
    <div class="modal fade" id="modalEditarCategoria" tabindex="-1" role="dialog" aria-labelledby="EditarCategoria" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ModalLabel"><b>Editar categoría</b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div id="anotationEdCat"></div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-list-alt"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="EdNombreCategoria" id="EdNombreCat" placeholder="Ingresa Nombre de la categoría(Obligatorio)" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fa fa-list"></i>
                  </span>
              </div>
                <textarea class="form-control" type="text" name="EdDescCategoria" style="resize: none; height: 70px;" id="EdDescCat" placeholder="Ingresa Descripción (Opcional)"></textarea>     
            </div>
            
          </div>
        </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btn-edit-cat" class="btn btn-primary">Editar Categoría</button>
        <input type="hidden" id="OperacionEd" value="Editar Categoría">
        <input type="hidden" id="IdCategoria" value="">
        <input type="hidden" id="RutaCatEd" value="<?php echo $_GET['ruta']; ?>">
      </div>
      </div>
  </div>
  </div>