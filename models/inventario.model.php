<?php
class ModelProductos{
    static public function mdlMostrarProductos($tabla, $item, $valor){
        if($item != null){
            $stmt = Conexion::conectar() ->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER by IdProducto DESC");
            $stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt ->execute();
            return $stmt ->fetchAll();
        }else{
            $stmt = Conexion::conectar() ->prepare("SELECT * FROM $tabla ORDER by IdProducto DESC");
            $stmt ->execute();
            return $stmt ->fetchAll();
        }
        $stmt -> close();
        $stmt = null;
    }
    static public function mdlActualizarProducto($tabla, $item1, $valor1, $valor2) {
        $sql = "UPDATE $tabla SET $item1 = :$item1 WHERE IdProducto= :id";
        $query= Conexion::conectar()->prepare($sql);
        $query->bindParam(":".$item1, $valor1, PDO::PARAM_INT);
        $query->bindParam(":id", $valor2, PDO::PARAM_INT);
        if($query ->execute()){
            return 1;
        }else{
            return 0;
        }
        $query->close();
        $query = null;
    }
}
class CrudInventario{
    static public function MostrarDatosProductos(){
        $sql = "SELECT p.IdProducto, p.CodigoProd as CodigoProd, p.NombreProducto as NombreProducto, p.DescProducto as DescProducto,
c.NombreCategoria as IdCategoria, p.Stock as Stock, p.ImgProd as ImgProd, p.PrecioCompra as PrecioCompra,
p.PrecioVenta as PrecioVenta, p.TotalVentas as TotalVentas, pr.NombreProveedor as IdProveedor, u.Usuario as IdUsuario, p.Fecha as Fecha,case p.StatusProd when 1 then 'ACTIVO'
else 'INACTIVO' end as Estatus 
FROM productos p INNER JOIN categorias c ON c.IdCategoria = p.IdCategoria INNER JOIN 
usuarios u ON u.IdUsuario = p.IdUsuario INNER JOIN 
proveedores pr ON pr.IdProvedor = p.IdProveedor";
        $query= Conexion::conectar()->prepare($sql);
        $query ->execute();
        return $query->fetchAll();
        $query->close();
    }
    
    static public function ObtenerProducto($IdProducto){
        $sql = "SELECT * FROM productos WHERE IdProducto= :IdProducto";
        $query= Conexion::conectar()->prepare($sql);
       $query->bindParam(":IdProducto", $IdProducto, PDO::PARAM_INT);
       $query->execute();
      return $query->fetch();
       $query->close();
    }
    
    static public function ObtenerCodigo($IdCategoria) {
        $sql = "SELECT * FROM productos WHERE IdCategoria= :IdCategoria ORDER BY 1 DESC";
        $query= Conexion::conectar()->prepare($sql);
        $query->bindParam(":IdCategoria", $IdCategoria, PDO::PARAM_INT);
        $query ->execute();
        return $query->fetch();
        $query->close();
    }
    
    
    
    
        
   } 
    
    
?>