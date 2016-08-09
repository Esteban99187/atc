<?php
	include_once("../../modelo_alberto/clstchofer.php");
	$tchofer = new clstchofer();

	if($_GET['cedula']){
		$tchofer->buscar_chofer_asignados($_GET['cedula']);
	}else{
		$tchofer->listar_choferes_asignados();
	}
?>
<form action="">
<table width="100%" border="1">
	<caption>Listado de choferes</caption>
	<tr>
		<td colspan="8">
			<input type="text" style="width:80%; padding:10px;" name="cedula" placeholder="Buscar el chofer">
			<input type="submit" value="buscar" style="width:18%; padding:10px;"> 
		</td>
	</tr>
	<tr>
		<td>Cedula</td>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Sexo</td>
		<td>Direccion</td>
		<td>Telefono</td>
		<td>Correo</td>
		<td>Placa del a unidad</td>
		<td>---</td>
	</tr>
<?php 
	while($mitchofer = $tchofer->row()){
?>
	<tr>
		<td><?php print($mitchofer['cedula']) ?></td>
		<td><?php print($mitchofer['nombre1']) ?></td>
		<td><?php print($mitchofer['apellido1']) ?></td>
		<td><?php print($mitchofer['sexo']) ?></td>
		<td><?php print($mitchofer['direccion']) ?></td>
		<td><?php print($mitchofer['telefono']) ?></td>
		<td><?php print($mitchofer['correo']) ?></td>
		<td><?php print($mitchofer['placa_unidad']) ?></td>
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
			cedula = boton.parentNode.parentNode.cells[0].innerText;
			nombre = boton.parentNode.parentNode.cells[1].innerText;
			apellido = boton.parentNode.parentNode.cells[2].innerText;
			placa = boton.parentNode.parentNode.cells[7].innerText;

		 	
		 }else{
		 	cedula = boton.parentNode.parentNode.cells[0].textContent;
		 	nombre = boton.parentNode.parentNode.cells[1].textContent;
		 	apellido = boton.parentNode.parentNode.cells[2].textContent;
		 	placa = boton.parentNode.parentNode.cells[7].textContent;
		 	
		 }

		valor = window.opener.document.getElementById("selectAjax").value;
		if(valor == 0){
			valor = 1;
		}else{
			valor = 0;
		}

		//pasamos los valores
		//window.opener.document.getElementById("chofer").value = cedula+" - "+nombre+" "+apellido;	
		window.opener.document.getElementById("cedula").value = cedula;
		window.opener.document.getElementById("nombre").value = nombre+" "+apellido;
		window.opener.document.getElementById("placa").value = placa;
		window.opener.document.getElementById("selectAjax").value = valor;

		//cerraremos la ventana
		window.close();	
		
	}
</script>
