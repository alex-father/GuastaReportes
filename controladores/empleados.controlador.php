<?php

class ControladorEmpleados{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	 static public function ctrIngresoEmpleado(){



		if(isset($_POST["ingUsuario"])){

			/* usamos preg_match para validar solo caracteres especificos evitando asi catos especiales o sql injecion */

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

			  $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			   	/* Vamos a enviar a la tabla empleados la informacion que sigue  */
			   	
				$tabla = "tbl_empleados";


				/* Vamos a enviar una variable $item para que consulte la columna usuario en la tabla */
				
				$item = "usuario";

				/* el valor que consultara sera el que venga el la variable $_POST que se almacenara en la variable $valor*/
				
				$valor = $_POST["ingUsuario"];

				/* Vamos a solicitar una repuesta del modelo utilizando el metodoMdlMostrarempleados y le enviamos tres parametros */
				$respuesta = ModeloEmpleados::MdlMostrarEmpleados($tabla, $item, $valor);

				/* Comparamos la informacion del usuario que trae $respuesta de la BD*/
				
				if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar){

					/* Si los datos son correctos le decimos que iniciar session ok  */
					
					$_SESSION["iniciarSesion"] = "ok";
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["usuario"] = $respuesta["usuario"];
					$_SESSION["foto"] = $respuesta["foto"];
					$_SESSION["perfil"] = $respuesta["perfil"];



					# -----------  Registrar Fecha para ultimo Login  -----------#
					
						date_default_timezone_set('America/Guatemala');

						$fecha = date('Y-m-d');
						$hora= date('H:i:s');

						$fechaActual = $fecha. ' '.$hora;


						$item1 ="ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "id";
						$valor2 = $respuesta["id"];

						$ultimoLogin = ModeloEmpleados::mdlActualizarEmpleado($tabla, $item1, $valor1, $item2, $valor2);

						if($ultimoLogin == "ok"){

							
					/* hacemos un echo para que nos haga un redireccionamientoa traves de un window location a traves de un javascript*/
					
					echo '<script>

						window.location = "inicio";

						</script>';

					}

				}else{

					
						echo '<br>
							<div class="alert alert-danger">El usuario aún no está activado</div>';

					}		

				}else{

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
				}

			}	

		}

	

		/*=============================================
		INGRESO DE USUARIO
		=============================================*/

	static public function ctrCrearEmpleado(){



		if(isset($_POST["nuevoEmpleado"])){

			if( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEmpleado"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPerfil"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

				
				
				$ruta = "";

					/*=============================================
					=            Validamos Foto           =
					=============================================*/

				if(isset($_FILES["nuevaFotoEmpleado"]["tmp_name"])){


					/*=====  nos permite un nuevo array con los indices que le asignamos  ======*/
					

					list($ancho, $alto) = getimagesize($_FILES["nuevaFotoEmpleado"]["tmp_name"]);


					/*=====  redimensionamos la foto  ======*/

					$nuevoAncho = 500;
					$nuevoAlto = 500;


					/*=============================================
					=            Creamos directorio
								donde guardamos la foto  o la 
								ruta                              =
					=============================================*/

					$directorio = "vistas/img/empleados/".$_POST["nuevoEmpleado"];

					mkdir($directorio, 0755);

						/*=============================================
					=          deacuerdo al tipo de imagen aplicamos funciones    =
						=============================================*/

					if ($_FILES["nuevaFotoEmpleado"]["type"] == "image/jpeg"){

						$aleaorio = mt_rand(100,999);

						$ruta = "vistas/img/empleados/".$_POST["nuevoEmpleado"]."/".$aleaorio.".jpg";

						/*=====  creamos la imagen en un nuevo archivo  ======*/

						$origen = imagecreatefromjpeg($_FILES["nuevaFotoEmpleado"]["tmp_name"]);

						/*=====  destino de donde se guradará la imagen nuevo con las nuevas
									propiedades				  ======*/

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);


						/*===== ajusta la imagen a 500 x 500   ======*/

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);


						/*=====   guarda la foto en la ruta que le asignamos  ======*/

						imagejpeg($destino, $ruta);

					}

						/*=============================================
				=          deacuerdo al tipo de imagen aplicamos funciones    =
					=============================================*/

					if ($_FILES["nuevaFotoEmpleado"]["type"] == "image/png"){

						$aleaorio = mt_rand(100,999);
						$ruta = "vistas/img/empleados/".$_POST["nuevaEmpleado"]."/".$aleaorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFotoEmpleado"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}



				}


					$tabla = "tbl_empleados";

					/*----------  encripatamos la contraseña con una funcion de PHP ----------*/
					

					$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					$datos = array(	"nombre" => $_POST["nuevoNombre"],
									"usuario" => $_POST["nuevoEmpleado"],
									"password" => $encriptar,
									"perfil" => $_POST["nuevoPerfil"],
									"ruta"=> $ruta);

					$respuesta = ModeloEmpleados::mdlIngresarEmpleado($tabla, $datos);

					if($respuesta == "ok"){


						/*----------  si se guarda correctamente  ----------*/
						


					echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "empleados";

						}

					});
				

					</script>';



					}

				}else{

					echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "empleados";

						}

					});
				

				</script>';

				}


			}

		}

		static public function ctrMostrarEmpleados($item, $valor){

			$tabla = "tbl_empleados";

			$respuesta = ModeloEmpleados::MdlMostrarEmpleados($tabla, $item, $valor);

			return $respuesta;
		}


		static public function ctrEditarEmpleado(){



				if (isset($_POST["editarEmpleado"])){

					if( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){


						$ruta = $_POST["fotoActual"];

							if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

								list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

								$nuevoAncho = 500;
								$nuevoAlto = 500;

								/*=============================================
								CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
								=============================================*/

								$directorio = "vistas/img/empleados/".$_POST["editarUsuario"];

									/*=============================================
									PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
									=============================================*/

									if(!empty($_POST["fotoActual"])){

										unlink($_POST["fotoActual"]);

									}else{

										mkdir($directorio, 0755);

									}	

									/*=============================================
									DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
									=============================================*/

									if($_FILES["editarFoto"]["type"] == "image/jpeg"){

									/*=============================================
									GUARDAMOS LA IMAGEN EN EL DIRECTORIO
									=============================================*/

									$aleatorio = mt_rand(100,999);

									$ruta = "vistas/img/empleados/".$_POST["editarEmpleado"]."/".$aleatorio.".jpg";

									$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

									$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

									imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

									imagejpeg($destino, $ruta);

								}

							if($_FILES["editarFoto"]["type"] == "image/png"){

								/*=============================================
								GUARDAMOS LA IMAGEN EN EL DIRECTORIO
								=============================================*/

								$aleatorio = mt_rand(100,999);

								$ruta = "vistas/img/empleados/".$_POST["editarEmpleado"]."/".$aleatorio.".png";

								$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

								$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

								imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

								imagepng($destino, $ruta);

							}

						}


								$tabla = "tbl_empleados";

							if($_POST["editarPassword"] != ""){

								if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

									$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

								}else{

									echo'<script>

											swal({
												  type: "error",
												  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
												  showConfirmButton: true,
												  confirmButtonText: "Cerrar"
												  }).then(function(result){
													if (result.value) {

													window.location = "empleados";

													}
												})

									  	</script>';

								}

							}
							else {

								$encriptar = $_POST["passwordActual"];

								}

								$datos = array("nombre" => $_POST["editarNombre"],
							   "usuario" => $_POST["editarEmpleado"],
							   "password" => $encriptar,
							   "perfil" => $_POST["editarPerfil"],
							   "foto" => $ruta);

								$respuesta = ModeloEmpleados::mdlEditarEmpleado($tabla, $datos);

								if($respuesta == "ok"){

										echo'<script>

										swal({
											  type: "success",
											  title: "El empleado ha sido editado correctamente",
											  showConfirmButton: true,
											  confirmButtonText: "Cerrar"
											  }).then(function(result){
														if (result.value) {

														window.location = "empleados";

														}
													})

										</script>';

									}

								}
								else{

									echo'<script>

										swal({
											  type: "error",
											  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
											  showConfirmButton: true,
											  confirmButtonText: "Cerrar"
											  }).then(function(result){
												if (result.value) {

												window.location = "empleados";

												}
											})

								  	</script>';

								}

						}

					}



		/*=============================================
				BORRAR USUARIO
		=============================================*/

	static public function ctrBorrarEmpleado(){

		if(isset($_GET["idEmpleado"])){

			$tabla ="tbl_empleados";
			$datos = $_GET["idEmpleado"];

			if($_GET["fotoEmpleado"] != ""){

				unlink($_GET["fotoEmpleado"]);
				rmdir('vistas/img/empleados/'.$_GET["usuario"]);

			}

			$respuesta = ModeloEmpleados::mdlBorrarEmpleado($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El empleado ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "empleados";

								}
							})

				</script>';

			}		

		}

	}

}

				

		
	

