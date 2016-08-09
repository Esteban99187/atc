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
	
	include_once("../modelo_alberto/clstmantenimiento.php");
	$solicitud = new clstmantenimiento();
	$solicitud->id_mantenimiento_preventivo = $_GET["codigo"];
	$solicitud->buscar_reporte_mantenimiento();
	$misolicitud = $solicitud->row();

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
<table style="width:100%;" align="center" border="1" cellspacing="0">
	<caption style="padding:10px; font-size:20px; border:1px solid black; border-bottom:none;">Solicitud de mantenimiento preventivo</caption>
	<tr>
		<th colspan="2">Codigo:</th>
		<td colspan="2"><?php print($_GET["codigo"]); ?></td>
	</tr>
	<tr>
		<th colspan="2">Fecha:</th>
		<td colspan="2"><?php print($misolicitud["fecha_mantenimiento"]); ?></td>
	</tr>
	<tr>
		<th>Cedula Chofer:</th>
		<td><?php print($misolicitud["cedula"]); ?></td>
		<th>Nombre:</th>
		<td><?php print($misolicitud["nombre1"]." ".$misolicitud["nombre2"]); ?></td>
	</tr>
	<tr>
		<th>Unidad:</th>
		<td><?php print($misolicitud["placa_unidad"]); ?></td>
		<th>Descripcion:</th>
		<td><?php print($misolicitud["descripcion_mantenimiento"]); ?></td>
	</tr>
	<tr>
		<th>Kilometraje:</th>
		<td><?php print($misolicitud["kilometraje"]."KM"); ?></td>
		<th>Lubricante:</th>
		<td><?php print($misolicitud["lubricante"]); ?></td>
	</tr>
</table>

</body>
</html>



';


$codigo=utf8_decode($codigo);
$dompdf=new DOMPDF();
$dompdf->load_html($codigo);
ini_set("memory_limit","32M");
$dompdf->render();
$dompdf->stream("ejemplo".".pdf",array('Attachment'=>0));
?>


