<?php 
	@include_once("../modelo_alberto/clsMantenimiento.php");
	$guardado = false;
	$objMantenimiento = new clsMantenimiento;
	
	$objMantenimiento->fecha = $objMantenimiento->set_fecha($_POST["txtFechaEntrada"]);
	$objMantenimiento->unidad = $_POST["idUnidad"];
	$objMantenimiento->conductor = $_POST["cedulaConductor"];
	$objMantenimiento->observacion = $_POST["txtObservacion"];

	if($_POST["evento"] && $_POST["evento"]=="Guardar"){
		if($objMantenimiento->guardar()){
			$nroOrdenRegistrado = $_POST["txtNroOrden"];
			$estatus = "1";
			$msj = "Entrada de unidad Registrada con Exito bajo el nro: ".$_POST["txtNroOrden"];
			$guardado = true;
		}else{
			$nroOrdenRegistrado = $_POST["txtNroOrden"];
			$estatus = "1";
			$msj = "Error al Guardar la entrada de unidad nro: ".$_POST["txtNroOrden"];
			$guardado = false;
		}
	}

	if($_POST["evento"]=="busquedaRapida"){
		if(!empty($_POST["valor"])){
			$datos = $objMantenimiento->buscarOrden($_POST["valor"],$_POST["estatus"]);
			echo json_encode($datos);
		}
	}

	if(isset($_GET["evento"]) && $_GET["evento"]=="buscarRepuestosOrden"){
		$datos = $objMantenimiento->buscarRepuestos($_GET["valor"]);
		echo json_encode($datos);
	}


	$nroOrden = $objMantenimiento->buscarNroOrden();
?>