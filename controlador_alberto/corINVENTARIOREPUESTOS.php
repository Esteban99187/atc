<?php 
	require_once("../modelo_alberto/clsInventario.php");
	$ObjInventario = new Inventario;
	
	if(isset($_GET["producto"]) && !empty($_GET["producto"])){
		$productoSelect = $ObjInventario->buscarHistorial($_GET["producto"]);
		$EntradasCant = $ObjInventario->EntradasHistorial($_GET["producto"]);
		$SalidasCant = $ObjInventario->SalidasHistorial($_GET["producto"]);
	}else{
		$productosTodos = $ObjInventario->listar("repuestos");
	}
?>