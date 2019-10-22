
/*===============================================
=            Crear codigo de Reporte            =
===============================================*/
$("#nuevaCategoriaUsuario").change(function(){

  var idCategoria = $(this).val();
  
    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({

      url:"ajax/reportes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        if(!respuesta){

          var nuevoCodigo = idCategoria +"01";
          $("#nuevoCodigo").val(nuevoCodigo);

        }else{

          var nuevoCodigo = Number(respuesta["codigo_reporte"])+1;
            $("#nuevoCodigo").val(nuevoCodigo);

        }
                
      }

   })

})

/*=============================================
=           Editar reporte de usuario        =
=============================================*/

$(".tablas tbody").on("click", "button.btnEditarReporte", function(){

  var idReporte = $(this).attr("idReporte");
  
    var datos = new FormData();
    datos.append("idReporte", idReporte);

     $.ajax({

      url: "ajax/reportes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        var datosCategorias = new FormData();
        datosCategorias.append("idCategoria",respuesta["id_categoria"]);

        $.ajax({

          url: "ajax/categorias.ajax.php",
          method: "POST",
          data: datosCategorias,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success:function(respuesta){

            $("#editarCategoria").val(respuesta["id"]);
            $("#editarCategoria").html(respuesta["categoria"]);

          }

        })
          
          $("#editarCodigo").val(respuesta["codigo_reporte"]);
          $("#editarUsuario").val(respuesta["usuario"]);
          $("#editarUbicacion").val(respuesta["lugar"]);
          $("#editarDescripcion").val(respuesta["descripcion"]);

          if(respuesta["imagen"] != ""){

          $("#imagenActual").val(respuesta["imagen"]);
          $(".verimagen").attr("src", respuesta["imagen"]);

        }

      }

  })

})



