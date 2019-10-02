/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/

$(".nuevafoto").change(function(){

  var imagen = this.files[0];
  
  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

      $(".nuevafoto").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG o PNG!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else if(imagen["size"] > 2000000){

      $(".nuevafoto").val("");

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

        $(".previsualizar").attr("src", rutaImagen);
        

      

      })

    }
})

$(".nuevafoto").on("click", ".btnCerrar", function(){

  var imagen = this.files[0];

  console.log("imagen",imagen);


$("input").val('');

})






/*=============================================
SUBIENDO LA FOTO DEL USUARIO Login
=============================================*/
$(".nuevaFotoLogin").change(function(){

  var imagen = this.files[0];
  
  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

      $(".nuevaFotoLogin").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG o PNG!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else if(imagen["size"] > 2000000){

      $(".nuevaFotoLogin").val("");

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

          /*=============================================
            Editar Usuarios cuando se accione el boton editar
          =============================================*/


$(".tablas").on("click", ".btnEditarUsuario", function(){

  var idUsuario = $(this).attr("idUsuario");
  
  var datos = new FormData();
  datos.append("idUsuario", idUsuario);

  $.ajax({

    url:"ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      
      $("#editarNombre").val(respuesta["nombre"]);
      $("#editarUsuario").val(respuesta["usuario"]);
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
            Activar Usuario
          =============================================*/

$(".btnActivar").change(function(){

  var idUsuario = $(this).attr("idUsuario");
  var estadoUsuario = $(this).attr("estadoUsuario");
  
  var datos = new FormData();
  datos.append("activarId", idUsuario);
  datos.append("activarUsuario", estadoUsuario);

   $.ajax({

        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){

          if(window.matchMedia("(max-width:767px)").matches){
    
           swal({
            title: "El usuario ha sido actualizado",
            type: "success",
            confirmButtonText: "¡Cerrar!"
          }).then(function(result) {
            
              if (result.value) {

              window.location = "usuarios";

            }

          });

        }


     }

  })


   if(estadoUsuario == 0){

    $(this).removeClass('btn-success');
    $(this).addClass('btn-danger');
    $(this).html('Desativado');
    $(this).attr('estadoUsuario', 1);

   }
   else{

    $(this).removeClass('btn-danger');
    $(this).addClass('btn-success');
    $(this).html('Activado');
    $(this).attr('estadoUsuario', 0);



   }


})


/*================================================
=            Reviasr Usuario repetido            =
================================================*/

$("#nuevoUsuario").change(function(){

  $(".alert").remove();

  var usuario = $(this).val();
  var datos = new FormData();
    datos.append("validarUsuario", usuario);

     $.ajax({

          url:"ajax/usuarios.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(respuesta){

            if(respuesta){

              $("#nuevoUsuario").parent().after('<div class="alert alert-warning"> Este Usuario ya existe</div>');
        

              $("#nuevoUsuario").val("");

           }


         }

     });


   })

    /*=============================================
    ELIMINAR USUARIO
    =============================================*/

    $(document).on("click", ".btnEliminarUsuario", function(){

      var idUsuario = $(this).attr("idUsuario");
      var fotoUsuario = $(this).attr("fotoUsuario");
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

          window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

        }

      })


    })




