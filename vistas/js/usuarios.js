/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevaFotoUsuario").change(function(){

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

    }else if(imagen["size"] > 8000000){

      $(".nuevaFoto").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen no debe pesar más de 8MB!",
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

    }else if(imagen["size"] > 8000000){

      $(".nuevaFotoLogin").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen no debe pesar más de 8MB!",
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
            este es de usuarios.php
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

        $(".visualizar").attr("src", respuesta["foto"]);
        

      }

    }

  });

})

         /*=============================================
            Activar Usuario
          =============================================*/

$(".tablas").on("click", ".btnActivar", function(){

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


          if(window.matchMedia("(max-width:1400px)").matches){

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
      $(this).html('Desactivado');
      $(this).attr('estadoUsuario',1);

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Activado');
      $(this).attr('estadoUsuario',0);

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

    /*===================================
    =            Validad DPI            =
    ===================================*/
    
    function cuiIsValid(cui) {

    var console = window.console;

    if (!cui) {
        console.log("CUI vacío");
        return true;
    }

    var cuiRegExp = /^[0-9]{4}\s?[0-9]{5}\s?[0-9]{4}$/;

    if (!cuiRegExp.test(cui)) {

        console.log("CUI con formato inválido");

        return false;
    }

    cui = cui.replace(/\s/, '');
    var depto = parseInt(cui.substring(9, 11), 10);
    var muni = parseInt(cui.substring(11, 13));
    var numero = cui.substring(0, 8);
    var verificador = parseInt(cui.substring(8, 9));
    
    // Se asume que la codificación de Municipios y 
    // departamentos es la misma que esta publicada en 
    // http://goo.gl/EsxN1a

    // Listado de municipios actualizado segun:
    // http://goo.gl/QLNglm

    // Este listado contiene la cantidad de municipios
    // existentes en cada departamento para poder 
    // determinar el código máximo aceptado por cada 
    // uno de los departamentos.
    var munisPorDepto = [ 
        /* 01 - Guatemala tiene:      */ 17 /* municipios. */, 
        /* 02 - El Progreso tiene:    */  8 /* municipios. */, 
        /* 03 - Sacatepéquez tiene:   */ 16 /* municipios. */, 
        /* 04 - Chimaltenango tiene:  */ 16 /* municipios. */, 
        /* 05 - Escuintla tiene:      */ 13 /* municipios. */, 
        /* 06 - Santa Rosa tiene:     */ 14 /* municipios. */, 
        /* 07 - Sololá tiene:         */ 19 /* municipios. */, 
        /* 08 - Totonicapán tiene:    */  8 /* municipios. */, 
        /* 09 - Quetzaltenango tiene: */ 24 /* municipios. */, 
        /* 10 - Suchitepéquez tiene:  */ 21 /* municipios. */, 
        /* 11 - Retalhuleu tiene:     */  9 /* municipios. */, 
        /* 12 - San Marcos tiene:     */ 30 /* municipios. */, 
        /* 13 - Huehuetenango tiene:  */ 32 /* municipios. */, 
        /* 14 - Quiché tiene:         */ 21 /* municipios. */, 
        /* 15 - Baja Verapaz tiene:   */  8 /* municipios. */, 
        /* 16 - Alta Verapaz tiene:   */ 17 /* municipios. */, 
        /* 17 - Petén tiene:          */ 14 /* municipios. */, 
        /* 18 - Izabal tiene:         */  5 /* municipios. */, 
        /* 19 - Zacapa tiene:         */ 11 /* municipios. */, 
        /* 20 - Chiquimula tiene:     */ 11 /* municipios. */, 
        /* 21 - Jalapa tiene:         */  7 /* municipios. */, 
        /* 22 - Jutiapa tiene:        */ 17 /* municipios. */ 
    ];
    
    if (depto === 0 || muni === 0)

    {
        console.log("CUI con código de municipio o departamento inválido.");
        return false;
    }
    
    if (depto > munisPorDepto.length)
    {
        console.log("CUI con código de departamento inválido.");
        return false;
    }
    
    if (muni > munisPorDepto[depto -1])
    {
        console.log("CUI con código de municipio inválido.");
        return false;
    }
    
    // Se verifica el correlativo con base 
    // en el algoritmo del complemento 11.
    var total = 0;
    
    for (var i = 0; i < numero.length; i++)
    {
        total += numero[i] * (i + 2);
    }
    
    var modulo = (total % 11);
    
    console.log("CUI con módulo: " + modulo);

    return modulo === verificador;
}

$('#cui').bind('change paste keyup', function (e) {
    var $this = $(this);
    var $parent = $this.parent();
    var $next = $this.next();
    var cui = $this.val();

    if (cui && cuiIsValid(cui)) {
        $parent.addClass('has-success');
        $next.addClass('glyphicon-ok');
        $parent.removeClass('has-error');
        $next.removeClass('glyphicon-remove');
        
    } else if (cui) {
        $parent.addClass('has-error');
        $next.addClass('glyphicon-remove');
        $parent.removeClass('has-success');
        $next.removeClass('glyphicon-ok');

    } else {
        $parent.removeClass('has-error');
        $next.removeClass('glyphicon-remove');
        $parent.removeClass('has-success');
        $next.removeClass('glyphicon-ok');
    }
});
    
    




