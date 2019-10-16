<?php


require_once "../controladores/reportes.controlador.php";
require_once "../modelos/reportes.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxReportes{


	public $activarReportes;
	public $activarId;


	public function ajaxActivarReportes(){

		$tabla = "tbl_reportes";

		$item1 = "estado";
		$valor1 = $this->activarReporte;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloReportes::mdlActualizarReporte($tabla, $item1, $valor1, $item2, $valor2);

		echo json_encode($respuesta);
	}



/*=============================================
=            Editar Reportes            =
=============================================*/


	public $idReporte;
	
	public function ajaxEditarReporte(){

		$item = "id";
		$valor = $this->idReporte;

		$respuesta = ControladorReportes::ctrMostrarReportes($item, $valor);

		echo json_encode($respuesta);

	}
/*=============================================
=          Traer Reportes         =
=============================================*/

public $traerReporte;
	
	public function ajaxTraerReportes(){

		if($this->traerReporte == "ok"){

		$item = null;
		$valor = null;

		$respuesta = ControladorReportes::ctrMostrarReportes($item, $valor);

		echo json_encode($respuesta);

		}
		  else{

		$item = "id";
		$valor = $this->traerReporte;

		$respuesta = ControladorReportes::ctrMostrarReportes($item, $valor);

		echo json_encode($respuesta);

	}

}



	public $idCategoria;
	
	public function ajaxCrearCodigo(){

		$item = "id_categoria";
		$valor = $this->idCategoria;

		$respuesta = ControladorReportes::ctrMostrarReportes($item, $valor);

		echo json_encode($respuesta);

	}

	

}

/*=============================================
Editar Reporte
=============================================*/
if(isset($_POST["idReporte"])){

	$editar = new AjaxReportes();
	$editar -> idReporte = $_POST["idReporte"];
	$editar -> ajaxEditarReporte();

}

/*=============================================
activar reportes
=============================================*/	

if(isset($_POST["activarReporte"])){

	$activarEmpleado = new AjaxReportes();
	$activarEmpleado -> activarReporte = $_POST["activarReporte"];
	$activarEmpleado -> activarId = $_POST["activarId"];
	$activarEmpleado -> ajaxActivarReportes();

}

/*=============================================
 Crear numero de codigo
=============================================*/
if(isset($_POST["idCategoria"])){

	$editar = new AjaxReportes();
	$editar -> idCategoria = $_POST["idCategoria"];
	$editar -> ajaxCrearCodigo();

}

/*=============================================
   Traer Reportes
=============================================*/
if(isset($_POST["traerReportes"])){

	$traerReporte = new AjaxReportes();
	$traerReporte -> traerReporte = $_POST["traerReportes"];
	$traerReporte -> ajaxTraerReportes();

}




