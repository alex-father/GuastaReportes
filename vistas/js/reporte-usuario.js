
/*===============================================
=            Crear codigo de Reporte            =
===============================================*/





$("#categoriaUsuario").change(function(){

  var idCategoria = $(this).val();

  console.log("respuesta", idCategoria);

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
          console.log("respuesta",nuevoCodigo);


        }else{

          var nuevoCodigo = Number(respuesta["codigo_reporte"])+1;
            $("#nuevoCodigo").val(nuevoCodigo);
            console.log("respuesta2",nuevoCodigo);

            

        }
                
      }

    })

})


