/*=============================================
SUBIENDO LA FOTO DEL EMPLEADO
=============================================*/
$(".nuevaFotoEmpleado").change(function(){

  var imagen = this.files[0];
  
  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

      $(".nuevaFoto").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG o PNG!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else if(imagen["size"] > 2000000){

      $(".nuevaFoto").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen no debe pesar más de 2MB!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }
    else {

      var datosImagen = new FileReader;
      datosImagen.readAsDataURL(imagen);

      $(datosImagen).on("load", function(event){

        var rutaImagen = event.target.result;

        $(".visualizar").attr("src", rutaImagen);

      })

    }
})






$(document).on("click", ".btnEditarEmpleado", function(){

  var idEmpleado = $(this).attr("idEmpleado");
  
  var datos = new FormData();
  
  datos.append("idEmpleado", idEmpleado);


  $.ajax({

    url:"ajax/empleados.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      

      $("#editarNombre").val(respuesta["nombre"]);
      $("#editarEmpleado").val(respuesta["usuario"]);
      $("#editarPerfil").html(respuesta["perfil"]);
      $("#editarPerfil").val(respuesta["perfil"]);
      $("#fotoActual").val(respuesta["foto"]);

      $("#passwordActual").val(respuesta["password"]);

      if(respuesta["foto"] != ""){

        $(".previsualizar").attr("src", respuesta["foto"]);
        

      }

    }

  });

})


          /*=============================================
            Activar Empleado
          =============================================*/

$(document).on("click", ".btnActivarEmpleado", function(){

  var idEmpleado = $(this).attr("idEmpleado");
  var estadoEmpleado = $(this).attr("estadoEmpleado");

  var datos = new FormData();
  datos.append("activarId", idEmpleado);
  datos.append("activarEmpleado", estadoEmpleado);

   $.ajax({

        url:"ajax/empleados.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){

          if(window.matchMedia("(max-width:767px)").matches){
    
           swal({
            title: "El empleado ha sido actualizado",
            type: "success",
            confirmButtonText: "¡Cerrar!"
          }).then(function(result) {
            
              if (result.value) {

              window.location = "empleados";

            }

          });

        }

     }

  })


   if(estadoEmpleado == 0){

    $(this).removeClass('btn-success');
    $(this).addClass('btn-danger');
    $(this).html('Desativado');
    $(this).attr('estadoEmpleado', 1);

   }
   else{

    $(this).removeClass('btn-danger');
    $(this).addClass('btn-success');
    $(this).html('Activado');
    $(this).attr('estadoEmpleado', 0);



   }


})



/*================================================
=            Reviasr Empleado repetido            =
================================================*/

$("#nuevoEmpleado").change(function(){

  $(".alert").remove();

  var empleado = $(this).val();
  var datos = new FormData();
    datos.append("validarEmpleado", empleado);

     $.ajax({

          url:"ajax/empleados.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(respuesta){

            if(respuesta){

              $("#nuevoEmpleado").parent().after('<div class="alert alert-warning"> Este Usuario ya existe</div>');
        

              $("#nuevoEmpleado").val("");

           }


         }

     });


   })


     /*=============================================
      ELIMINAR USUARIO
      =============================================*/

    $(document).on("click", ".btnEliminarEmpleado", function(){

      var idEmpleado = $(this).attr("idEmpleado");
      var fotoEmpleado = $(this).attr("fotoEmpleado");
      var usuario = $(this).attr("usuario");


      swal({
        title: '¿Desea eliminar el usuario?',
        text: "¡Puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Si, borrar usuario!'
      }).then(function(result){

        if(result.value){

          window.location = "index.php?ruta=empleados&idEmpleado="+idEmpleado+"&usuario="+usuario+"&fotoEmpleado="+fotoEmpleado;

        }

      })


    })






