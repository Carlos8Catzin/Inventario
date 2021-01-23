<?php

class CrudAdminVenta{
    static public function MostrarDatosVentas(){
        $sql = "SELECT v.IdVenta as IdVenta,
                v.CodFactura as CodFactura, concat_ws(' ', c.NombreCliente, c.ApellidoCliente) as NombreCliente,
                u.Usuario as Vendedor, fp.DescFormaPago as FormaPago, 
                case when v.IdFormaPago != 1 then concat_ws('-', fp.AbrevFormaPago, v.CodTransaccion) 
                else concat_ws('-', fp.AbrevFormaPago, v.CodFactura) end as CodigoPago,
                v.PagoNeto as PagoNeto, v.PagoTotal as PagoTotal, v.Fecha as FechaVenta
                FROM ventas v INNER JOIN clientes c ON c.IdCliente = v.IdCliente
                INNER JOIN usuarios u ON u.IdUsuario = v.IdUsuario
                INNER JOIN formapago fp ON fp.IdFormaPago = v.IdFormaPago ORDER BY v.IdVenta ASC";
        $query= Conexion::conectar()->prepare($sql);
        $query ->execute();
        return $query->fetchAll();
        $query->close();
    }
}