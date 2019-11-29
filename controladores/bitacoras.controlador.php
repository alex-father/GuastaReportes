<?php

class ControladorBitacoraReportes{


	/*=============================================
			Mostrar las Bitácoras
	=============================================*/

	static public function ctrMostrarBitacoraReportes($item, $valor){
		

		$tabla = "tbl_bitacora";

			$respuesta = ModeloBitacoraReportes::mdlMostrarBitacoraReportes($tabla, $item, $valor);

			return $respuesta;

		}

		/*=============================================
		Crear las Bitácoras por parte de los usuarios
		=============================================*/

	static public function ctrCrearBitacoraReportes(){

		
		if (isset($_POST["nuevoCodigo"])){


					if( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]+$/', $_POST["nuevaDescripcion"]) &&
						preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoriaUsuario"])){


				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   	$ruta = "vistas/img/bitacora/default/anonymous.png";;

			   	if(isset($_FILES["nuevaImagen"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/bitacora/".$_POST["nuevoCodigo"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/bitacora/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaImagen"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/bitacora/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}


		$tabla = "tbl_bitacora";
		
				$datos = array("id_categoria" => $_POST["nuevaCategoriaUsuario"],
							   "codigo_reporte" => $_POST["nuevoCodigo"],
							   "usuario" => $_POST["usuario"],
							   "lugar" => $_POST["nuevoLugar"],
							   "descripcion" => $_POST["nuevaDescripcion"],
							   "imagen" => $ruta);



				$respuesta = ModeloBitacoraReportes::mdlIngresarBitacoraReportes($tabla, $datos);

			}	
		}
	}


		/*=============================================
		Crear las Bitácoras por parte de los empleados
		=============================================*/


static public function ctrCrearBitacoraReportesAdmin(){


		if (isset($_POST["nuevoCodigo"])){

					if( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]+$/', $_POST["nuevaDescripcion"]) &&
						preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){


				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   	$ruta = "vistas/img/bitacora/default/anonymous.png";;

			   	if(isset($_FILES["nuevaImagen"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/bitacora/".$_POST["nuevoCodigo"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/bitacora/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaImagen"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/bitacora/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

		

		$tabla = "tbl_bitacora";
		
				$datos = array("id_categoria" => $_POST["nuevaCategoria"],
							   "codigo_reporte" => $_POST["nuevoCodigo"],
							   "usuario" => $_POST["usuario"],
							   "lugar" => $_POST["nuevoLugar"],
							   "descripcion" => $_POST["nuevaDescripcion"],
							   "imagen" => $ruta);


				$respuesta = ModeloBitacoraReportes::mdlIngresarBitacoraReportes($tabla, $datos);

			}

		}

	}

	
		/*=============================================
				Eliminar las Bitácoras solo Administrador
		=============================================*/
	

	static public function ctrEliminarReporteBitacora(){


		if(isset($_GET["idBitacora"])){

			$tabla ="tbl_bitacora";
			$datos = $_GET["idBitacora"];

			if($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/bitacora/default/anonymous.png"){

				unlink($_GET["imagen"]);

				rmdir('vistas/img/bitacora/'.$_GET["codigo"]);

			}

			$respuesta = ModeloBitacoraReportes::mdlEliminarBitacora($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Reporte ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "bitacora";

								}
							})

				</script>';

			}		
		}

	}

}
