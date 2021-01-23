  <script type="text/javascript">
      $(document).ready(function(){
          setInterval('ObtenerNoMensajes()',2000);
      });
  </script>
<nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link font-weight-bold text-uppercase" href="inicio" role="button"><i class="fas fa-tshirt"></i> Novedades San Juan</a>
      </li>
    </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" onclick="OpenMensajes();">
                    <i class="fas fa-envelope-open-text"></i> Mensajes
                    <span class="notification-mensaje" id="notification-mensaje" style="display: none;">
                        <span class="mensaje-counter" id="mensaje-counter">0</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <h1 class="text-center" style="font-weight: 800; font-size: 18px; padding: 6px 2px 0px 2px;">Nuevos mensajes</h1>
                    <div id="DropMensajes"></div>
                    <a href="inbox" class="dropdown-item btn btn-block btn-flat text-center">
                    <i class="fas fa-envelope"></i>
                    <span class="hidden-xs" style="font-weight: 800; font-size: 14px;">Ver todos los mensajes</span>
                    </a>
                </div>
                    
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="views/images/usuarios/<?php echo $_SESSION['Foto']; ?>" class="img-circle" style="max-width: 25px; max-height: 25px;" />
                    <span class="hidden-xs" style="font-weight: 500; font-size: 15px;">Usuario <?php echo $_SESSION['Usuario']; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="mis-datos" class="dropdown-item btn btn-block btn-flat">
                    <i class="fas fa-id-card"></i>
                    <span class="hidden-xs" style="font-weight: 800; font-size: 14px;">Mis datos</span>
                    </a>
                    <a href="inbox" class="dropdown-item btn btn-block btn-flat">
                    <i class="fas fa-inbox"></i>
                    <span class="hidden-xs" style="font-weight: 800; font-size: 14px;">Mis mensajes</span>
                    </a>
                    <a href="cambiar-foto" class="dropdown-item btn btn-block btn-flat">
                    <i class="far fa-address-card"></i>
                    <span class="hidden-xs" style="font-weight: 800; font-size: 14px;">Cambiar foto de perfil</span>
                    </a>
                    <a href="logout" class="dropdown-item btn btn-block btn-flat">
                    <i class="fas fa-power-off"></i>
                    <span class="hidden-xs" style="font-weight: 800; font-size: 14px;">Cerrar sesión</span>
                    </a>
                </div>
            </li>
        </ul>
    
</nav>