<?php


require_once "../controladores/reportes.controlador.php";
require_once "../modelos/reportes.modelo.php";

class AjaxReportes{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idUsuario;
	
	public function ajaxEditarReporte(){

		$item = "id_categoria";
		$valor = $this->idUsuario;

		$respuesta = ControladorReportes::ctrMostrarReportes($item, $valor);

		echo json_encode($respuesta);

	}

	

}

/*=============================================
Editar Reporte
=============================================*/
if(isset($_POST["idReporte"])){

	$editar = new AjaxReportes();
	$editar -> idUsuario = $_POST["idReporte"];
	$editar -> ajaxEditarReporte();

}

