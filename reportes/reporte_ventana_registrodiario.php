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
	
	//nos traeremos el modelo de repuesto de la unidad
	include_once("../modelo_alberto/clstunidad.php");
	$unidad = new clstunidad();
	$unidad->placa_unidad = $_GET["placa_unidad"];
	
	$miunidad = $unidad->buscar();
	
	//esto sera solo para buscar el modelo de la unidad

	//ahora traeremos los lubricantes / repuestos de la unidad elegida
	include_once("../modelo_alberto/clstdetalle_unidades_repuesto.php");
	$unidades_repuesto = new clstdetalle_unidades_repuesto();
	$unidades_repuesto->idmodelo_unidad = $miunidad["idmodelo_unidad"];
	$datos = $unidades_repuesto->buscar_lubricantes();
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
	<caption style="padding:10px; font-size:20px; border:1px solid black;">Reporte Ventana Registro Diario</caption>
		<tr>
			<td colspan="2">Placa:<?php print($_GET["placa_unidad"]); ?></td>
			<td colspan="3">Chofer:<?php print($_GET["chofer"]); ?></td>
			<td colspan="2">Fecha:<?php print($_GET["fecha"]); ?></td>
		</tr>
		<tr>
			<td>Lubricante</td>
			<td>Cantidad</td>
			<td>KI-minimo</td>
			<td>KI-maximo</td>
			<td>KI-Actual</td>
			<td>Nota</td>
			<td></td>
		</tr>
<?php if($datos) foreach($datos as $misrepuestos){ ?>
		<tr>
			<td><?php print($misrepuestos["nombre_repuesto"]); ?></td>
			<td><?php print($misrepuestos["cantidad"]); ?></td>
			<td><?php print($misrepuestos["kmin"]); ?></td>
			<td><?php print($misrepuestos["kmax"]); ?></td>
			<!--hacemos una pausa aqui en kilometraje-->
					<!--en este campo es en donde traeremos el dato -->
				<?php
						
					//esto solo sera para buscar el estatus del kilometraje
						include_once("../modelo_alberto/clsdetalle_registro_diario.php");
						$detalle_registro_diario = new clsdetalle_registro_diario();
						$detalle_registro_diario->placa_unidad = $_GET["placa_unidad"];
						$detalle_registro_diario->idmodelo_unidad = $misrepuestos["idmodelo_unidad"];
						$detalle_registro_diario->id_repuesto = $misrepuestos["id_repuesto"];
						$midetalle_registro = $detalle_registro_diario->buscar();
						 
						$msj_kilometraje = "";
						//kilometraje actual
						$ki_actual = $midetalle_registro["kactual"];

						//condiciones para saber el mensaje del mantenimiento
						if($midetalle_registro["estatus_mantenimiento"]=="1"){
							$msj_kilometraje = "Se recomienda relizar un cambio de repuesto/lubricante ";
							$style = "color:#BF3030; font-weight:bold;";
						}else if($midetalle_registro["estatus_mantenimiento"]=="2"){
							$style = "color:red; font-weight:bold;";
							$msj_kilometraje = "Ha llegado o sobrepasado el límite, por favor realizar cambio de repuesto/lubricante";
						}else
							$msj_kilometraje = "Consumo normal";
				
				?>
			<!--cierre del dato-->	

			<td><?php print($ki_actual); ?></td>
			<td style="<?php print($style); ?>"><?php print($msj_kilometraje); ?></td>
			<td>
				<?php if($msj_kilometraje){ ?>
				<?php } ?>
			</td>
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

