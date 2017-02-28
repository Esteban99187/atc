<?php
	include_once("dompdf/dompdf_config.inc.php");	
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
	
<?php 
	
	include_once("../modelo_alberto/clstmantenimiento_preventivo.php");
	$solicitud = new clstmantenimiento_preventivo();

	if(!empty($_GET["placa"]) && !empty($_GET["fecha"])){
		$datosSolicitud=$solicitud->listar_reporte_placa_fecha($_GET["placa"],$_GET["fecha"]);
	}else if(!empty($_GET["placa"]) && empty($_GET["fecha"])){
		$datosSolicitud=$solicitud->listar_reporte($_GET["placa"]);
	}else if(empty($_GET["placa"]) && !empty($_GET["fecha"])){
		$datosSolicitud=$solicitud->listar_reporte_fecha($_GET["fecha"]);
	}else{
		$datosSolicitud=$solicitud->listar_reporte_general();
	}
?>


<script type="text/php"> 
        if ( isset($pdf) ) { 
          $font = Font_Metrics::get_font("helvetica", "bold"); 
          $pdf->page_text(260, 765, "pagina: {PAGE_NUM} de {PAGE_COUNT}", $font, 10, array(0,0,0)); 
        } 
</script> 

<img src="2atc.jpg" style="width:100%; height:60px;">
<br>
<br>
<br>
<?php if($datosSolicitud) foreach($datosSolicitud as $misolicitud ){ ?>
	<table style="width:100%;" align="center" border="1" cellspacing="0">
		<caption style="">Mantenimiento Preventivo</caption>
		<tr>
			<td>Fecha Mantenimiento: <?php print($misolicitud["fecha"]); ?></td>
			<td>Placa Unidad: <?php print($misolicitud["placa_unidad"]); ?></td>
		</tr>	

		<tr>
			<td><strong>Kilometraje:</strong> <?php print($misolicitud["kilometraje"]); ?></td>
			<td><strong>Observaciones:</strong> <?php print($misolicitud["observaciones"]); ?></td>
		</tr>

		<tr>
			<td><strong>Nombre:</strong> <?php print($misolicitud["nombre1"]." ".$misolicitud["nombre2"]); ?></td>
			<td><strong>Correo:</strong> <?php print($misolicitud["correo"]); ?></td>
		</tr>
	
	</table>
	<br>
	<br>
<?php } ?>


</body>
</html>

';


$codigo=utf8_decode($codigo);
$dompdf=new DOMPDF();
$dompdf->load_html($codigo);
ini_set("memory_limit","64M");
$dompdf->render();
$dompdf->stream("ejemplo".".pdf",array('Attachment'=>0));
?>

