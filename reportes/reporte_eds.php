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
	
	include_once("../modelo_alberto/clsMantenimiento.php");
	$solicitud = new clsMantenimiento();
	$datosSolicitud = $solicitud->listar_entrada_diagnostico_salida($_GET["tipo"],$_GET["placa"],$_GET["fecha"]);
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
		<caption style=""><?php print($misolicitud["estatus"]); ?></caption>
		<tr>
			<td>Placa Unidad: <?php print($misolicitud["placa"]); ?></td>
			<td>Modelo: <?php print($misolicitud["modelo"]); ?></td>
		</tr>

		<tr>
			<td>Fecha: <?php print($misolicitud["fechaentrada"]); ?></td>
			<td>Chofer: <?php print($misolicitud["id_chofer"]." ".$misolicitud["conductor"]); ?></td>
		</tr>

		<tr>
			<td>Falla: <?php print($misolicitud["falla"]); ?></td>
			<td>Mecanico: <?php print($misolicitud["cedula"]." ".$misolicitud["mecanico"]); ?></td>
		</tr>

		<tr>
			<td>Repuesto: <?php print($misolicitud["repuesto"]); ?></td>
			<td>Cantidad: <?php print($misolicitud["cantidad"]); ?></td>
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

