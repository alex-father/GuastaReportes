/*=================================================
=            Cargar la tabla dinamica             =
=================================================*/



$('.tablaReportes').DataTable( {
    "ajax": "ajax/datatable-reportes.ajax.php",
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );

	/*=============================================
	ACTIVANDO EL REPORTE
	=============================================*/


$(document).on("click", ".btnActivarReporte", function(){

  var idReporte = $(this).attr("idReporte");
  var estadoReporte = $(this).attr("estadoReporte");


  var datos = new FormData();
  datos.append("activarId", idReporte);
  datos.append("activarReporte", estadoReporte);

   $.ajax({

        url:"ajax/reportes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){

          if(window.matchMedia("(max-width:1400px)").matches){
    
           swal({
            title: "El reporte ha sido actualizado",
            type: "success",
            confirmButtonText: "¡Cerrar!"
          }).then(function(result) {
            
              if (result.value) {

              window.location = "reporte-admin";

            }

          });

        }

     }


  })


   if(estadoReporte == 0){

    $(this).removeClass('btn-success');
    $(this).addClass('btn-danger');
    $(this).html('Desativado');
    $(this).attr('estadoReporte', 1);

   }
   else{

    $(this).removeClass('btn-danger');
    $(this).addClass('btn-success');
    $(this).html('Activado');
    $(this).attr('estadoReporte', 0);



   }


})

/*=============================================
CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO
=============================================*/
$("#nuevaCategoria").change(function(){

	var idCategoria = $(this).val();

  console.log(idCategoria);

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

      		var nuevoCodigo = idCategoria+"01";
      		$("#nuevoCodigo").val(nuevoCodigo);

      	}else{

      		var nuevoCodigo = Number(respuesta["codigo_reporte"]) + 1;
          	$("#nuevoCodigo").val(nuevoCodigo);

      	}
                
      }

  	})

})


/*=============================================
SUBIENDO LA FOTO DEL PRODUCTO
=============================================*/

$("#nuevaImagen").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaImagen").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevaImagen").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".ver").attr("src", rutaImagen);

  		})

  	}
})

/*=============================================
        EDITAR PRODUCTO
=============================================*/

$(".tablaReportes tbody").on("click", "button.btnEditarReporte", function(){

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

        console.log("respuesta", respuesta);

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

            console.log("respuesta2",respuesta);

            $("#editarCategoria").val(respuesta["id"]);
            $("#editarCategoria").html(respuesta["categoria"]);


          }

        })
          
          $("#editarCodigo").val(respuesta["codigo_reporte"]);
          $("#editarUsuario").val(respuesta["usuario"]);
          $("#editarLugar").val(respuesta["lugar"]);

      }

  })

})

/*=============================================
ELIMINAR PRODUCTO
=============================================*/

