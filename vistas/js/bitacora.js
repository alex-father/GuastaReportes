    /*=============================================
        función js para eliminar las bitácoras
    =============================================*/

$(".tablas").on("click", ".btnEliminarBitacora", function(){

      var idBitacora = $(this).attr("idBitacora");
      var codigo = $(this).attr("codigo");
      var imagen = $(this).attr("imagen");
      
      console.log(idBitacora);

      swal({
        title: '¿Desea eliminar el reporte?',
        text: "¡Puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Si, borrar reporte!'
      }).then(function(result){

        if(result.value){

          window.location = "index.php?ruta=bitacora&idBitacora="+idBitacora+"&imagen="+imagen+"&codigo="+codigo;

        }

      })


    })