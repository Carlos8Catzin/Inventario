function ExportExcel(space){
    $.ajax({
         type: "POST",
         url: "views/modulos/query/export.php",
         data: "space="+space,
         success:function(r){
         if(r==1){
             Swal.fire('Su archivo esta siendo exportado');
         }else{
             Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Hubo un error en el servidor, por favor intentelo más tarde',
              })
         }
     }
     });
}
