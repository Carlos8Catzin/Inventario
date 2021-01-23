<?php 
    if(isset($_GET['IdUsuario'])&& ($_GET['IdUsuario'])!=""){
    $IdUsuario2 = $_GET['IdUsuario'];
    $msjUser = ControladorUsuariosMensaje::ctrMostrarUsuarioMsj($IdUsuario2);
                
    if($msjUser==0){
        echo '<script>location.href="inbox";</script>';
    }else{
        foreach($msjUser as $key => $value){

        }
    }
    
?>
<script type="text/javascript">
     $(document).ready(function(){
          $("#msg_history").html('<div class="text-center"><div class="spinner-border text-primary" style="text-align: center !important;" role="status"></div><p align="center" class="font-weight-bold">Cargando mensajes...</p></div>');
          setInterval("ObtenerMensajesWith(<?php echo $_GET['IdUsuario']; ?>)",3000);
      });
</script>
<link rel="stylesheet" href="views/dist/css/mensajes.css">
<script type="text/javascript" src="Ajax/Mensajes.js">
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="inbox">Buzón de Mensajes</a></li>
                <li class="breadcrumb-item active"><?php echo $value['Nombre']; ?></li>
              </ol>
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

<div class="row">
    <div class="col-sm-7" style="margin: 0 auto;">
                <div class="card card-light">
                    <div class="card-header"><h6><b>Mensajeria</b></h6></div>
                      <div class="card-body">
                          <div class="card border-primary mb-12" style="margin: 0 auto;">
                                        <div class="card-header"><span class="card-title font-weight-bold"><img src="views/images/usuarios/<?php echo $value['Foto']; ?>" width="45" heigth="45" style="border-radius:10px;"/> <?php echo $value['Usuario']; ?> -
                                        <span class="font-weight-light"><?php echo $value['Nombre']; ?></span></span></div>
                                        <div class="card-body text-primary" style="max-height: 405px; overflow-y: auto;">
                                                <div class="mesgs">
                                                     <div class="msg_history" id="msg_history">
                                                     </div>
                           <div class="type_msg" id="type_msg">
                             <div class="input_msg_write">
                             
                             <input type="hidden" id="ArchivoURL" value="" />
                             <input type="text" class="write_msg" id="Mensaje" placeholder="Escribe un mensaje" onkeypress="return EnterBtn(event)" />
                             <button class="msg_send_btn" id="SendMensaje" onclick="ValidaMensaje();" type="button"><i class="fas fa-share-square"></i></button><br />
                             <div class="file-input">
                             <input type="file" id="file" onchange="validarArchivo()" size="5120" class="file">
                             <label for="file"><i class="fas fa-paperclip"></i></label>
                             <span id="file_name" class="file_name">Adjuntar un archivo(Max. 5MB)</span>
                             </div>
                             </div>
                           </div>
                         </div>
                </div>
        </div>
                      </div>
                </div>
            </div>

        </div>

    </section>
    <!-- /.content -->
  </div>
    <?php }else{
        echo '<script>location.href="inbox";</script>';
    } ?>