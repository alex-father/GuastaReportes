<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){


		/* preguntamos si la variable viene vacia */

		if ($item != null){

		/* Utilizamos un objeto PDO que es $stmt donde invoca una respuesta a la clase conexion la cual ejecutara el metodo conectar  que luego preparará la sentcia sql*/
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");


		/* enlazamos la conexion con el parametro binParam y colocamos dos puntos, como viene una variable $item lo concatenamos y luego  $valor con el que vamos a comparar en la columna de la BD,el parametro que venga sera de tipo String y no scripts o codigos*/
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		/* Ejecutamo el objeto o la sentencia sql */
		
		$stmt -> execute();

		/* retornamos una sola linea de la table */
		
		return $stmt -> fetch();

	} 
		else

			{
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

				$stmt -> execute();

				return $stmt -> fetchALL();

		}

		$stmt -> close(); 
		
		$stmt -> null;



	}

		


	static public function mdlIngresarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, email, dpi_user, foto, telefono, estado) VALUES (:nombre, :usuario, :password, :perfil, :email, :dpi_user, :foto, :telefono, :estado)");

		$stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"],PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"],PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"],PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"],PDO::PARAM_STR);
		$stmt->bindParam(":dpi_user", $datos["dpi_user"],PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["ruta"],PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"],PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"],PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}else{

			return "error";
		}

		$stmt -> close();

		$stmt -> null;


	}


		/*=============================================
			Editar USUARIO
		=============================================*/


	public function mdlEditarUsuario($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}



	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}



	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}



}