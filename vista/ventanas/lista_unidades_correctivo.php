<?php
	include_once("../../modelo_alberto/clstunidad.php");
	$tunidad = new clstunidad();

	if($_GET['numero']){
		$tunidad->buscar_unidad($_GET['numero']);
	}else{
		$tunidad->listar();

	}
?>
<form action="">
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
		<td >Cod Modelo</td>

		<td>---</td>
	</tr>
<?php 
	while($mitunidad = $tunidad->row()){
?>
	<tr>
		<td><?php print($mitunidad['placa']) ?></td>
		<td><?php print($mitunidad['serial_motor']) ?></td>
		<td><?php print($mitunidad['serial_carroceria']) ?></td>
		<td><?php print($mitunidad['modelo']) ?></td>
		<td ><?php print($mitunidad['idmodelo_unidad']) ?></td>
		<td><input type="button" value="agregar" onclick="enviar(this)"></td>
	</tr>

<?php 

} 

?>
</table>
</form>

<script>

	function enviar(boton){

		//obtenemos los valores
		if(document.all){
			numero = boton.parentNode.parentNode.cells[0].innerText;
			modelo = boton.parentNode.parentNode.cells[4].innerText;
			modelo_nombre = boton.parentNode.parentNode.cells[3].innerText;

		
		 }else{
		 	numero = boton.parentNode.parentNode.cells[0].textContent;
		 	modelo = boton.parentNode.parentNode.cells[4].textContent;
		 	modelo_nombre = boton.parentNode.parentNode.cells[3].textContent;
		 	
		 }

		//pasamos los valores
		//window.opener.document.getElementById("chofer").value = numero+" - "+nombre+" "+apellido;	
		window.opener.document.getElementById("placa_mantenimiento_correctivo").value = numero;
		window.opener.document.getElementById("modelo_unidad").value = modelo;
		window.opener.document.getElementById("modelo_nombre").value = modelo_nombre;
		window.opener.document.getElementById("busqueda_ajax").value = 1;
	
		//cerraremos la ventana
		window.close();	
		
	}
</script>
