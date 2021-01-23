  <script type="text/javascript">
    $(document).ready(function(){
         mostrarUsuarios();
    })    
   
  </script>  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Acceso de usuarios
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
              <li class="breadcrumb-item active">Acceso de usuarios</li>
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
            <button class="btn btn-app" data-toggle="modal" data-target="#modalAgregarUsuario">
              <i class="fa fa-plus"></i> Agregar usuario
            </button>
        </div>
        <div class="card-body">
            <style>
                .dataTables_filter{
                    float: right;
                }
            </style>
            
            <div id="tablaDatosUser">
                
            </div>     
                
            
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="AgregarUsuario" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form role="form" method="post" name="formUsuario" id="frmInsertUser">
      <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel"><b>Agregar usuario</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="modal-body">
        <div class="form-group">
            <div id="anotation"></div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-user"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="nuevoNombre" autocomplete="off" id="nombreuser" placeholder="Ingresa Nombre de pila" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fas fa-user-shield"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="nuevoUsuario" autocomplete="off" id="username" placeholder="Ingresa Nombre de usuario" />     
            </div>
            
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fas fa-lock"></i>
                  </span>
              </div>
                <input class="form-control" type="password" name="nuevoPaasword" id="userpass" placeholder="Ingresa Contraseña" />     
            </div>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fas fa-user-tag"></i>
                  </span>
              </div>
                <select class="custom-select" name="nuevoRol" id="Rol">
                    <?php $roles = mysqli_query($connexion, "SELECT * FROM roles WHERE idRole in(2,3,4)"); 
                          while($listroles = mysqli_fetch_array($roles)){
                              echo '<option value="'.$listroles['idRole'].'">'.$listroles['DescripcionRol'].'</option>';
                          }
                    ?>
                 </select>
            </div>
            
            <!--
            Subir imagen inhabilitado
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="fas fa-image"></i>
                      </span>
                      <div class="custom-file">
                        <input type="file" name="nuevaFoto" accept=".png, .jpg, .jpeg, .gif" class="custom-file-input" id="perfilFoto">
                        <label class="custom-file-label" id="fichero" for="perfilFoto">Seleccionar foto de perfil</label>
                      </div>
              </div>
            </div>-->

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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btn-user-register" class="btn btn-primary">Guardar usuario</button>
        <input type="hidden" id="StatusReg">
        <input type="hidden" id="Operacion" value="Insertar Usuario">
        <input type="hidden" id="Ruta" value="<?php echo $_GET['ruta']; ?>">
        <input type="hidden" id="UsuarioEjec" value="<?php echo $_SESSION['IdUsuario']; ?>">
      </div>
      
    </form>
    </div>
    
  </div>
</div>

<!-- Editar usuario -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="EditarUsuario" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form role="form" method="post" name="formEditUsuario" id="frmEditUser">
      <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel"><b>Editar usuario</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="modal-body">
        <div class="form-group">
            <div id="anotationEdit"></div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-user"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="editNombre" id="ednombreuser" value="" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fas fa-user-shield"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="editUsuario" disabled id="edusername" placeholder="Ingresa Nombre de usuario" />     
            </div>
            
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fas fa-lock"></i>
                  </span>
              </div>
                <input class="form-control" type="password" name="editPaasword" id="eduserpass" placeholder="Ingresa nueva Contraseña" />     
            </div>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fas fa-user-tag"></i>
                  </span>
              </div>
                <input type="text" class="form-control" id="edRol" disabled name="editRol">
            </div>

            <!--<div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="fas fa-image"></i>
                      </span>
                      <div class="custom-file">
                        <input type="file" name="editFoto" accept=".png, .jpg, .jpeg, .gif" class="custom-file-input" id="perfilFoto">
                        <label class="custom-file-label" id="fichero" for="perfilFoto">Seleccionar foto de perfil</label>
                      </div>
              </div>
            </div> -->

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fas fa-lightbulb"></i>
                  </span>
              </div>
                <select class="custom-select" id="editEstatus">                   
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                 </select>
            </div>
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btn-user-edit" class="btn btn-primary">Actualizar Datos</button>
        <input type="hidden" id="StatusEdit">
        <input type="hidden" id="IdUsuarioEdit">
        <input type="hidden" id="OperacionEdit" value="Editar Usuario">
        <input type="hidden" id="RutaEdit" value="<?php echo $_GET['ruta']; ?>">
        <input type="hidden" id="UsuarioEjecEdit" value="<?php echo $_SESSION['IdUsuario']; ?>">
      </div>
      
    </form>
    </div>
    
  </div>
</div>