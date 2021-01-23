<?php if(isset($_SESSION['Usuario'])&&($_SESSION['Usuario'])!=""){
     echo '<script> window.location = "inicio"; </script>';
}
?>


<div id="back"></div>
<div class="login-box">
  <div class="login-logo">
      <a href="login" style="color: #fff;"><b>Módulo de Administración de Ventas</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesión para acceder al módulo de ventas</p>

      <form action="" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nombre de usuario" name="ingUsuario" autocomplete="off" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" autocomplete="off" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Acceder</button>
          </div>
          <!-- /.col -->
        </div>
          <?php 
            $login = new ControllerUsuarios();
            $login -> strIngresoUsuario();
          ?>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>