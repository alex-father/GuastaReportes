<?php

require_once "../controladores/reportes.controlador.php";
require_once "../modelos/reportes.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


class TablaReportes{

 	/*=============================================
 	 MOSTRAR LA TABLA DE reportes
  	=============================================*/ 

	public function mostrarTablaReportes(){

		$item = null;
    	$valor = null;

  		$reportes = ControladorReportes::ctrMostrarReportes($item, $valor);	

		
  		$datosJson = '{"data": [';

		  for($i = 0; $i < count($reportes); $i++){

		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/ 

		  	$imagen = "<img src='".$reportes[$i]["imagen"]."' width='40px'>";

		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $reportes[$i]["id_categoria"];

		  	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		  	/*=============================================
 	 		TRAEMOS LOS ESTADOS
  			=============================================*/


		  	if($reportes[$i]["estado"] != 0){

                       $estado = "<button class='btn btn-success btn-xs btnActivarReporte' idReporte='".$reportes[$i]["id"]."' estadoReporte='0'>Activado</button>";

                  }
                    else{

                   $estado = "<button class='btn btn-danger btn-xs btnActivarReporte' idReporte='".$reportes[$i]["id"]."' estadoReporte='1'>Desactivado</button>";

                  }

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

		  	$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarReporte' idReporte='".$reportes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarReporte'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarReporte' idReporte='".$reportes[$i]["id"]."' codigo='".$reportes[$i]["codigo_reporte"]."' imagen='".$reportes[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>";



		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$imagen.'",
			      "'.$reportes[$i]["codigo_reporte"].'",
			      "'.$categorias["categoria"].'",
			      "'.$reportes[$i]["lugar"].'",
			      "'.$reportes[$i]["usuario"].'",
			      "'.$reportes[$i]["descripcion"].'",
			      "'.$estado.'",
			      "'.$reportes[$i]["fecha"].'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	}


}

/*=============================================
ACTIVAR TABLA DE reportes
=============================================*/ 
$activarReportes = new TablaReportes();
$activarReportes -> mostrarTablaReportes();

