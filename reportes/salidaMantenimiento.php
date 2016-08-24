<?php
	ini_set("display_errors","on");
	//error_reporting(0);
	include_once("dompdf/dompdf_config.inc.php");
	if(isset($_GET["nroOrden"])){
		$nroOrden = $_GET["nroOrden"];
		require_once("../modelo_alberto/clsMantenimiento.php");
		$objMantenimiento = new clsMantenimiento;
		$datos = $objMantenimiento->buscarOrdenSalida($nroOrden);
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
		<center style="font-size:20px; font-weight:bold;">
			República Bolivariana de Venezuela<br>
			Alcaldia Bolivariana del Municipio Páez<br>
			Ingenieria Municipal<br>
			Acarigua - Estado Portuguesa
		</center>
		</td>
	</tr>
	
	</table>

	<p style="font-size:20px; font-weight:bold;">Fecha:<?php  print(date("d-m-Y"));  ?></p>

	<table style="width:100%;" cellspacing="0">
		<caption style="border:1px solid black; border-bottom:none; font-size:25px; padding:10px 0px; ">SALIDA PARA VEHICULO</caption>
		<tr>
			<td colspan=3>
				<p aling="justify">Por medio de la presente se les participa al Personal de Seguridad
					destacados en las instalaciones del centro de Mantenimiento Vehicular
					"SIMON BOLIVAR", la salida de la unidad Nro: '.$datos["idunidad"].'
					Modelo:  '.$datos["modelo"].' Placa:  '.$datos["placa"].' la cual esta operativa </p><br>
					<p aling="justify">
					Esta Unidad se encuentra asignada al OTS:  '.$datos["conductor"].'
					C.I. '.$datos["id_chofer"].' ENTRADA CMV: '.$datos["fechaentrada"].'</p>
			</td>
		</tr>
		<tr>
			<td colspan=3><br><td>
		</tr>
		<tr>
			<td>_______________</td>
			<td>_______________</td>
			<td>_______________</td>
		</tr>
		<tr>
			<td>OTS</td>
			<td>TECNICO MANT.</td>
			<td>COORDINADOR DE TALLER</td>
		</tr>
		<tr>
			<td colspan=3><br><br><br><td>
		</tr>
		<tr>
			<td colspan="3" style="border: 1px solid black">Hora de Oficina: '.$datos["horaoficina"].'</td>
		</tr>
		<tr>
			<td colspan="3" style="border: 1px solid black">Hora de Salida de Vigilancia: '.$datos["horavigilancia"].'</td>
		</tr>
		
	</table>

<center style="position:absolute; aling:center !important; bottom:0; margin-left:50px;">Av. 31 entre calles 32 y 33, edificio rental Municipio Paez, Ciudad Acarigua, Estado Portuguesa</center>
</div>
</body>
</html>
';


$codigo=utf8_decode($codigo);
$dompdf=new DOMPDF();
$dompdf->load_html($codigo);
ini_set("memory_limit","32M");
$dompdf->render();
$dompdf->stream("salidaMantenimiento".".pdf",array('Attachment'=>0));


?>
