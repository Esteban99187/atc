<?php 
	@include_once("../modelo_alberto/clsMantenimiento.php");
	$objMantenimiento = new clsMantenimiento;
	//	Obtenemos los datos.
	$objMantenimiento->mecanico = $_POST["cedMecanico"];
	$objMantenimiento->nroOrden = $_POST["nroOrden"];

	if($_POST["evento"] && $_POST["evento"]=="Guardar") {
		$objMantenimiento->BEGIN();
		if($objMantenimiento->diagnostico()) {
			foreach ($_POST["txtFalla"] as $index => $falla) {
				$objMantenimiento->falla = $falla;
				$objMantenimiento->repuesto = $_POST["txtRepuesto"][$index];
				$objMantenimiento->cantidad = $_POST["txtCantidad"][$index];
				if($objMantenimiento->guardarDetalle()){
					$objMantenimiento->COMMIT();
					$nroOrdenRegistrado = $_POST["nroOrden"];
					$estatus = "2";
					$guardado = true;
					$msj = "Diagnóstico registrado con Exito";
				}
				else{
					$objMantenimiento->ROLLBACK();
					$nroOrdenRegistrado = $_POST["nroOrden"];
					$estatus = "2";
					$guardado = false;
					$msj = "Error al guardar el Detalle";
				}
			}
			$msj = "Diagnóstico registrado con Exito";
		}else{
			$objMantenimiento->ROLLBACK();
			$msj = "Error al Guardar";
		}
	}
?>