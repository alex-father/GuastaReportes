<?php

require_once "../controladores/lugares.controlador.php";
require_once "../modelos/lugares.modelo.php";

class AjaxLugares{

	/*=============================================
	EDITAR lUGARES
	=============================================*/	

	public $idLugar;
	
	public function ajaxEditarLugar(){

		$item = "id";
		$valor = $this->idLugar;

		var_dump($item);

		$respuesta = ControladorLugares::ctrMostrarLugares($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
		EDITAR lUGARES
	=============================================*/
if(isset($_POST["idLugar"])){

	$editar = new AjaxLugares();
	$editar -> idLugar = $_POST["idLugar"];
	$editar -> ajaxEditarLugar();

}