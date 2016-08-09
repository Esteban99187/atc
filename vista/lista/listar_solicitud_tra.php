<?
@include_once("modelo/class_solicitud_transfusion.php");
@include_once("../modelo/class_solicitud_transfusion.php");
	$solicitud_transfusion = new solicitud_transfusion;

	@include_once("modelo/class_persona.php");
@include_once("../modelo/class_persona.php");
	$personay= new persona;

?>
<table border='1' style='border:1px solid black; width:500px; margin:0 auto 0 auto;'>

	<tr align='center' style='background: #EEE; color:black; font-size:16px;'>
		<td>N° de Solicitud</td>
		<td>Cedula</td>
		<td>Nombre Apellido</td>
		<td></td>
	</tr>
	<?
			$solicitud_transfusion->listar_2();
			while($rowd=$solicitud_transfusion->row()){
			 if($rowd['fecha_hora_recepcion'] == "0000-00-00 00:00:00"){

			 }else{

				if($personay->consultame($rowd[1])){ $row_po=$personay->row();}
				?>

						<tr align='center'>
							<td><?=$rowd[0]?></td>
							<td><?=$row_po['cedula']?> </td>
							<td><?=$row_po['nombres_per']." ".$row_po['apellidos_per']?> </td>
							<td>

                              <?   if($rowd['estatus'] == "2"){?>
								<a href="?vista=control_transfusiones_recibidas&cod=<?=$rowd[0]?>&cedula=<?=$row_po['cedula']?>&no=<?=$row_po['nombres_per']." ".$row_po['apellidos_per']?>&se=<?=$row_po['sexo_per']?>&at=<?=$rowd[1]?>&fe=<?=$row_po['fecha_nacimiento_per']?>&feh=<?=$rowd['fecha_his_don']?>&can=<?=$rowd['cantidad_his_don']?>"><imagenes src='images/cruz_roja.png'></a>


								<?

							  }elseif($rowd['estatus'] == "3"){

								  	?> <a href="?vista=control_transfusiones_preparadas&cod=<?=$rowd[0]?>&cedula=<?=$row_po['cedula']?>&no=<?=$row_po['nombres_per']." ".$row_po['apellidos_per']?>&se=<?=$row_po['sexo_per']?>&at=<?=$rowd[1]?>&fe=<?=$row_po['fecha_nacimiento_per']?>&feh=<?=$rowd['fecha_hora_recepcion']?>&can=<?=$rowd['cantidad_his_don']?>"><imagenes src='imagenes/p.png' width="20"></a> <?

								  }elseif($rowd['estatus'] == "4"){?> <imagenes src='images/bien.png' width="20"><? }else{echo "l";}



								} ?>
								</td>
						</tr>
				<?


				/*
					else{
									if($rowd['estatus'] == "2"){?> <a href="?vista=control_transfusiones_preparadas&cod=<?=$rowd[0]?>&cedula=<?=$row_po['cedula']?>&no=<?=$row_po['nombres_per']." ".$row_po['apellidos_per']?>&se=<?=$row_po['sexo_per']?>&at=<?=$rowd[1]?>&fe=<?=$row_po['fecha_nacimiento_per']?>&feh=<?=$rowd['fecha_hora_recepcion']?>&can=<?=$rowd['cantidad_his_don']?>"><imagenes src='imagenes/p.png' width="20"></a> <? }elseif($rowd['estatus'] == "3"){?> <imagenes src='images/bien.png' width="20"><? }else{echo "l";}
									 }?>


				*/


				}

	?>

</table>
