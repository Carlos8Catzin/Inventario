<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 764px; position: fixed;">
<?php   /*<a href="inicio" class="brand-link">
        <img src="views/dist/img/AdminLTELogo.png"
           alt="SIstema de punto de venta"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-weight: bolder; font-size: 14px;">SISTEMA POS INVENTARIO</span>
    </a>*/ ?>
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <i class="fas fa-user-tie" style="font-size: 40px;color: #fff;"></i>
        </div>
        <div class="info">
            <a href="#" class="d-block" style="font-size: 13px;"><b>Bienvenido:</b> <br /> <?php echo $_SESSION['Nombre']; ?></a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php 
            $item= "idRole";
            $valor= $_SESSION['Rol'];
            $rutaAccess = ControllerPlantilla::ctrMostrarRutas($item, $valor);
            foreach($rutaAccess as $access => $ruaccess){
                ?>
          <li class="nav-item">
            <a href="<?php if($_GET['ruta']==$ruaccess['rutadesc']){ echo "#"; }else{ echo $ruaccess['rutadesc']; } ?>" class="nav-link">
              <i class="nav-icon <?php echo $ruaccess['iconruta']; ?>"></i>
              <p>
                  <?php echo $ruaccess['menutitle']; ?>
              </p>
            </a>
          </li>
          
          <?php
            }
          ?>
        </ul>
      </nav>
</aside>