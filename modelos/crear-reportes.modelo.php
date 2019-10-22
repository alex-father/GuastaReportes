<?php

require_once "conexion.php";

class ModeloCrearReportes{

	/*=============================================
	   Ingresa reporte final a la BD
	=============================================*/

	static public function mdlIngresarReportes($tabla, $datos){
		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, id_usuario, id_empleado, categoria, lugar, descripcion, fecha_inicio) VALUES (:codigo, :id_usuario, :id_empleado, :categoria, :lugar, :descripcion, :fecha_inicio)");

		$stmt->bindParam(":codigo", $datos["codigo"],PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"],PDO::PARAM_STR);
		$stmt->bindParam(":id_empleado", $datos["id_empleado"],PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datos["categoria"],PDO::PARAM_STR);
		$stmt->bindParam(":lugar", $datos["lugar"],PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"],PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"],PDO::PARAM_STR);
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
			Mostrar reportefinal para ver codigo
	=============================================*/

	static public function mdlMostrarCrearReportes($tabla, $item, $valor){


		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id ASC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


			/*=============================================
				Eliminar reporte final
			=============================================*/

	static public function mdlEliminarReporte($tabla, $datos){

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

