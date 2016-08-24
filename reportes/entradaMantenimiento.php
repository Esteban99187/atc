<?php
	ini_set("display_errors","off");
	error_reporting(0);
	include_once("dompdf/dompdf_config.inc.php");
	if(isset($_GET["nroOrden"]) && isset($_GET["estatus"])){
		$nroOrden = $_GET["nroOrden"];
		$estatus = $_GET["estatus"];
		$tipo_reporte = $_GET["estatus"] == '1' ? "ENTRADA DE UNIDAD" : "DIAGNOSTICO DE UNIDAD";
		require_once("../modelo_alberto/clsMantenimiento.php");
		$objMantenimiento = new clsMantenimiento;
		$datos = $objMantenimiento->buscarOrdenEntrada($nroOrden,$estatus);
	}
$codigo='

<html>
<head>
<style>
	body {
		background-image:url("tico.png");
		background-repeat:no-repeat;
		background-position:center center;
		background-size: 600px 200px;
	}

</style>
</head>
<body>
	

<script type="text/php"> 
        if ( isset($pdf) ) { 
          $font = Font_Metrics::get_font("helvetica", "bold"); 
          $pdf->page_text(260, 765, "pagina: {PAGE_NUM} de {PAGE_COUNT}", $font, 10, array(0,0,0)); 
        } 
</script> 


<img src="2atc.jpg" style="width:100%; height:60px;">
<br>
<br>
<div>
	<table width="100%" align="center">
	<tr>
		<td align="center">
		<center style="font-size:20px; font-weight:bold;"e>
			República Bolivariana de Venezuela<br>
			Ministerio del Poder Popular para Transporte Terrestre <br>
			Almacenes y Transporte Cerealeros<br>
			Acarigua - Estado Portuguesa
		</center>
		</td>
	</tr>
	
	</table>

	<p style="font-size:20px; font-weight:bold;">Fecha:<?php  print(date("d-m-Y"));  ?></p>

	<table style="width:100%;" cellspacing="0">
		<caption style="border:1px solid black; border-bottom:none; font-size:25px; padding:10px 0px; ">Reporte Técnico - Mecánico de Unidades</caption>
		<tr>
			<td>Chofer: </td>
			<td colspan="2"> '.$datos[0]["conductor"].' </td>
			<td></td>
			<td>C.I.:</td>
			<td>'.$datos[0]["id_chofer"].'</td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<td>Nro. Unidad</td>
			<td>'.$datos[0]["idunidad"].'</td>
			<td>Modelo</td>
			<td>'.$datos[0]["modelo"].'</td>
			<td>Placa</td>
			<td>'.$datos[0]["placa"].'</td>
		</tr>		
	</table>';
	$codigo.='<hr />';
	$codigo.='<h2 align="center"> REPORTE '.$tipo_reporte.' </h2>';
	$codigo.='<h3 align="left"> Orden No: '.$datos[0]["idmantenimiento"].' </h3>';
	$codigo.='<h3 align="left"> Fecha de Entrada: '.$datos[0]["fechaentrada"].' </h3>';
	foreach ($datos as $index => $fallas) {
		$codigo.= "<center>".strtoupper($fallas["falla"])." - ".strtoupper($fallas["nombre_repuesto"])." - ".$fallas["cantidad"]."</center><br>";
	}
	$codigo.='<br><br><h4>Nota: '.$datos[0]["observacion"].'</h4>';
	$codigo.='<hr />';
	$codigo.='MECANICO ASIGNADO: '.strtoupper($datos[0]["mecanico"]);
	$codigo.='<hr />';
$codigo.='<center style="position:absolute; aling:center !important; bottom:0; margin-left:50px;">Av. 31 entre calles 32 y 33, edificio rental Municipio Paez, Ciudad Acarigua, Estado Portuguesa</center>
</div>

</body>
</html>
';

$codigo=utf8_decode($codigo);
$dompdf=new DOMPDF();
$dompdf->load_html($codigo);
ini_set("memory_limit","32M");
$dompdf->render();
$dompdf->stream("entradaMovimiento".".pdf",array('Attachment'=>0));


?>
