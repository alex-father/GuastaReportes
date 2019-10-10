/*=============================================
=    Cargar la Tabla dinámica de reportes          =
=============================================*/



$('.tablaCrearReportes').DataTable( {
    "ajax": "ajax/datatable-crear-reportes.ajax.php",
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


$(document).on("click", ".btnActivarCrearReporte", function(){

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

              window.location = "crear-reporte";

            }

          });

        }

     }

 	})


 })


$(".tablaCrearReportes tbody").on("click", "button.btnAgregarReporte", function(){

	var idReporte = $(this).attr("id");
  var categoria = $(this).attr("codigo");


	console.log("respuesta", categoria);

	$(this).removeClass("btn-success btnAgregarReporte");
	$(this).addClass("btn-default");


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

     

        var ubicacion = respuesta["lugar"];
        var fecha = respuesta["fecha"];
        var usuario = respuesta["usuario"];
        var descripcion = respuesta["descripcion"];

        $(".nuevoReporte").append( 


         		 '<div class="box-body">'+
         		 '<div class="box">'+

                 '<div class="form-group">'+
                  
                    '<div class="input-group">'+
                    
                      '<span class="input-group-addon "><i class="fa fa-user"></i></span>'+
                    
                        '<input type="text" class="form-control xs" id="Usuario" name="Usuario" value="'+usuario+'" readonly>'+
                  
                   '</div>'+
                
                '</div>'+
                '<div class="form-group">'+
              
                    '<div class="input-group">'+
              
                      '<span class="input-group-addon"><i class="fa fa-map-marker"></i></span> '+

                        '<input type="text" class="form-control" name="" id="" value="'+ubicacion+'" readonly>'+

                    '</div>'+

                '</div>'+
                '<div class="form-group">'+
              
                    '<div class="input-group">'+
              
                      '<span class="input-group-addon"><i class="fa fa-comments"></i></span>'+

                        '<input type="text" class="form-control" name="" id="" value="'+descripcion+'" readonly>'+

                    '</div>'+

                '</div>'+
                '<div class="form-group">'+
              
                    '<div class="input-group">'+
              
                     '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+ 

                        '<input type="text" class="form-control" name="" id=""  value="'+categoria+'" readonly>'+

                    '</div>'+

                '</div>'+
                '<div class="form-group">'+
              
                    '<div class="input-group">'+
              
                      '<span class="input-group-addon"><i class="fa fa-calendar"></i></span> '+

                        '<input type="text" class="form-control" name="" id="" value="'+fecha+'" readonly>'+

                    '</div>'+

                    '</div>'+

                 '</div>'+
                   

              '</div>'

                 
                 )

			}

		})
  
	
	})