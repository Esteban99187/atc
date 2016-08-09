<?php 
 	require_once("../modelo_alberto/clsInventario.php");
	$guardado = false;
	$objInventario= new Inventario;
	$objInventario->responsable=0; //esta linea estará mientras tanto se arregla lo del responsable que esta en la otra base de datos en MySQL 
	//$objInventario->responsable=$_POST["txtResponsable"];

	$objInventario->motivo=$_POST["txtObservacion"];
	$objInventario->tipomovimiento = 1;
	$objInventario->tipo = $_POST["txtOpcion"];
	$objInventario->nota_salida=$_POST["txtNroEntrada"];
	switch ($_POST["evento"]) {
		case 'incluir': 
			$objInventario->BEGIN();
			if($objInventario->incluirMovimiento()) {
				//empezamos a incluir la transaccion
				$idMovimiento = $objInventario->buscarUltimo2();
				$objInventario->id = $idMovimiento;
				$i=0;
				foreach ($_POST["repuesto"] as $codigo) {
					$objInventario->producto=$codigo;
					$objInventario->cantidad=$_POST["txtCantidad"][$i];
					$objInventario->fecha_vence=$_POST["txtFecha"][$i];
					
					if($objInventario->incluirDetalle()){
						$objInventario->idP = $codigo;
						$objInventario->cambiarStock("id_repuesto","trepuesto_lubricante",$_POST["txtCantidad"][$i],1);
					}
					$i++;
				}
				$icono = "check";
				$objInventario->COMMIT();
				$guardado = true;
			}else{
				$msj ="nota de Salida Ya existente";
				$icono = "close";
				$objInventario->ROLLBACK();
				$guardado = false;
			}
		break;
	}
	$ultimaEntrada = $objInventario->buscarUltimaEntrada();
?>