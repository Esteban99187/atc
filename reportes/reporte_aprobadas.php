<?php
	include_once("dompdf/dompdf_config.inc.php");
	
	
$codigo='
<?php 
	
	include_once("../modelo/clstdetallesolicitud.php");

	include_once("../modelo/clstsolicitud.php");
	$reporte = new clstsolicitud();
	$tipo = ($_GET["tipo_usuario"]-2);
	$reporte->reporte_aprobadas($_GET["desde"],$_GET["hasta"],$tipo);
	

?>
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



	
<?php while($misolicitud = $reporte->row()){ 

	//traer los materiales que ha pedido la persona
	$detallesolicitud = new clstdetallesolicitud();
	$detallesolicitud->buscar_pedidos_materiales($misolicitud["idsolicitud"]);

?>


<img src="../public/img/cats.jpg" style="width:725px; height:150px;">
<div style="height:700px;">
	<p style=""><center style="margin-left:200px; padding:20px 0px; width:350px !important; font-size:20px; font-weight:bold;">República Bolivariana de Venezuela
		Alcaldia Bolivariana del Municipio Páez
		Ingenieria Municipal
		<br>	
		Acarigua - Estado Portuguea</center></p>

		<p style="font-size:20px; font-weight:bold;">Fecha:<?php  print(date("d-m-Y"));  ?></p>



	<table style="width:100%;" border="1" cellspacing="0">
	<caption style="border:1px solid black; border-bottom:none; font-size:25px; padding:10px 0px; ">Informacion de la solicitud aprobada</caption>


<?php if($misolicitud["cedula"]!=0){ ?>
	<!--datos personales-->
	<tr>
		<td style="padding:8px; background-color:#E3E3E3;font-size:18px;">Datos Personales</td>
		<td></td>
	</tr>
	<tr>
		<td>Idsolicitud: <?php print($misolicitud["idsolicitud"]); ?></td>
		<td>Fecha de solicitud: <?php print($misolicitud["fecha_solicitud"]); ?></td>
	</tr>
	<tr>
		<td>Ci: <?php print($misolicitud["cedula"]); ?></td>
		<td>No. Personal: <?php print($misolicitud["telefono"]); ?></td>
	</tr>
	<tr>
	
		<td>Nombre: <?php print($misolicitud["nombre"]); ?></td>
		<td>Apellidos: <?php print($misolicitud["apellido"]); ?></td>
	</tr>
	<tr>
		<td>Consejo Comunal: <?php print($misolicitud["consejo_comunal"]); ?></td>
		<td>Motivo: <?php print($misolicitud["motivo"]); ?></td>
	</tr>
	<!--los datos  personales de una persona-->

<?php }else{ ?>

	
	<tr>
		<td style="padding:8px; background-color:#E3E3E3;font-size:18px;">Datos de la empresa</td>
		<td></td>
	</tr>
	<tr>
		<td>Idsolicitud: <?php print($misolicitud["idsolicitud"]); ?></td>
		<td>Fecha de solicitud: <?php print($misolicitud["fecha_solicitud"]); ?></td>
	</tr>
	<tr>
		<td>RIF: <?php print($misolicitud["rif_organizacion"]); ?></td>
		<td>Razon Social: <?php print($misolicitud["razon_social"]); ?></td>
	</tr>
	<tr>
		<td>Consejo Comunal: <?php print($misolicitud["consejo_comunal"]); ?></td>
		<td>Motivo: <?php print($misolicitud["motivo"]); ?></td>
	</tr>


<?php } ?>
	
	
	<!--estado de la solicitud-->
	<tr>
		<td style="padding:8px; background-color:#E3E3E3;font-size:18px;">Descripcion de la aprobacion</td>
		<td></td>
	</tr>
	<tr colspan="2">
		<td><?php print($misolicitud["descripcion"]); ?></td>
		<td></td>
	</tr>




	<!--los materiales aprobados-->
	<tr>
		<td style="padding:8px; background-color:#E3E3E3;font-size:18px;">Materiales aprobados</td>
		<td></td>
	</tr>
	<tr>
		<td colspan="2">
			<table width="100%"  cellspacing="0">
				<tr>
					<td>Nombre</td>
					<td>Pedido</td>
				</tr>
				<?php while($midetallesolicitud = $detallesolicitud->row()){  ?>
				<tr>
					<td><?php print($midetallesolicitud["material"]); ?><</td>
					<td><?php print($midetallesolicitud["cantidad"]); ?></td>
				</tr>
				<?php } ?>
			</table>
		</td>
	</tr>
	<!--cierre de los datos de persona contacto-->
</table>

<center style="position:absolute; aling:center !important; bottom:0; margin-left:50px;">Av. 31 entre calles 32 y 33, edificio rental Municipio Paez, Ciudad Acarigua, Estado Portuguesa</center>
</div>
<?php } ?>




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