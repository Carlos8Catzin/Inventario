<link rel="stylesheet" href="views/dist/css/mensajes.css">
<script type="text/javascript">
    mostrarUsuariosMensajes();
</script>  
<script type="text/javascript">
     $(document).ready(function(){
          setInterval("LanzarMensaje()",3000);
      });
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mensajes
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Mensajes</a></li>
              <li class="breadcrumb-item active">Sala de mensajes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

<div class="row">
    <div class="col-sm-5">
               <div class="card card-light">
                    <div class="card-header"><h6><b>Selecciona al usuario al que deseas enviarle un mensaje</b></h6></div>
                      <div class="card-body" style="max-height: 530px; overflow-y: auto;">
                                        <style>
                              .dataTables_filter{
                                  float: right;
                              }
                          </style>

                          <div id="tablaUsuarioMensajes">
                              
                          </div>
                      </div>
                </div> 
            </div>
            <div class="col-sm-7">
                <div class="card card-light">
                    <div class="card-header"><h6><b>Mensajeria</b></h6></div>
                      <div class="card-body">
                          <input type="hidden" id="bandera" value="0">
                          <input type="hidden" id="IdUsuarios" value="">
                          <div id="tablaMensajes">
                              <center><h3>Seleccione un usuario</h3></center>
                          </div>
                      </div>
                </div>
            </div>
            
            
        </div>

    </section>
    <!-- /.content -->
  </div>