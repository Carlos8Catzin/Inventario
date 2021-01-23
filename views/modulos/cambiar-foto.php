  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card" style="width: 60%; margin: 0 auto;">
        <div class="card-header">
          <h3 class="card-title">Cambiar foto de perfil</h3>
        </div>
        <div class="card-body">
          <div class="form-group row" style="width: 75%; margin: 0 auto;">
            <div class="col-sm-4">
                    <button type="button" class="close" id="remove-Photo" style="display:none;">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    <div class="input-group">
                        <img src="views/images/plantilla/empty.png" id="FotoTemp" width="150" height="150">
                    </div>
            </div>
            <div class="col-sm-8">
            <h3>Seleccione una nueva foto de perfil</h3>
            <div class="input-group">
                <div class="input-group-prepend" style="padding-top: 10px;">
                      <span class="input-group-text">
                      <i class="fas fa-image"></i>
                      </span>
                      <div class="custom-file">
                        <input type="file" name="nuevaFoto" accept=".png, .jpg, .jpeg, .gif" class="custom-file-input" id="Foto">
                        <label class="custom-file-label" id="fichero" for="Foto">Seleccionar foto</label>
                      </div>
              </div>
            </div>
            <button class="btn btn-primary" style="margin:20px auto;">
                <i class="far fa-user-circle"></i> Guardar cambios
            </button>
            <button class="btn btn-danger" style="margin:20px auto;">
                <i class="far fa-window-close"></i> Cancelar
            </button>
            </div>
                
            </div>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>