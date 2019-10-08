


$(".tablas").on("click", ".btnEditarLugar", function(){

  var idLugar = $(this).attr("idLugar");

  console.log(idLugar);
  
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
      $("#editarUbicacion").val(respuesta["aldea"]);
      $("#editarCodigo").val(respuesta["codigo"]);


    }

  });

})