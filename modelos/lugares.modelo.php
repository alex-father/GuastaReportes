<?php 

		require_once "conexion.php";

	class ModeloLugares{


		static public function mdlIngresarLugar($tabla, $datos){


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, municipio, aldea) VALUES (:codigo, :municipio, :aldea)");

		$stmt->bindParam(":codigo", $datos["codigo"],PDO::PARAM_STR);
		$stmt->bindParam(":municipio", $datos["municipio"],PDO::PARAM_STR);
		$stmt->bindParam(":aldea", $datos["aldea"],PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}else{

			return "error";
		}

		$stmt -> close();

		$stmt -> null;


		}




		/*=============================================
			Mostrar Lugares
		=============================================*/

	static public function mdlMostrarLugares($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
				Editar Lugares
	=============================================*/

	static public function mdlEditarLugar($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo = :codigo, municipio = :municipio, aldea = :aldea WHERE id = :id");

		$stmt -> bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt -> bindParam(":municipio", $datos["municipio"], PDO::PARAM_STR);
		$stmt -> bindParam(":aldea", $datos["aldea"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
			Borrar Lugares
	=============================================*/

	static public function mdlBorrarCategoria($tabla, $datos){

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





