<?php

require_once "../controladores/reportes.controlador.php";
require_once "../modelos/reportes.modelo.php";

class AjaxReportes{


	/*=============================================
			Activar Reporte
	=============================================*/	

	public $activarReporte;
	public $activarId;


	public function ajaxActivarReporte(){

		$tabla = "reportes";

		$item1 = "estado";
		$valor1 = $this->activarReporte;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloReportes::mdlActualizarReporte($tabla, $item1, $valor1, $item2, $valor2);

		var_dump($respuesta);

	}

		/*=============================================
				Crear Codigo Reporte
		=============================================*/	

		public $idCategoria;

	public function ajaxCreadCodigoReporte(){

		$item = "id_categoria";
		$valor = $this->idCategoria;

		$respuesta = ControladorReportes::ctrMostrarReportes($item, $valor);

		echo json_encode($respuesta);
		
	}

		/*=============================================
				Editar Reporte
		=============================================*/	


	public $idReporte;

	public function ajaxEditarReporte(){

		$item = "id";
		$valor = $this->idReporte;

		$respuesta = ControladorReportes::ctrMostrarReportes($item, $valor);

		echo json_encode($respuesta);
		
	}


}

		/*=============================================
				Activar Reporte
		=============================================*/	

if(isset($_POST["activarReporte"])){

	$activarReporte = new AjaxReportes();
	$activarReporte -> activarReporte = $_POST["activarReporte"];
	$activarReporte -> activarId = $_POST["activarId"];
	$activarReporte -> ajaxActivarReporte();

}

		/*=============================================
				Activar Reporte
		=============================================*/	

if(isset($_POST["idCategoria"])){

	$activarReporte = new AjaxReportes();
	$activarReporte -> idCategoria = $_POST["idCategoria"];
	$activarReporte -> ajaxCreadCodigoReporte();


		/*=============================================
				Editar Reporte
		=============================================*/	

if(isset($_POST["idReporte"])){

	$editarReporte = new AjaxReportes();
	$editarrReporte -> idReporte = $_POST["idReporte"];
	$editarrReporte -> ajaxEditarReporte();