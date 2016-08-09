<?
@include_once("modelo/class_historia_donante.php");
@include_once("../modelo/class_historia_donante.php");
@include_once("modelo/class_atencion_donante.php");
@include_once("../modelo/class_atencion_donante.php");
	$historia_donante = new historia_donante;
	$atencion= new atencion_donante;

	@include_once("modelo/class_persona.php");
@include_once("../modelo/class_persona.php");
	$personay= new persona;

?>
	<link href="../css/maestro2.css" type="text/css" rel="stylesheet" />

<table border='1' style='border:1px solid black; width:500px; margin:0 auto 0 auto;'>

	<tr align='center' style='background: #EEE; color:black; font-size:16px;'>
		<td>N°</td>
		<td>Cédula</td>
		<td>Nombres y Apellidos</td>
		<td></td>
	</tr>
	<?
			$historia_donante->listar_2();
			while($rowd=$historia_donante->row()){



				if($atencion->consulta_por("cod_atencion_donante",$rowd[1])){ $row_at=$atencion->row(); }

				if($personay->consultame($row_at[1])){ $row_po=$personay->row();}
				?>
						<tr align='center'>
							<td><?=$rowd[0]?> </td>
							<td><?=$row_po['cedula']?> </td>
							<td><?=$row_po['nombres_per']." ".$row_po['apellidos_per']?> </td>
							<td>
								<?php if($rowd['estatus'] == "1"){ ?>
								<a href="?vista=control_donante&cod=<?=$rowd[0]?>&cedula=<?=$row_po['cedula']?>&no=<?=$row_po['nombres_per']." ".$row_po['apellidos_per']?>&se=<?=$row_po['sexo_per']?>&at=<?=$rowd[1]?>&fe=<?=$row_po['fecha_nacimiento_per']?>&feh=<?=$rowd['fecha_his_don']?>&can=<?=$rowd['cantidad_his_don']?>">
								<imagenes src='images/pruebas.jpg' title="Reportar Pruebas" width="20px"></a>

								<? }elseif($rowd['estatus'] == "2"){ ?>
								<a href="?vista=serologia&cod=<?=$rowd[0]?>&cedula=<?=$row_po['cedula']?>&no=<?=$row_po['nombres_per']." ".$row_po['apellidos_per']?>&se=<?=$row_po['sexo_per']?>&at=<?=$rowd[1]?>&fe=<?=$row_po['fecha_nacimiento_per']?>&feh=<?=$rowd['fecha_his_don']?>&can=<?=$rowd['cantidad_his_don']?>">
								<imagenes src='images/s.JPG' title="Listo para Serologia" width="20"></a>

								<? }elseif($rowd['estatus'] == "3"){ ?>
						<imagenes src='images/bien.png' width="20">

								<? }else{?>

								<? }?>

								</td>
						</tr>
				<?

				}

	?>

</table>

<br>
<br>
<br>
<table width="600px">
	<tr><td colspan="2"><label class="label">Leyenda:</label></td></tr>
	<tr height="20px"></tr>
	<tr>
		<td>
			<imagenes src='images/pruebas.jpg' width="25px" title="Reportar pruebas"> = Reportar pruebas del Laboratorio
		</td>

		<td>
			<imagenes src='images/s.jpg' title="Listo para Serologia" width="25px"> = Listo para Serologia
		</td>

	</tr>
</table>
