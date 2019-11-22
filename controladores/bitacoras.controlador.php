<?php

class ControladorBitacoraReportes{


	/*=============================================
			Mostrar Reportes de Usuario
	=============================================*/

	static public function ctrMostrarBitacoraReportes($item, $valor){
		


		$tabla = "tbl_bitacora";

		$respuesta = ModeloBitacoraReportes::mdlMostrarBitacoraReportes($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrCrearBitacoraReportes(){

		

		if (isset($_POST["nuevoCodigo"])){


					if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]+$/', $_POST["nuevaDescripcion"]) &&
						preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoriaUsuario"])){


						/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   	$ruta = "vistas/img/reportes/default/anonymous.png";;

			   	if(isset($_FILES["nuevaImagen"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/reportes/".$_POST["nuevoCodigo"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/reportes/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";

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

						$ruta = "vistas/img/reportes/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";

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


static public function ctrCrearBitacoraReportesAdmin(){

		if (isset($_POST["nuevoCodigo"])){


					if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]+$/', $_POST["nuevaDescripcion"]) &&
						preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){


						/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   	$ruta = "vistas/img/reportes/default/anonymous.png";;

			   	if(isset($_FILES["nuevaImagen"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/reportes/".$_POST["nuevoCodigo"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/reportes/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";

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

						$ruta = "vistas/img/reportes/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";

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

}