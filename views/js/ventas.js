$.ajax({
    url: "ajax/DBVentas.ajax.php",
    success: function (respuesta) {
        console.log(respuesta);
    }
});
$('#TablaVentas').DataTable({
    "ajax": "ajax/DBVentas.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   "language":{
        "decimal":        "",
        "emptyTable":     "Datos no disponibles en la tabla",
        "info":           "Mostrando _START_ a _END_ de _TOTAL_ entradas",
        "infoEmpty":      "Mostrando 0 a 0 en 0 entradas",
        "infoFiltered":   "(Filtrando de _MAX_ total entradas)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Mostrar _MENU_",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search":         "Búsqueda:",
        "zeroRecords":    "No se ha encontrado ningún resultado",
        "paginate": {
            "first":      "Primero",
            "last":       "Último",
            "next":       "Siguiente",
            "previous":   "Anterior"
            },
          },
      
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "fixedHeader": true,
});