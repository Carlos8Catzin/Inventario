<script type="text/javascript">
    $(document).ready(function(){
         mostrarClientes();
    })    
   
  </script>   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Clientes</a></li>
              <li class="breadcrumb-item active">Todos los clientes</li>
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
            <button class="btn btn-app" data-toggle="modal" data-target="#modalAgregarCliente">
              <i class="fa fa-plus"></i> Agregar Cliente
            </button>
        </div>
        <div class="card-body">
        <style>
                .dataTables_filter{
                    float: right;
                }
            </style>
            
            <div id="tablaDatosClientes">
                
            </div> 
            
      <div class="modal fade" id="modalAgregarCliente" tabindex="-1" role="dialog" aria-labelledby="AgregarCliente" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form role="form" method="post" autocomplete="off">  
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Agregar Cliente</b></h5>
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
                      <i class="fas fa-user-shield"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="CodCliente" id="codcliente" disabled="" autocomplete="off" placeholder="Código del Cliente" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-user"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="Nombre" id="nombrecliente" onchange="ObtCodCliente();" autocomplete="off" placeholder="Ingresa Nombre del cliente" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fa fa-user"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="apellido" id="apellcliente" autocomplete="off" placeholder="Ingresa Apellido del cliente" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fas fa-at"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="correocliente" id="emailcliente" autocomplete="off" placeholder="Ingresa Correo electrónico" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="far fa-address-card"></i>
                  </span>
              </div>
                <textarea class="form-control" name="dircliente" id="direcliente" placeholder="Ingresa Dirección del cliente"></textarea>     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                  </span>
              </div>
                <input class="form-control date" data-date-format="dd/mm/yyyy" placeholder="Fecha de nacimiento" onfocus="(this.type='date')" name="fecnaccliente" id="fechacliente" />     
            </div>
            
            </div>
            
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn-save-client" onclick="SaveCliente();">Guardar Cliente</button>
      </div>
      </form>
          </div>
      
        <!-- /.card-footer-->
      </div>
      </div>
            
       <!--EDITAR CLIENTE -->
       <div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="EditarCliente" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form role="form" method="post" autocomplete="off">  
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Editar Cliente</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
        <div class="modal-body">
            <div class="form-group">
            <div id="Edanotation"></div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fas fa-user-shield"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="EdCodCliente" id="Edcodcliente" disabled="" autocomplete="off" placeholder="Código del Cliente" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fa fa-user"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="EdNombre" id="Ednombrecliente" autocomplete="off" placeholder="Ingresa Nombre del cliente" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fa fa-user"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="Edapellido" id="Edapellcliente" autocomplete="off" placeholder="Ingresa Apellido del cliente" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="fas fa-at"></i>
                  </span>
              </div>
                <input class="form-control" type="text" name="Edcorreocliente" id="Edemailcliente" autocomplete="off" placeholder="Ingresa Correo electrónico" />     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="far fa-address-card"></i>
                  </span>
              </div>
                <textarea class="form-control" name="Eddircliente" id="Eddirecliente" placeholder="Ingresa Dirección del cliente"></textarea>     
            </div>
            
            <div class="input-group mb-3">
                  <div class="input-group-prepend" style="width: 41px;">
                  <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                  </span>
              </div>
                <input class="form-control date" data-date-format="dd/mm/yyyy" placeholder="Fecha de nacimiento" type="date" name="Edfecnaccliente" id="Edfechacliente" />     
            </div>
            
            </div>
            
        </div>
        <div class="modal-footer">
            <input type="hidden" id="IdCliente" name="idClien" />
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn-edit-client" onclick="EditCliente();">Editar Cliente</button>
      </div>
      </form>
          </div>
      
        <!-- /.card-footer-->
      </div>
      </div>
       
        </div>
      </div>
      <!-- /.card -->      
        
    </section>
    <!-- /.content -->
  </div>