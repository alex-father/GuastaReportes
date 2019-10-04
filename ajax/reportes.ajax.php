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