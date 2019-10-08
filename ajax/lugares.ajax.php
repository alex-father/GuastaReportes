<?php


require_once "../controladores/lugares.controlador.php";
require_once "../modelos/lugares.modelo.php";

require_once "../controladores/reportes.controlador.php";
require_once "../modelos/reportes.modelo.php";



class AjaxLugares{

	public $idLugar;
	
	public function ajaxEditarLugar(){

		$item = "id";
		$valor = $this->idLugar;

		$respuesta = ControladorLugares::ctrMostrarLugares($item, $valor);

		echo json_encode($respuesta);

	}

	

}

/*=============================================
Editar Reporte
=============================================*/
if(isset($_POST["idLugar"])){

	$editar = new AjaxLugares();
	$editar -> idLugar = $_POST["idLugar"];
	$editar -> ajaxEditarLugar();

}



