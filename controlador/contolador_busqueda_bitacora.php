<?php
	require_once("../clases/class_bitacora.php");
	$bt = new bitacora;

	$usuario = $_GET["n"];
	$modulo = $_GET["m"];
	echo '<table class="table" >
	<tr>
    <th>#</th>
	<th>USUARIO</th>
	<th>ACTIVIDAD</th>
	<th>FECHA</th>
	<th>HORA</th>
	<th>MUDULO</th>
	</tr>';
	$bt->busquedaBitacora($usuario,$modulo,$accion);
	echo '</table>';
?>