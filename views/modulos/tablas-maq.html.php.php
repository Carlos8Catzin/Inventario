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
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
              Agregar usuario
            </button>
        </div>
        <div class="card-body">
            <style>
                .dataTables_filter{
                    float: right;
                }
            </style>
            <table class="table table-bordered table-striped tablas">
                <thead>
                    <tr>
                        <th style="width:10px;">#</th>
                        <th>Nombre</th>
                        <th>Nombre de usuario</th>
                        <th>Rol</th>
                        <th>Estatus</th>
                        <th>Último acceso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Carlos</td>
                        <td>Carlos210696</td>
                        <td>Administrador</td>
                        <td><button class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Activo</button></td>
                        <td>04/07/2020</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modalEditarUsuario">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#modalElminarUsuario">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Carlos</td>
                        <td>Carlos210696</td>
                        <td>Administrador</td>
                        <td><button class="btn btn-danger btn-sm"><i class="fas fa-times-circle"></i> Inactivo</button></td>
                        <td>04/07/2020</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#EditarUsuario">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#EliminarUsuario">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            
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
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="AgregarUsuario" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Agregar usuario</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="modal-body">
        <div class="form-group">
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-user"></i>
                  </span>
              </div>
              <input class="form-control" type="text" name="nuevoNombre" placeholder="Ingresa Nombre de pila" required />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fas fa-user-shield"></i>
                  </span>
              </div>
              <input class="form-control" type="text" name="nuevoUsuario" placeholder="Ingresa Nombre de usuario" required />     
            </div>
            
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fas fa-lock"></i>
                  </span>
              </div>
                <input class="form-control" type="password" name="nuevoPaasword" placeholder="Ingresa Contraseña" required />     
            </div>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fas fa-user-tag"></i>
                  </span>
              </div>
                <select class="custom-select" id="nuevoRol">
                    <option value="0" selected>Seleccionar Rol</option>
                    <?php $roles = mysqli_query($connexion, "SELECT * FROM roles"); 
                          while($listroles = mysqli_fetch_array($roles)){
                              echo '<option value="'.$listroles['idRole'].'">'.$listroles['DescripcionRol'].'</option>';
                          }
                    ?>
                 </select>
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="fas fa-image"></i>
                      </span>
                      <div class="custom-file">
                        <input type="file" name="nuevaFoto" class="custom-file-input" id="perfilFoto">
                        <label class="custom-file-label" for="perfilFoto">Seleccionar foto de perfil</label>
                      </div>
              </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fas fa-lightbulb"></i>
                  </span>
              </div>
                <select class="custom-select" id="nuevoEstatus">
                    
                    <option value="1" selected>Activo</option>
                    <option value="0">Inactivo</option>
                 </select>
            </div>
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar usuario</button>
      </div>
    </form>
    </div>
    
  </div>
</div>