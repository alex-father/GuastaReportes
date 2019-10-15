<?php

class ControladorCrearReportes{


	/*=============================================
			Mostrar Reportes de Usuario
	=============================================*/

	static public function ctrMostrarCrearReportes($item, $valor){
		


		$tabla = "tbl_crear_reporte";


		$respuesta = ModeloCrearReportes::mdlMostrarCrearReportes($tabla, $item, $valor);



		return $respuesta;

	}

	/*=============================================
	CREAR Reportes
	=============================================*/

	static public function ctrCrearReportes(){

	

		
		if(isset($_POST["nuevoReporteCreado"])){

			$item = "usuario";
			$valor = $_POST["usuario"];
			$tabla = "tbl_usuarios";

		


			$usuario = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

			$id_usuario = $usuario["id"];

			

			/*=============================================
			GUARDAR LA COMPRA
			=============================================*/	

			$tabla = "tbl_crear_reporte";

			$datos = array("codigo"=>$_POST["nuevoReporteCreado"],
							"id_usuario"=>$id_usuario,
						   "id_empleado"=>$_POST["idEmpleado"],
						   "categoria"=>$_POST["Categoria"],
						   "lugar"=>$_POST["Ubicacion"],
						   "descripcion"=>$_POST["Descripcion"],
						   "fecha_inicio"=>$_POST["Fecha"]);
			
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

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/

	static public function ctrEditarCrearReportesUsuarios(){

		if(isset($_POST["editarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ., ]+$/', $_POST["editarDescripcion"])){

		   		/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   	$ruta = $_POST["imagenActual"];

			   	if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/reportes/".$_POST["editarCodigo"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/reportes/default/anonymous.png"){

						unlink($_POST["imagenActual"]);

					}else{

						mkdir($directorio, 0755);	
					
					}
					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarImagen"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/reportes/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarImagen"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/reportes/".$_POST["editarCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "tbl_reportes";

				$datos = array("id_categoria" => $_POST["editarCategoria"],
							   "codigo_reporte" => $_POST["editarCodigo"],
							   "usuario" => $_POST["editarUsuario"],
							   "lugar" => $_POST["editarUbicacion"],
							   "descripcion" => $_POST["editarDescripcion"],
							   "imagen" => $ruta);

				$respuesta = ModeloReportesUsuarios::mdlEditarReportesUsuarios($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El reporte ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "reporte-admin";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El reporte no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "reporte-admin";

							}
						})

			  	</script>';
			}
		}

	}

}
