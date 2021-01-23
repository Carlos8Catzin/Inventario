<?php
class Conexion{
    public function conectar() {
         try{
        $link = new PDO("mysql:host=localhost;dbname=inventario",
                "root",
                "");
        $link ->exec("set names utf8");
        
        return $link;
        }catch(PDOException $ex){

        die($ex->getMessage());
       }
    }
}
?>