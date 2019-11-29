<?php

require_once "conexion.php";

class ModeloBitacoraReportes{


			/*=============================================
					Mostrar solo los del Usuario
			=============================================*/

	static public function mdlMostrarBitacoraReportes($tabla, $item, $valor){

		if($valor == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

			$stmt -> execute();



			return $stmt -> fetchALL();

		

		$stmt -> close();

		$stmt = null;

	}
}


static public function mdlIngresarBitacoraReportes($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, codigo_reporte, usuario, lugar, descripcion, imagen) VALUES (:id_categoria, :codigo_reporte, :usuario, :lugar, :descripcion, :imagen)");

		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo_reporte", $datos["codigo_reporte"], PDO::PARAM_STR);
		
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}



	static public function mdlEliminarBitacora($tabla, $datos){

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