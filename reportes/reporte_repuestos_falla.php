<?php
	include_once("dompdf/dompdf_config.inc.php");	
$codigo='

<?php
	
	include_once("../modelo_alberto/clstdetalle_unidades_repuesto.php");
	$detalle = new clstdetalle_unidades_repuesto();
	$detalle->idmodelo_unidad = $_GET["modelounidad"];
	$datosFalla = $detalle->buscar_repuestos_falla();

		

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

<img src="2atc.jpg" style="width:100%; height:60px;">

<br>
<br>
<table border="1" width="100%" cellspacing="0">
	<caption style="padding:10px; font-size:20px; border:1px solid black; border-bottom:none;">Lista de fallas por modelo de unidad</caption>
	<tr>
			<td>Cod</td>
			<td>Descripcion</td>
			<td>Modelo</td>
	</tr>


	<?php foreach($datosFalla as $midetalle){ ?>
			<tr>
				<td><?php print($midetalle["idfalla"]); ?></td>
				<td><?php print($midetalle["descripcion"]); ?></td>
				<td><?php print($midetalle["desc_mode"]); ?></td>
			</tr>
	<?php } ?>


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


