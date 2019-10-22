<?php

require_once "../controladores/empleados.controlador.php";
require_once "../modelos/empleados.modelo.php";

class AjaxEmpleados{

	/*=============================================
		Editar Empleado
	=============================================*/	

	public $idEmpleado;

	public function ajaxEditarEmpleado(){
		

		$item = "id";
		$valor = $this->idEmpleado;

		$respuesta = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
			Activar empleado
	=============================================*/	

	public $activarEmpleado;
	public $activarId;


	public function ajaxActivarEmpleado(){

		$tabla = "tbl_empleados";

		$item1 = "estado";
		$valor1 = $this->activarEmpleado;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloEmpleados::mdlActualizarEmpleado($tabla, $item1, $valor1, $item2, $valor2);



	}

	/*=============================================
		Validar no repetir Empleado
	=============================================*/	

	public $validarEmpleado;

	public function ajaxValidarEmpleado(){

		$item = "usuario";
		$valor = $this->validarEmpleado;

		$respuesta = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
		Editar Empleado
=============================================*/
if(isset($_POST["idEmpleado"])){

	$editar = new AjaxEmpleados();
	$editar -> idEmpleado = $_POST["idEmpleado"];
	$editar -> ajaxEditarEmpleado();

}

/*=============================================
		ACTIVAR Empleado
=============================================*/	

if(isset($_POST["activarId"])){

	$activarEmpleado = new AjaxEmpleados();
	$activarEmpleado -> activarEmpleado = $_POST["activarEmpleado"];
	$activarEmpleado -> activarId = $_POST["activarId"];
	$activarEmpleado -> ajaxActivarEmpleado();

}

/*=============================================
		VALIDAR NO REPETIR Empleado
=============================================*/

if(isset( $_POST["validarEmpleado"])){

	$valEmpleado = new AjaxEmpleados();
	$valEmpleado -> validarEmpleado = $_POST["validarEmpleado"];
	$valEmpleado -> ajaxValidarEmpleado();

}