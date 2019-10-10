<?php

require_once "../controladores/reportes.controlador.php";
require_once "../modelos/reportes.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


class TablaCrearReportes{

 	/*=============================================
 	 MOSTRAR LA TABLA DE reportes
  	=============================================*/ 

	public function mostrarTablaCrearReportes(){

		$item = null;
    	$valor = null;

  		$reportes = ControladorReportes::ctrMostrarReportes($item, $valor);	

		
  		$datosJson = '{"data": [';

		  for($i = 0; $i < count($reportes); $i++){

		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/ 

		  	$imagen = "<a href='".$reportes[$i]["imagen"]."' download><img src='".$reportes[$i]["imagen"]."' width='100' height='120'></a>";


		  	$item = "id";
		  	$valor = $reportes[$i]["id_categoria"];

		  	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);


		  	/*=============================================
 	 		TRAEMOS LOS ESTADOS
  			=============================================*/


		  	if($reportes[$i]["estado"] != 0){

                       $estado = "<button class='btn btn-success btn-xs btnActivarCrearReporte' idReporte='".$reportes[$i]["id"]."' estadoReporte='0'>Activado</button>";

                  }
                    else{

                   $estado = "<button class='btn btn-danger btn-xs btnActivarCrearReporte' idReporte='".$reportes[$i]["id"]."'  estadoReporte='1'>Desactivado</button>";

                  }


		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

		  	$botones =  "<div class='btn-group'><button class='btn btn-success btnAgregarReporte btnRecuperarBoton' codigo='".$categorias["categoria"]."' id='".$reportes[$i]["id"]."'>Agregar</button></div>";




		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$imagen.'",
			      "'.$reportes[$i]["lugar"].'",
			      "'.$reportes[$i]["codigo_reporte"].'",
			      "'.$reportes[$i]["usuario"].'",
			      "'.$estado.'",
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
$activarCrearReportes = new TablaCrearReportes();
$activarCrearReportes -> mostrarTablaCrearReportes();