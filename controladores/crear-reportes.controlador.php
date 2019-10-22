<?php

class ControladorCrearReportes{


	/*=============================================
		Mostrar Reportes finales para verificar codigo
	=============================================*/

	static public function ctrMostrarCrearReportes($item, $valor){
		

		$tabla = "tbl_reportefinal";


		$respuesta = ModeloCrearReportes::mdlMostrarCrearReportes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
		Crear reportes finales desde crear-reporte
	=============================================*/

	static public function ctrCrearReportes(){


		if(isset($_POST["nuevoReporteCreado"]) &&
					($_POST["usuario"]) && 
					($_POST["Ubicacion"]) &&
					($_POST["Categoria"]) &&
					($_POST["Descripcion"]) &&
					($_POST["Fecha"])){

					$item = "usuario";
				    $valor = $_POST["usuario"];

				    $ubicacion = $_POST["Ubicacion"];
					$categoria = $_POST["Categoria"];
					$descripcion = $_POST["Descripcion"];
					$fecha = $_POST["Fecha"];


			   		 $respuestaid = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

			    

			    if ($respuestaid != null){

			    	$id_usuario = $respuestaid["id"];
			    	$tabla = "tbl_reportefinal";

					$datos = array("codigo"=>$_POST["nuevoReporteCreado"],
									"id_usuario"=>$id_usuario,
								   "id_empleado"=>$_POST["idEmpleado"],
								   "categoria"=>$categoria,
								   "lugar"=>$ubicacion,
								   "descripcion"=>$descripcion,
								   "fecha_inicio"=>$fecha);

					
					$respuesta = ModeloCrearReportes::mdlIngresarReportes($tabla, $datos);

					if($respuesta == "ok"){

							echo'<script>

							swal({
								  type: "success",
								  title: "El reporte ha sido creado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then((result) => {
											if (result.value) {

											window.location = "reportes";

											}
										});

										</script>';

						}else{

							echo'<script>

							swal({
								  type: "success",
								  title: "El reporte no se guardo",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then((result) => {
											if (result.value) {

											window.location = "crear-reporte";

											}
										}); 

								</script>';

						}

			    
					}else{

					$respuestaid = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
			
					$id_usuario = $respuestaid["id"];
					$tabla = "tbl_reportefinal";

							$datos = array("codigo"=>$_POST["nuevoReporteCreado"],
											"id_usuario"=>$id_usuario,
										   "id_empleado"=>$_POST["idEmpleado"],
										   "categoria"=>$categoria,
										   "lugar"=>$ubicacion,
										   "descripcion"=>$descripcion,
										   "fecha_inicio"=>$fecha);

					$respuesta = ModeloCrearReportes::mdlIngresarReportes($tabla, $datos);

				
					if($respuesta == "ok"){

							echo'<script>

							swal({
								  type: "success",
								  title: "El reporte ha sido creado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then((result) => {
											if (result.value) {

											window.location = "reportes";

											}
										});

										</script>';

						}else{

							echo'<script>

							swal({
								  type: "success",
								  title: "El reporte no se guardo",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then((result) => {
											if (result.value) {

											window.location = "crear-reporte";

											}
										}); 

								</script>';

						}

			}

		}

	}

	

	/*=============================================
			Eliminar reporte final
	=============================================*/

	static public function ctrEliminarReporteFinal(){

		var_dump($_GET);

		if(isset($_GET["codigoReporte"])){

			$tabla = "tbl_reportefinal";

			$datos = $_GET["codigoReporte"];

			
			$respuesta = ModeloCrearReportes::mdlEliminarReporte($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Reporte final ha sido borrado",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "reportes";

								}
							})

				</script>';

			}		
		}

	}



	/*=============================================
	Mostrar todos los reportes finales por la fecha
	=============================================*/	

	static public function ctrMostrarRangoFechasReportes($fechaInicial, $fechaFinal){

		$tabla = "tbl_reportefinal";

		$respuesta = ModeloReportes::mdlRangoFechasReportes($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
	}

}
