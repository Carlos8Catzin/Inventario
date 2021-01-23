<?php
class ControladorUsuariosMensaje{
    static public function ctrMostrarUsuarioMsj($IdUsuario){
        
        $respuesta = CrudMensajes::ObtenerUsuario($IdUsuario);
        
        return $respuesta;
    }

}
?>