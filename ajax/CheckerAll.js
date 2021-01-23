function delCheckerAll(IdTrans){
    swal.fire ({
          title: "¿Estás seguro de eliminar esta transacción?",
          text: "Se eliminará permanentemente esta transacción, ¿Deseas continuar?",
          icon: "error",
          showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Borrar'
   }).then((result) => {
       var dataString = 'IdPendiente='+IdTrans+'&deleteAll=1';
  if (result.value) {
    
    $.ajax({
         type: "POST",
         url: "views/modulos/delete/checker_delete.php",
         data: dataString,
         success:function(r){
             console.log(r);
             if(r==1){
                  Swal.fire(
                    'Transacción eliminada',
                    '¡Se ha eliminado esta transacción!',
                    'success'
                  ) 
                mostrarAllChecker();
            }else{
                Swal.fire(
                    'Hubo un error en el servidor',
                    '¡Por favor intentelo de nuevo más tarde!',
                    'error'
                  )
            }
            }
           });
    
  }
})
}

function VaciarCheckerAll(){
    swal.fire ({
          title: "¿Estás seguro de eliminar estas transacciones?",
          text: "Se eliminará permanentemente todas transacción aceptadas y rechazadas, ¿Deseas continuar?",
          icon: "error",
          showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Borrar'
   }).then((result) => {
       var dataString = 'deleteAll=Yes';
  if (result.value) {
    
    $.ajax({
         type: "POST",
         url: "views/modulos/delete/checker_empty.php",
         data: dataString,
         success:function(r){
             console.log(r);
             if(r==1){
                  Swal.fire(
                    'Transacciones eliminadas',
                    '¡Se ha eliminado las transacciones!',
                    'success'
                  ) 
                mostrarAllChecker();
            }else{
                Swal.fire(
                    'Hubo un error en el servidor',
                    '¡Por favor intentelo de nuevo más tarde!',
                    'error'
                  )
            }
            }
           });
    
  }
})
}