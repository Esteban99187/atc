<?
@include_once("modelo/class_atencion_donante.php");
@include_once("../modelo/class_atencion_donante.php");
	$atencion_donante = new atencion_donante;

	@include_once("modelo/class_persona.php");
@include_once("../modelo/class_persona.php");
	$persona= new persona;


?>
			<link href="../css/maestro2.css" type="text/css" rel="stylesheet" />

<table align ='center' style='border:1px solid black; width:400px; margin:0 auto 0 auto;'>

	<tr align='center' style='background: #EEE; color:black; font-size:16px;'>
		<td width="50px">N°</td>
		<td width="120px">Cedula</td>
		<td width="240px" align="center">Nombres y Apellidos</td>
		<td width="20px" align="right"></td>
	</tr>
	<?
			$atencion_donante->listar_2();
			while($row=$atencion_donante->row()){


				if($persona->consultame($row[1])){ $row_p=$persona->row();}
				?>
						<tr align='left'>
							<td align="center"><?=$row[0]?></td>
							<td align="center"><?=$row_p['nacionalidad_per']."-".$row_p['cedula']?></td>
							<td><?=$row_p['nombres_per']." ".$row_p['apellidos_per']?></td>
							<td>
								<?php if($row['estastus_ate_do'] == "a"){ $contadorr++; ?>
								<a href="?vista=historia&cod= <?=$row[0]?>&na=<?=$row_p['nacionalidad_per']?>&cedula=<?=$row_p['cedula']?>&no=<?=$row_p['nombres_per']." ".$row_p['apellidos_per']?>&fe=<?=$row_p['fecha_nacimiento_per']?>&se=<?=$row_p['sexo_per']?>&en=<?=$row['10']?>">
								<imagenes src='images/h.png' title="Aperturar Historia"></a>

								<? }elseif($row['estastus_ate_do'] == "r"){ $contadorr++; ?>
								<a href="?vista=historia&cod= <?=$row[0]?>&na=<?=$row_p['nacionalidad_per']?>&cedula=<?=$row_p['cedula']?>&no=<?=$row_p['nombres_per']." ".$row_p['apellidos_per']?>&fe=<?=$row_p['fecha_nacimiento_per']?>&se=<?=$row_p['sexo_per']?>&en=<?=$row['10']?>">
								<imagenes src='images/r.png' title="Aperturar Historia" width="20" ></a>


								<? }elseif($row['estastus_ate_do'] == "d"){ $contadorr++; ?>
								<imagenes src='images/Error.png' title="Diferido" width="20" >

								<? }elseif($row['estastus_ate_do'] == "e"){ $contadorr++; ?>
								<imagenes src='images/Equis_roja.png' title="Descartado" width="20" >

								<? }elseif($row['estastus_ate_do'] == "z"){ $contadorr++; ?>
								<imagenes src='images/bien.png' title="Historia Creada" width="20" >

								<? }else{?>
								<a href="?vista=atencion_donante&cod=<?=$row[0]?>&na=<?=$row_p['nacionalidad_per']?>-&cedula=<?=$row_p['cedula']?>&no=<?=$row_p['nombres_per']." ".$row_p['apellidos_per']?>&se=<?=$row_p['sexo_per']?>">
								<imagenes src='images/cruz_roja.png' title="Registrar Signos Vitales"></a>
								<? }?>

								</td>

						</tr>

				<?

				}

	?>
	<tr><td colspan="4" align="right"><br /></td></tr>
<tr><td colspan="4" align="center">

	<a href="?reporte=rep_atencion_donante" target="_blank">
		<imagenes src='images/pdf.gif' title="Imprimir Listado" width="40" height="40"/></a></td></tr>
</table>
<br>
<br>
<table width="600px">
	<tr>
		<td colspan="3" align="left"><label class="label">Leyenda:</label></td>
	</tr>
	<tr height="10px"><td colspan="3"></td></tr>
	<tr>
		<td>
			<imagenes src='images/cruz_roja.png' title="Registrar Signos Vitales"> = Registrar Signos Vitales
		</td>

		<td>
			<imagenes src='images/h.png' title="Aperturar Historia"> = Aperturar Historia Nueva
		</td>

		<td>
			<imagenes src='images/r.png' title="Aperturar Historia" width="20"> = Donante en Reserva
		</td>
	</tr>
	<tr>
		<td>
			<imagenes src='images/Error.png' title="Diferido" width="20"> = Donante Diferido
		</td>

		<td>
			<imagenes src='images/Equis_roja.png' title="Descartado" width="20"> = Donante Descartado
		</td>

		<td>
			<imagenes src='images/bien.png' title="Historia Creada" width="20"> = Historia Creada 
		</td>
	</tr>
</table>
