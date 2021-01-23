
function obtCategoria(IdCat){
    $.ajax({
         type: "POST",
         url: "views/modulos/query/ObtenerCategoria.php",
         data: "IdCategoria="+IdCat,
         success:function(r){
             console.log(r);
             r=jQuery.parseJSON(r);
             $("#IdCategoria").val(r['IdCategoria']);
             $("#EdNombreCat").val(r['NombreCategoria']);
             $("#EdDescCat").val(r['DescCategoria']);
         }
     });
}

function delCategoria(IdCat){
   swal.fire ({
          title: "¿Estás seguro de eliminar esta categoría?",
          text: "Se enviará esta transacción a la pestaña de Autorización, ¿Deseas continuar?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, continuar'
   }).then((result) => {
       
       var dataString = 'IdCategoria='+IdCat;
       
                if (result.value) {
                    $.ajax({
         type: "POST",
         url: "views/modulos/delete/checker_delete.php",
         data: dataString,
         success:function(r){
             console.log(r);
             if(r==1){
                  Swal.fire(
                    'Esta transacción requiere Autorización',
                    '¡Se ha enviado esta transacción a la pestaña de Autorización!',
                    'success'
                  ) 
            }else if(r==0){
                Swal.fire(
                    'Hubo un error en el servidor',
                    '¡Por favor intentelo de nuevo más tarde!',
                    'error'
                  )
        }else if(r==2){
                swal.fire("¡Error!", "Parece que esta transacción ya esta en espera de Autorización", "error");
            }
            }
           });
       }
          });
}