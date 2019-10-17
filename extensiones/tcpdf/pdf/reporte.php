<?php 

require_once "../../../controladores/crear-reportes.controlador.php";
require_once "../../../modelos/crear-reportes.modelo.php";


class imprimirReporte{

public $codigo;

public function traerImpresionReporte(){

// traemos informacion del reporte final
// 
$item = "codigo";
$valor = $this->codigo;

$respuestareporte = ControladorCrearReportes::ctrMostrarCrearReportes($item, $valor);




require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->startPageGroup();


$pdf->AddPage();


$bloque1 = <<< EOF


<table>
		
		<tr>
			
			<td style="width:150px"><img src="images/logo_muni.jpg"></td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					NIT: 71.759.963-9

					<br>
					Dirección: Calle 44B 92-11

				</div>

			</td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Teléfono: 300 786 52 49
					
					<br>
					ventas@inventorysystem.com

				</div>
				
			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>FACTURA N.<br>$valorVenta</td>

		</tr>

	</table>


EOF;


$pdf->writeHTML($bloque1, false, false, false, false, '');




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