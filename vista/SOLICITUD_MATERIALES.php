<?php 
	include_once("../modelo_alberto/clstsolicitud_mantenimiento.php");
	$soli = new clssolicitud_mantenimiento();
	$soli->listar_solicitudes_mantenimiento();
?>

<style type="text/css">
	caption{
		padding: 10px;
		font-size: 20px;
		background-color: #ccc;
		color: black;
		font-family: verdana;
		border:2px solid black;
		border-bottom: none;
	}
	tr td{
		padding: 5px;
		font-size: 20px;
	}

</style>
<table style="width:100%;" border="1" cellspacing="0" >
	<caption>Solicitud de Materiales</caption>
	<tr>
		<td>Nro. Solicitud</td>
		<td>Placa</td>
		<td>Falla</td>
		<td>Estatus</td>
		<td></td>
	</tr>
<?php $i=0;  while($milista = $soli->row()){
	$i++;
 ?>
	<tr>
		<td><?php print($i); ?></td>
		<td><?php print($milista['placa']); ?></td>
		<td><?php print($milista['descripcion']); ?></td>
		<td>
			<?php 
				if($milista["estatus"]=="1") print("En Espera");
				if($milista["estatus"]=="2") print("Aprobada");
				if($milista["estatus"]=="3") print("Rechazada");
			?>
			</td>
		<td><a href="?url=tmantenimiento_correctivo&nro_solicitud=<?php print($milista['idmatenimiento_correctivo']); ?>">Ver</a></td>
	

	</tr>

<?php }?>

</table>