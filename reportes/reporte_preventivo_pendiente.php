<?php
	include_once("dompdf/dompdf_config.inc.php");	
$codigo='

<?php
	
	//nos traeremos el modelo de repuesto de la unidad
	include_once("../modelo_alberto/clstunidad.php");
	$unidad = new clstunidad();
	$unidad->placa_unidad = $_GET["placa"];
	$miunidad = $unidad->buscar();
	
	//esto sera solo para buscar el modelo de la unidad

	//ahora traeremos los lubricantes / repuestos de la unidad elegida
	include_once("../modelo_alberto/clstdetalle_unidades_repuesto.php");
	$unidades_repuesto = new clstdetalle_unidades_repuesto();
	$unidades_repuesto->idmodelo_unidad = $miunidad["idmodelo_unidad"];
	$data =$unidades_repuesto->buscar_lubricantes();

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
	<caption style="padding:10px; font-size:20px; border:1px solid black; border-bottom:none;">Unidad</caption>
	<tr>
		<td>Placa:<?php print($miunidad["placa"]); ?></td>
		<td>Serial Motor:<?php print($miunidad["serial_motor"]); ?></td>
	</tr>
	<tr>
		<td>Serial Carroceria:<?php print($miunidad["serial_carroceria"]); ?></td>
		<td>Observaciones:<?php print($miunidad["observaciones"]); ?></td>
	</tr>
</table>



<br>
<br>
<table border="1" width="100%" cellspacing="0">
	<caption style="padding:10px; font-size:20px; border:1px solid black; border-bottom:none;">Lubricantes</caption>
	<tr>
			<td>Repuesto/Lubricante</td>
			<td>K-Minimo</td>
			<td>K-Maximo</td>
			<td>K-Actual</td>
			<td>Nota</td>
	</tr>


	<?php if($data) foreach($data as $misrepuestos){ 
						
			//esto solo sera para buscar el estatus del kilometraje
				include_once("../modelo_alberto/clsdetalle_registro_diario.php");
				$detalle_registro_diario = new clsdetalle_registro_diario();
				$detalle_registro_diario->placa_unidad = $_GET["placa"];
				$detalle_registro_diario->idmodelo_unidad = $misrepuestos["idmodelo_unidad"];
				$detalle_registro_diario->id_repuesto = $misrepuestos["id_repuesto"];
				$midetalle_registro = $detalle_registro_diario->buscar();
				$estatus = "";
				//kilometraje actual
				$ki_actual = $midetalle_registro["kactual"];


				//condiciones para saber el mensaje del mantenimiento
				if($midetalle_registro["estatus_mantenimiento"]=="1"){
						$estatus ="1";
						$mimsj = "Se recomienda cambiar el lubricante";
				}else if($midetalle_registro["estatus_mantenimiento"]=="2"){
						$estatus ="1";
						$mimsj = "Se debe cambiar el lubricante";

				}
						
				$id_repuesto = $midetalle_registro["id_repuesto"];
			?>

			<?php if($estatus!=""){ ?>

			<tr>
				<td><?php print($misrepuestos["nombre_repuesto"]); ?></td>
				<td><?php print($misrepuestos["kmin"]) ?></td>
				<td><?php print($misrepuestos["kmax"]) ?></td>
				<td><?php print($midetalle_registro["kactual"]); ?></td>
				<td><?php print($mimsj); ?></td>
			</tr>


			<?php }  

			}?>


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


