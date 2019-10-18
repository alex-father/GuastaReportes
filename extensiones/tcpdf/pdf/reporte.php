<?php 

require_once "../../../controladores/crear-reportes.controlador.php";
require_once "../../../modelos/crear-reportes.modelo.php";

require_once "../../../controladores/empleados.controlador.php";
require_once "../../../modelos/empleados.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

class imprimirReporte{

public $codigo;

public function traerImpresionReporte(){

// traemos informacion del reporte final
// 
$item = "codigo";
$valor = $this->codigo;

$respuestareporte = ControladorCrearReportes::ctrMostrarCrearReportes($item, $valor);


$itemEmpleado = "id";
$id_empleado = $respuestareporte["id_empleado"];

$respuestaEmpleado = ControladorEmpleados::ctrMostrarEmpleados($itemEmpleado, $id_empleado);


$itemUsuario = "id";
$idusuario = $respuestareporte["id_usuario"];

$respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $idusuario);

if($respuestaUsuario == false){

	$nombreUsuario = $respuestaEmpleado["nombre"];
}else{

	$nombreUsuario = $respuestaUsuario["nombre"];

}


$nombreEmpleado = $respuestaEmpleado["nombre"];

$telefono = $respuestaUsuario["telefono"];
$ubicacion = $respuestareporte["lugar"];
$descripcion = $respuestareporte["descripcion"];
$fecha = substr($respuestareporte["fecha_inicio"],0,-8);
$fechacreado = substr($respuestareporte["fecha"],0,-8);




require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->startPageGroup();


$pdf->AddPage();


$bloque1 = <<< EOF


<table>
		
		<tr>
			<br>
			<td style="width:150px"><img src="images/logo_muni1.png"></td>

			<td style="background-color:white; width:280x">
				
				<div style="font-size:8.5px; text-align:center; line-height:8px;">
					
					
					<h1> Reporte de Incidente</h1>


				</div>

			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br>REPORTE No.<br>$valor</td>

		</tr>

	</table>


EOF;


$pdf->writeHTML($bloque1, false, false, false, false, '');


$bloque2 = <<< EOF

			<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px">

				<h3>Reporte creado por: $nombreEmpleado</h3>

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
			
				<h3>Fecha: $fechacreado</h3>

			</td>

		</tr>

			<tr>
		
				<td style="border: 1px solid #666; background-color:white; width:540px"><h3>Usuario: $nombreUsuario</h3>

				</td>

			</tr>
			<tr>

		
				<td style="border-bottom: 1px solid #666; background-color:white; width:540px">

				</td>

		
			</tr>

	</table>


EOF;


$pdf->writeHTML($bloque2, false, false, false, false, '');


$bloque3 = <<< EOF
		
		<table>
			
			<tr>
				
				<td style="width:540px"><img src="images/backFact2.jpg"></td>
			
			</tr>

		</table>
		

		<table>

			<div>

				<td style="border: 1px solid #666; background-color:white; width:390px">

					<h4>Número de telefono: $telefono </h4>

				</td>

			</div>

			<div>

				<td style="border: 1px solid #666; background-color:white; width:390px">

					<h4>Ubicacion del incidente: $ubicacion </h4>

				</td>

			</div>
			<div>

				<td style="border: 1px solid #666; background-color:white; width:390px">

					<h4>Fecha del Incidente: $fecha </h4>

				</td>

			</div>
			<div>

				<td style="border: 1px solid #666; background-color:white; width:390px">

					<h4>Fecha de solución: _______/______/______ </h4>

				</td>

			</div>

			<div>

				<td style="border: 1px solid #666; background-color:white; width:390px">


					<h4>Descripción del reporte:</h4>
					<p>$descripcion</p>

				</td>

			</div>



		</table>

		



EOF;


$pdf->writeHTML($bloque3, false, false, false, false, '');


$bloque4 = <<< EOF

		<table>
			
			<tr>
				
				<td style="width:540px"><img src="images/backFact2.jpg"></td>
			
			</tr>

		</table>

		<table>

			<tr>

				<div>


						<td style="border: 1px solid #666; background-color:white; width:390px">

								<h4>Nombre del técnico:  ______________________________</h4>

						</td>

				</div>

				<div>


						<td style="border: 1px solid #666; background-color:white; width:540px">

								<h4>Observaciones:  ________________________________________________________________
								<br><br>______________________________________________________________________________
								<br><br>______________________________________________________________________________</h4>

						</td>

				</div>

			</tr>

		</table>



EOF;


$pdf->writeHTML($bloque4, false, false, false, false, '');


 // Salida del Archivo PDF
 // 
ob_end_clean();
$pdf->Output('pdf.pdf', 'I');

}

}


$reporte = new imprimirReporte();
$reporte -> codigo = $_GET["codigo"];
$reporte ->traerImpresionReporte();





 ?>