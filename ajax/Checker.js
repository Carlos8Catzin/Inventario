function aplChecker(IdTrans){
    swal.fire ({
          title: "¿Estás seguro de aplicar esta transacción?",
          text: "Se aplicará esta transacción, ¿Deseas continuar?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, continuar'
   }).then((result) => {
       
       var dataString = 'IdPendiente='+IdTrans+"&IdTrans=1";
       
                if (result.value) {
                    $.ajax({
         type: "POST",
         url: "views/modulos/insert/checker_aplic.php",
         data: dataString,
         success:function(r){
             console.log(r);
             if(r==1){
                  Swal.fire(
                    'Transacción aceptada',
                    '¡Se ha aplicado esta transacción!',
                    'success'
                  ) 
          mostrarChecker();
            }
            else if(r==0){
                Swal.fire(
                    'Hubo un error en el servidor',
                    '¡Por favor intentelo de nuevo más tarde!',
                    'error'
                  )
          mostrarChecker();
            }
            
            }
           });
       }
          });

}

function rechChecker(IdTrans){
    swal.fire ({
          title: "¿Estás seguro de rechazar esta transacción?",
          text: "Se rechazará esta transacción, ¿Deseas continuar?",
          icon: "error",
          showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, continuar'
   }).then((result) => {
       var dataString = 'IdPendiente='+IdTrans+"&IdTrans=2";
  if (result.value) {
    
    $.ajax({
         type: "POST",
         url: "views/modulos/insert/checker_aplic.php",
         data: dataString,
         success:function(r){
             console.log(r);
             if(r==1){
                  Swal.fire(
                    'Transacción rechazada',
                    '¡Se ha rechazado esta transacción!',
                    'success'
                  ) 
                mostrarChecker();
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



