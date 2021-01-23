<?php

class CrudNuevaVenta{
    static public function MostrarProductosVentas(){
        $sql = "SELECT * FROM productos WHERE StatusProd = 1 AND Stock >0 ORDER BY 1 DESC";
        $query= Conexion::conectar()->prepare($sql);
        $query ->execute();
        return $query->fetchAll();
        $query->close();
    }
    static public function GrabaVentaEfectivo($CodFactura,$IdCliente,$IdUsuario,$IdFormaPago,$Productos,$Impuesto,$IVA,$PagoNeto,$PagoTotal){
        
        $sql = "INSERT INTO ventas(CodFactura, IdCliente, IdUsuario, IdFormaPago, Productos, Impuesto, IVA, PagoNeto, PagoTotal, Fecha) VALUES"
                . "(:CodFactura, :IdCliente, :IdUsuario, :IdFormaPago, :Productos, :Impuesto, :IVA, :PagoNeto, :PagoTotal, NOW())";
        $query= Conexion::conectar()->prepare($sql);
        $query->bindParam(":CodFactura",$CodFactura, PDO::PARAM_STR);
        $query->bindParam(":IdCliente",$IdCliente, PDO::PARAM_STR);
        $query->bindParam(":IdUsuario",$IdUsuario, PDO::PARAM_STR);
        $query->bindParam(":IdFormaPago",$IdFormaPago, PDO::PARAM_STR);
        $query->bindParam(":Productos",$Productos, PDO::PARAM_STR);
        $query->bindParam(":Impuesto",$Impuesto, PDO::PARAM_STR);
        $query->bindParam(":IVA",$IVA, PDO::PARAM_STR);
        $query->bindParam(":PagoNeto",$PagoNeto, PDO::PARAM_STR);
        $query->bindParam(":PagoTotal",$PagoTotal, PDO::PARAM_STR);
        
        if($query->execute()){
            return 1;
        }else{
            return 0;
        }
        
        $query ->close();
        
        $query = null;
        
}
 static public function GrabaVentaTarjeta($CodFactura,$IdCliente,$IdUsuario,$IdFormaPago,$Productos,$Impuesto, $CodTransaccion, $IVA,$PagoNeto,$PagoTotal){
        
        $sql = "INSERT INTO ventas(CodFactura, IdCliente, IdUsuario, IdFormaPago, Productos, Impuesto, CodTransaccion, IVA, PagoNeto, PagoTotal, Fecha) VALUES"
                . "(:CodFactura, :IdCliente, :IdUsuario, :IdFormaPago, :Productos, :Impuesto, :CodTransaccion, :IVA, :PagoNeto, :PagoTotal, NOW())";
        $query= Conexion::conectar()->prepare($sql);
        $query->bindParam(":CodFactura",$CodFactura, PDO::PARAM_STR);
        $query->bindParam(":IdCliente",$IdCliente, PDO::PARAM_STR);
        $query->bindParam(":IdUsuario",$IdUsuario, PDO::PARAM_STR);
        $query->bindParam(":IdFormaPago",$IdFormaPago, PDO::PARAM_STR);
        $query->bindParam(":Productos",$Productos, PDO::PARAM_STR);
        $query->bindParam(":Impuesto",$Impuesto, PDO::PARAM_STR);
        $query->bindParam(":CodTransaccion",$CodTransaccion, PDO::PARAM_STR);
        $query->bindParam(":IVA",$IVA, PDO::PARAM_STR);
        $query->bindParam(":PagoNeto",$PagoNeto, PDO::PARAM_STR);
        $query->bindParam(":PagoTotal",$PagoTotal, PDO::PARAM_STR);
        
        if($query->execute()){
            return 1;
        }else{
            return 0;
        }
        
        $query ->close();
        
        $query = null;
        
}
    static public function mdlMostrarVentasEdit($item, $valor){
            $stmt = Conexion::conectar() ->prepare("SELECT v.IdVenta as IdVenta, u.IdUsuario as IdUsuario, v.CodFactura as CodFactura, 
            concat_ws(' ', c.NombreCliente, c.ApellidoCliente) as NombreCliente, v.IdCliente as IdCliente, 
            u.Usuario as Usuario, v.IdFormaPago as IdFormaPago, v.Productos as Productos,
            v.IVA as IVA, v.Impuesto as Impuesto, v.CodTransaccion as CodTransaccion,
            v.PagoNeto as PagoNeto, v.PagoTotal as PagoTotal FROM ventas v INNER JOIN 
            clientes c on c.IdCliente = v.IdCliente INNER JOIN usuarios u on u.IdUsuario = v.IdUsuario WHERE IdVenta = :$item");
            $stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt ->execute();
            
            if($stmt->rowCount()>0){
                return $stmt ->fetchAll();
            }else{
               return 0; 
            }

        $stmt -> close();
        $stmt = null;
    }
    

}

class ModelVenta{
    static public function mdlMostrarVentas($tabla, $item, $valor){
        if($item != null){
            $stmt = Conexion::conectar() ->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER by CodFactura DESC");
            $stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt ->execute();
            return $stmt ->fetchAll();
        }else{
            $stmt = Conexion::conectar() ->prepare("SELECT * FROM $tabla ORDER by CodFactura DESC");
            $stmt ->execute();
            return $stmt ->fetchAll();
        }
        $stmt -> close();
        $stmt = null;
    }

}


