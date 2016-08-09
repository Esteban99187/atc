<?php 
	@include_once("modelo_alberto/clsMantenimiento.php");
	@include_once("../modelo_alberto/clsMantenimiento.php");
	$objMantenimiento = new clsMantenimiento;
	$objMantenimiento->mecanico = $_POST["cedMecanico"];
	$objMantenimiento->nroOrden = $_POST["nroOrden"];

	if($_POST["evento"] && $_POST["evento"]=="Guardar") {
		if($objMantenimiento->diagnostico()) {
			foreach ($_POST["txtFalla"] as $index => $falla) {
				$objMantenimiento->falla = $falla;
				$objMantenimiento->repuesto = $_POST["txtRepuesto"][$index];
				$objMantenimiento->cantidad = $_POST["txtCantidad"][$index];
				$objMantenimiento->guardarDetalle();
			}
			$msj = "Diagnóstico registrado con Exito";
		}else{
			$msj = "Error al Guardar";
		}
	}
?>