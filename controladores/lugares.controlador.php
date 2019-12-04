<?php 


class ControladorLugares{


	static public function ctrCrearLugar(){

				if(isset($_POST["nuevoCodigo"])){

					if(preg_match('/^[0-9]+$/', $_POST["nuevoCodigo"]) &&
						preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMunicipio"]) &&
						preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["nuevaUbicacion"])){

						$tabla = "tbl_aldeas";

						$datos = array("codigo" => $_POST["nuevoCodigo"],
										"municipio" => $_POST["nuevoMunicipio"],
										"aldea" => $_POST["nuevaUbicacion"]);

						$respuesta = ModeloLugares::mdlIngresarLugar($tabla, $datos);

						if($respuesta == "ok"){

							echo'<script>

							swal({
								  type: "success",
								  title: "La Ubicacion se guardo correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {

											window.location = "lugares";

											}
										})

							</script>';

						}


					}else{

						echo'<script>

							swal({
								  type: "error",
								  title: "¡La opción no puede ir vacía o llevar caracteres especiales!",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
									if (result.value) {

									window.location = "lugares";

									}
								})

					  	</script>';

					}

				}

			}

			static public function ctrMostrarLugares($item, $valor){

				$tabla = "tbl_aldeas";

				$respuesta = ModeloLugares::mdlMostrarLugares($tabla, $item, $valor);
				
				return $respuesta;


			}


			/*=============================================
				Editar Ubicación
			=============================================*/

	static public function ctrEditarLugar(){

		var_dump($_POST);

		if(isset($_POST["editarCodigo"])){

			if(	preg_match('/^[0-9]+$/', $_POST["editarCodigo"]) && 
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarMunicipio"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["editarUbicacion"])){

				$tabla = "tbl_aldeas";

				$datos = array("codigo"=>$_POST["editarCodigo"],
								"municipio"=>$_POST["editarMunicipio"],
								"aldea"=>$_POST["editarUbicacion"],
								"id"=>$_POST["idMunicipio"]);

				$respuesta = ModeloLugares::mdlEditarLugar($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido actualizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "lugares";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "lugares";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
				Borrar Ubicacion
	=============================================*/

	static public function ctrBorrarLugar(){


		if(isset($_GET["idLugar"])){

			$tabla ="tbl_aldeas";
			$datos = $_GET["idLugar"];

			$respuesta = ModeloLugares::mdlBorrarLugar($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La Ubicacion ha sido eliminada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "lugares";

									}
								})

					</script>';
			}
		}
		
	}

}




