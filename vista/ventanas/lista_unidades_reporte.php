<?php
	include_once("../../modelo_alberto/clstunidad.php");
	$tunidad = new clstunidad();

	if($_GET['numero']){
		$data = $tunidad->buscar_unidad($_GET['numero']);
	}else{
		$data = $tunidad->listar();

	}
?>
<form action="">
	<input type="hidden" id="valor" value="<?php print($_GET['valor']); ?>">
<table width="100%" border="1">
	<caption>Listado de unidades</caption>
	<tr>
		<td colspan="8">
			<input type="text" style="width:80%; padding:10px;" name='numero' placeholder="Buscar unidad">
			<input type="submit" value="buscar" style="width:18%; padding:10px;"> 
		</td>
	</tr>
	<tr>
		<td>Numero de unidad</td>
		<td>Serial de motor</td>
		<td>Serial de carroceria</td>
		<td>Modelo</td>

		<td>---</td>
	</tr>
<?php 
	foreach($data as $mitunidad){
?>
	<tr>
		<td><?php print($mitunidad['placa']) ?></td>
		<td><?php print($mitunidad['serial_motor']) ?></td>
		<td><?php print($mitunidad['serial_carroceria']) ?></td>
		<td><?php print($mitunidad['modelo']) ?></td>
		<td><input type="button" value="agregar" onclick="enviar(this)"></td>
	</tr>

<?php 

} 

?>
</table>
</form>

<script>

	function enviar(boton){

		valor = document.getElementById("valor").value;

		//obtenemos los valores
		if(document.all){
			numero = boton.parentNode.parentNode.cells[0].innerText;
		
		 }else{
		 	numero = boton.parentNode.parentNode.cells[0].textContent;
		 
		 }

		//pasamos los valores
		//window.opener.document.getElementById("chofer").value = numero+" - "+nombre+" "+apellido;	
		window.opener.document.getElementById("numero_unidad_"+valor).value = numero;
	
		//cerraremos la ventana
		window.close();	
		
	}
</script>
