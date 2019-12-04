
      /*=============================================
              Editar Ubicacion
      =============================================*/

$(".tablas").on("click", ".btnEditarLugar", function(){

  var idLugar = $(this).attr("idLugar");

  
  var datos = new FormData();
  datos.append("idLugar", idLugar);

  $.ajax({

    url:"ajax/lugares.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      
      
      $("#editarMunicipio").val(respuesta["municipio"]);
      $("#idMunicipio").val(respuesta["id"]);
      

      $("#editarUbicacion").val(respuesta["aldea"]);
      $("#idUbicacion").val(respuesta["aldea"]);
     

      $("#editarCodigo").val(respuesta["codigo"]);
      $("#idCodigo").val(respuesta["codigo"]);
      
    }

  });

})


      /*=============================================
            Eliminar Ubicacion
      =============================================*/


$(".tablas").on("click", ".btnEliminarLugar", function(){

      var idLugar = $(this).attr("idLugar");
      


      swal({
        title: '¿Desea eliminar la Ubicación?',
        text: "¡Puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Si, borrar la Ubicación!'
      }).then(function(result){

        if(result.value){

          window.location = "index.php?ruta=lugares&idLugar="+idLugar;

        }

      })


    })