<?php

class CrudChecker extends Conexion{
    
    public function InsertarChecker($datos){
    
    if($datos['Ruta']=="Ventas"){
        $consql = Conexion::conectar()->prepare("INSERT INTO pendientes(Operacion,Ruta,IdUsuarioEject,Consulta,DescQuery)"
                . "VALUES(:Operacion,:Ruta,:IdUsuarioEject,:Query,:DescQuery)");
        
        //$sql= "INSERT INTO pendientes(Operacion,Ruta,IdUsuarioEject,Consulta)
                //VALUES(:Operacion,:Ruta,:IdUsuarioEject,:Query)";
        
        //$query= Conexion::conectar()->prepare($sql);
        $consql->bindParam(":Operacion",$datos['Operacion'], PDO::PARAM_STR);
        $consql->bindParam(":Ruta",$datos['Ruta'], PDO::PARAM_STR);
        $consql->bindParam(":IdUsuarioEject",$datos['IdUsuarioEject'], PDO::PARAM_STR);
        $consql->bindParam(":Query",$datos['Query'], PDO::PARAM_STR);
        $consql->bindParam(":DescQuery",$datos['DescQuery'], PDO::PARAM_STR);
        
        if($consql->execute()){
            return 1;
        }else{
            return 0;
        }
        
        $consql->close();
        
        $consql = null;
        }else{
    $conn= new mysqli('localhost','root','','Inventario');
    
    $consPend =  'SELECT * FROM pendientes WHERE Consulta = "'. $datos['Query'] .'" AND Estatus=1';
    $result = $conn->query($consPend);
    if($result->num_rows > 0){  
         echo "2";
    }else{
        $consql = Conexion::conectar()->prepare("INSERT INTO pendientes(Operacion,Ruta,IdUsuarioEject,Consulta,DescQuery)"
                . "VALUES(:Operacion,:Ruta,:IdUsuarioEject,:Query,:DescQuery)");
        
        //$sql= "INSERT INTO pendientes(Operacion,Ruta,IdUsuarioEject,Consulta)
                //VALUES(:Operacion,:Ruta,:IdUsuarioEject,:Query)";
        
        //$query= Conexion::conectar()->prepare($sql);
        $consql->bindParam(":Operacion",$datos['Operacion'], PDO::PARAM_STR);
        $consql->bindParam(":Ruta",$datos['Ruta'], PDO::PARAM_STR);
        $consql->bindParam(":IdUsuarioEject",$datos['IdUsuarioEject'], PDO::PARAM_STR);
        $consql->bindParam(":Query",$datos['Query'], PDO::PARAM_STR);
        $consql->bindParam(":DescQuery",$datos['DescQuery'], PDO::PARAM_STR);
        
        if($consql->execute()){
            return 1;
        }else{
            return 0;
        }
        
        $consql->close();
        
        $consql = null;
       
        }
    
        
    }
    }
    
    static public function MostrarDatosChecker($usuario){
        $sql = "";
        if($usuario==1){
        $sql = "SELECT ROW_NUMBER() OVER( ORDER BY  p.IdPendiente desc) AS RowNum, p.IdPendiente as IdPendiente, UPPER(p.Operacion) as Operacion, UPPER(p.Ruta) as Ruta,"
                . " UPPER(u.Usuario) as IdUsuarioEject, p.Consulta as Consulta, p.Fecha as Fecha, "
                . "case p.Estatus when 1 then 'ACTIVO' when 2 then 'APLICADO' when 3 then 'RECHAZADO' end as Estatus, p.DescQuery as DescQuery "
                . "FROM pendientes p inner join inventario.usuarios u on IdUsuarioEject = IdUsuario WHERE p.Estatus= 1 order by IdPendiente desc";
        }else if($usuario==2){
           $sql = "SELECT ROW_NUMBER() OVER( ORDER BY  p.IdPendiente desc) AS RowNum, p.IdPendiente as IdPendiente, UPPER(p.Operacion) as Operacion, UPPER(p.Ruta) as Ruta,"
                . " UPPER(u.Usuario) as IdUsuarioEject, p.Consulta as Consulta, p.Fecha as Fecha, "
                . "case p.Estatus when 1 then 'ACTIVO' when 2 then 'APLICADO' when 3 then 'RECHAZADO' end as Estatus, p.DescQuery as DescQuery "
                . "FROM pendientes p inner join inventario.usuarios u on IdUsuarioEject = IdUsuario WHERE p.Estatus= 1 order by IdPendiente desc";
      
        }else if($usuario==3){
            $sql = "SELECT ROW_NUMBER() OVER( ORDER BY  p.IdPendiente desc) AS RowNum, p.IdPendiente as IdPendiente, UPPER(p.Operacion) as Operacion, UPPER(p.Ruta) as Ruta,"
                . " UPPER(u.Usuario) as IdUsuarioEject, p.Consulta as Consulta, p.Fecha as Fecha, "
                . "case p.Estatus when 1 then 'ACTIVO' when 2 then 'APLICADO' when 3 then 'RECHAZADO' end as Estatus, p.DescQuery as DescQuery "
                . "FROM pendientes p inner join inventario.usuarios u on IdUsuarioEject = IdUsuario WHERE p.Estatus= 1 and Ruta IN('categorias','productos','clientes') order by IdPendiente desc";
       
        }
        $query= Conexion::conectar()->prepare($sql);
        $query ->execute();
        return $query->fetchAll();
        $query->close();
    }
    
        static public function MostrarTodosChecker(){
        $sql = "SELECT ROW_NUMBER() OVER(ORDER BY  p.IdPendiente asc) AS RowNum, p.IdPendiente as IdPendiente, UPPER(p.Operacion) as Operacion, UPPER(p.Ruta) as Ruta,"
                . " UPPER(u.Usuario) as IdUsuarioAplic, UPPER(iu.Usuario) as IdUsuarioEject, p.Consulta as Consulta, p.Fecha as Fecha, "
                . "case p.Estatus when 1 then 'ACTIVO' when 2 then 'ACEPTADO' when 3 then 'RECHAZADO' end as Estatus, p.DescQuery as DescQuery "
                . "FROM inventario.pendientes p inner join inventario.usuarios u on p.IdUsuarioAplic = u.IdUsuario "
                . "inner join inventario.usuarios iu on p.IdUsuarioEject = iu.IdUsuario"
                . " WHERE p.Estatus in(2,3) ORDER BY p.IdPendiente asc";
        $query= Conexion::conectar()->prepare($sql);
        $query ->execute();
        return $query->fetchAll();
        $query->close();
    }
    
    static public function InsertarDatosChecker($datos){
        
        $sql= "$datos";
        $query= Conexion::conectar()->prepare($sql);

        if($query ->execute()){
            return 1;
        }else{
            return 0;
        }
        
        $query->close();
        $query = null;
        
    }
    
}