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

        listarReportes();

     }

 	})


 })


$(".tablaCrearReportes tbody").on("click", "button.btnAgregarReporte", function(){

	var idReporte = $(this).attr("id");
  var categoria = $(this).attr("codigo");

	
	


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
                    
                        '<input type="text" class="form-control xs usuario" id="usuario" name="usuario" value="'+usuario+'" readonly>'+
                  
                   '</div>'+
                
                '</div>'+
                '<div class="form-group">'+
              
                    '<div class="input-group">'+
              
                      '<span class="input-group-addon"><i class="fa fa-map-marker"></i></span> '+

                        '<input type="text" class="form-control ubicacion" name="Ubicacion" id="" value="'+ubicacion+'" readonly>'+

                    '</div>'+

                '</div>'+
                '<div class="form-group">'+
              
                    '<div class="input-group">'+
              
                     '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+ 

                        '<input type="text" class="form-control categoria" name="Categoria"  value="'+categoria+'" readonly>'+

                    '</div>'+

                '</div>'+
                '<div class="form-group">'+
              
                    '<div class="input-group">'+
              
                      '<span class="input-group-addon"><i class="fa fa-calendar"></i></span> '+

                        '<input type="text" class="form-control fecha" name="Fecha"  value="'+fecha+'" readonly>'+
                        
                    '</div>'+

                '</div>'+
                '<div class="form-group">'+
              
                    '<div class="input-group">'+
              
                      '<label for="comment">Descripción:</label>'+

                        '<textarea class="form-control descripcion" rows="6"  name="Descripcion" value="'+descripcion+'" readonly>"'+descripcion+'"</textarea>'+

                    '</div>'+

                '</div>'+

                    '<button type="button" class="btn btn-danger btn-md quitarReporte" idReporte="'+idReporte+'"><i class="fa fa-times"></i></button>'+


                 '</div>'+
                   

              '</div>')


        listarReportes();

			}

		})
  
	
	})



$(".tablaCrearReportes").on("draw.dt", function(){

  if(localStorage.getItem("quitarReporte") != null){

    var listaIdReportes = JSON.parse(localStorage.getItem("quitarReporte"));

    for(var i = 0; i < listaIdReportes.length; i++){

      $("button.btnRecuperarBoton[idReporte='"+listaIdReportes[i]["idReporte"]+"']").removeClass('btn-default');
      $("button.btnRecuperarBoton[idReporte='"+listaIdReportes[i]["idReporte"]+"']").addClass('btn-sucess btnAgregarReporte');


      listarReportes();

    }


  }


})






$(".formularioReporte").on("click", "button.quitarReporte", function(){

$(this).parent().parent().remove();

  var idReporte = $(this).attr("idReporte");

  console.log("boton", idReporte);


  listarReportes()


})

/*====================================================
=            Agregar reportes desde movil            =
====================================================*/


var numeroReporte = 0;

$(".agregarReporte").click(function(){

        numeroReporte ++;

  var datos = new FormData();
  datos.append("traerReportes", "ok");

  $.ajax({

    url:"ajax/reportes.ajax.php",
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
        var categoria = respuesta["id_categoria"];

    $(".nuevoReporte").append( 

              '<div class="box-body">'+

                     '<div class="box">'+

                         '<div class="form-group">'+
                          
                            '<div class="input-group">'+
                            
                              '<span class="input-group-addon "><i class="fa fa-user"></i></span>'+
                            
                                '<input type="text" class="form-control usuario" value=""  name="usuario"  readonly>'+
                          
                           '</div>'+
                        
                        '</div>'+
                        '<div class="form-group">'+
                      
                            '<div class="input-group">'+
                      
                              '<span class="input-group-addon"><i class="fa fa-map-marker"></i></span> '+

                                '<input type="text" class="form-control Ubicacion " value="" name="Ubicacion"  readonly>'+

                            '</div>'+

                        '</div>'+
                        '<div class="form-group">'+ 
                      
                            '<div class="input-group">'+
                      
                             '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+ 

                                '<input type="text" class="form-control Categoria" name="Categoria"    readonly>'+

                            '</div>'+

                        '</div>'+
                        '<div class="form-group">'+
                      
                            '<div class="input-group">'+
                      
                              '<span class="input-group-addon"><i class="fa fa-calendar"></i></span> '+

                                '<input type="text" class="form-control Fecha" name="Fecha"   readonly>'+
                                
                            '</div>'+

                        '</div>'+
                        '<div class="form-group">'+
                      
                            '<div class="input-group">'+
                      
                              '<label for="comment">Descripción:</label>'+

                                '<textarea class="form-control Descripcion" name="Descripcion" rows="6"   readonly></textarea>'+

                            '</div>'+

                        '</div>'+
                        
                      
                            '<div class="input-group">'+
                      
                               '<button type="button" class="btn btn-danger btn-md quitarReporte" idReporte=""><i class="fa fa-times"></i></button>'+
                        

                            '</div>'+
                  
                        

                       
                    
                           '<div class="input-group style="padding:5px 10px">'+
                        
                                   '<select class="form-control nuevoCodigoReporte usuario="'+usuario+'" id="reporte" name="nuevoCodigoReporte" required>'+

                                      '<option>Seleccione el Codigo</option>'+

                            

                        '</div>'+
                        
                    '</div>'+
                      
                 '</div>');
    listarReportes();


     respuesta.forEach(funcionForEach);

    

           function funcionForEach(item, index){

            

              $(".nuevoCodigoReporte").append(

            '<option idReporte="'+item.id+'" value="'+item.id+'">'+item.codigo_reporte+'</option>'


              )

            

         }

         

     

      }


  })

})


/*=============================================
          Seleccionar Reporte
=============================================*/


$(".formularioReporte").on("change", "select.nuevoCodigoReporte", function(){

  var codigoReporte = $(this).val();

    var datos = new FormData();
    datos.append("idReporte", codigoReporte);

    $.ajax({

      url:"ajax/reportes.ajax.php",
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

            console.log("ubicacion", respuesta["lugar"]);

             

            $(".Categoria").val(respuesta["categoria"]);

        


          }

        })

          $(".usuario").val(respuesta["usuario"]);
          $(".Ubicacion").val(respuesta["5"]);
          $(".Descripcion").val(respuesta["descripcion"]);
          $(".Fecha").val(respuesta["fecha"]);

          listarReportes();

        }

      })
})


          function listarReportes(){

            var listarReportes = [];


           var id = $(".nuevoCodigoReporte");

            var usuario = $(".usuario");

            var categoria = $(".categoria");

            var lugar = $(".ubicacion");

            var descripcion = $(".descripcion");

            var fecha = $(".fecha");



                        listarReportes.push({ 
                                              "usuario":$(usuario).val(),
                                              "categoria":$(categoria).val(),
                                              "lugar":$(lugar).val(),
                                              "descripcion":$(descripcion).val(),
                                              "fecha":$(fecha).val()

                                              })  

                     

                          $("#listarReportes").val(JSON.stringify(listarReportes)); 

            
          }