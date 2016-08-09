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

<script type="text/php"> 
        if ( isset($pdf) ) { 
          $font = Font_Metrics::get_font("helvetica", "bold"); 
          $pdf->page_text(260, 765, "pagina: {PAGE_NUM} de {PAGE_COUNT}", $font, 10, array(0,0,0)); 
        } 
</script> 

<?php
	include_once("../modelo_alberto/clstmantenimiento_correctivo.php");
	$tmantenimiento_correctivo = new clstmantenimiento_correctivo();
	$tmantenimiento_correctivo->idmatenimiento_correctivo = $_GET["nro_solicitud"];
	$tmantenimiento_correctivo->buscar_mantenimiento();
	$rows = $tmantenimiento_correctivo->row();

?>

<img src="2atc.jpg" style="width:100%; height:60px;">
<br>
<br>
<table style="width:100%;" align="center" border="1" cellspacing="0">
	<caption style="padding:10px; font-size:20px; border:1px solid black;">Mantenimiento Correctivo</caption>
	<tr>
			<td colspan="2">Placa:<?php print($rows["placa"]); ?></td>
			<td colspan="2">Falla:<?php print($rows["descripcion"]); ?></td>
			<td colspan="2">Fecha:<?php print(date("Y-m-d")); ?></td>
			<td colspan="2">Estatus:
			<?php 
				if($rows["estatus"]=="1") print("En Espera");
				if($rows["estatus"]=="2") print("Aprobada");
				if($rows["estatus"]=="3") print("Rechazada");
			?>
			</td>
	</tr>
</table>

<br>
<br>
<table style="width:100%;" align="center" border="1" cellspacing="0">
	<caption style="padding:10px; font-size:20px; border:1px solid black;">Lista De Materiales</caption>
	<tr>
		<td>Repuesto</td>
		<td>Actividad</td>
		<td>kilometraje</td>
		<td>Cantidad</td>
		<td>Mecanico</td>
		<td>Fecha</td>
		<td>Nota</td>
		<td>--</td>
	</tr>		

<!--esta es la de la busqueda-->
<?php
	include_once("../modelo_alberto/clstsolicitud_mantenimiento.php");
	$solicitud = new clssolicitud_mantenimiento();
	$solicitud->nro_solicitud = $_GET["nro_solicitud"];
	$solicitud->buscar_solicitud();
	while($misolicitud = $solicitud->row()){	

 ?>


<tr>
 <td>
	<?php print($misolicitud["nombre_repuesto"]); ?>
 </td>

 <td>
	<?php print($misolicitud["actividad"]); ?>
</td>

 <td>
 <?php print($misolicitud["kilometraje"]); ?>
 </td>

 <td>
	<?php print($misolicitud["cantidad"]); ?>
</td>

 <td>
	<?php print($misolicitud["nombre1"]." ".$misolicitud["nombre2"]); ?>
 </td>


<td>
 	<?php print($misolicitud["fecha"]); ?>
</td>

 <td>
	<?php print($misolicitud["nota"]); ?>
 </td>

 <td>
 	--
 </td>
</tr>

<?php } ?>


<!--cierrre de la busqueda-->








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






