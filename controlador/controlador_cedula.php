<?php
	require_once("../clases/class_usuarios.php");
	$m = new usuarios;
	$datos = $_GET["cedula"];
	if($m->chequea_existencia($datos)){
		print "Ya existe esta cedula.";
	}
?>