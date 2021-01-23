<?php
require '../../../models/categorias.model.php';
$obj = new CrudCategoria();
$datos = $obj ->MostrarDatosCategorias();
    $tabla = '
        <script src="ajax/Categorias.js"></script>
        <script src="views/js/tablas.js"></script>
            <table class="table table-bordered table-striped tablas">
                <thead>
                    <tr>
                        <th style="width:115px;">Id Categoría</th>
                        <th>Nombre de la categoría</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>';
    $datosTabla = "";
    
    foreach($datos as $key => $value){
        if($value['DescCategoria']==""){
            $descCategoria = "Sin descripción";
        }else{
            $descCategoria = nl2br($value['DescCategoria']);
        }
        $datosTabla = $datosTabla.'<tr>
                        <td>'.$value['IdCategoria'].'</td>
                        <td>'.$value['NombreCategoria'].'</td>
                        <td>'.$descCategoria.'</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning btnEditarCategoria" onclick="obtCategoria('.$value['IdCategoria'].')" title="Editar" data-toggle="modal" data-target="#modalEditarCategoria">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="delCategoria('.$value['IdCategoria'].')" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    
';
    }
    
    echo $tabla.$datosTabla.'</tbody></table>';
    
?>
