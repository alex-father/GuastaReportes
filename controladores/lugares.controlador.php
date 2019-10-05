<?php 


class ControladorLugares{

	static public function ctrCrearLugar(){

				if(isset($_POST["nuevoCodigo"])){

					if(preg_match('/^[0-9]+$/', $_POST["nuevoCodigo"]) &&
						preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMunicipio"]) &&
						preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoLugar"])){

						$tabla = "aldeas";

						$datos = array("codigo" => $_POST["nuevoCodigo"],
										"municipio" => $_POST["nuevoMunicipio"],
										"aldea" => $_POST["nuevoLugar"]);

						$respuesta = ModeloLugares::mdlIngresarLugar($tabla, $datos);



						if($respuesta == "ok"){

							echo'<script>

							swal({
								  type: "success",
								  title: "Ha sido guardada correctamente",
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

				$tabla = "aldeas";

				$respuesta = ModeloLugares::mdlMostrarLugares($tabla, $item, $valor);
				
				return $respuesta;


			}
		}




