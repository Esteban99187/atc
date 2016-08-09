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
<table border='1' style='border:1px solid black; width:500px; margin:0 auto 0 auto;'>

	<tr align='center' style='background: #EEE; color:black; font-size:16px;'>
		<td>Codigo</td>
		<td>Cedula</td>
		<td>Nombre Apellido</td>
		<td></td>
	</tr>
	<?
			$historia_donante->listar_3();
			while($rowd=$historia_donante->row()){
			 if($rowd['estatus'] == "2"){
			
				
				if($atencion->consulta_por("cod_atencion_donante",$rowd[1])){ $row_at=$atencion->row(); }
				
				if($personay->consultame($row_at[1])){ $row_po=$personay->row();}
				?>
						<tr align='center'>
							<td><?=$rowd[0]?> </td>
							<td><?=$row_po['cedula']?> </td>
							<td><?=$row_po['nombres_per']." ".$row_po['apellidos_per']?> </td>
							<td>
								
								<a href="?vista=serologia&cod=<?=$rowd[0]?>&cedula=<?=$row_po['cedula']?>&no=<?=$row_po['nombres_per']." ".$row_po['apellidos_per']?>&se=<?=$row_po['sexo_per']?>&at=<?=$rowd[1]?>&fe=<?=$row_po['fecha_nacimiento_per']?>&feh=<?=$rowd['fecha_his_don']?>&can=<?=$rowd['cantidad_his_don']?>"><img src='images/s.JPG' width="20"></a>
								
								<? 
								}?>
								
								</td>
						</tr>
				<?
				
				}
	
	?>

</table>
