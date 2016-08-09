<?php 
 	require_once("../modelo_alberto/clsInventario.php");
	$guardado = false;
	$objInventario= new Inventario;
	$objInventario->responsable=0; //esta linea estará mientras tanto se arregla lo del responsable que esta en la otra base de datos en MySQL 
	//$objInventario->responsable=$_POST["txtResponsable"];
	$objInventario->motivo=$_POST["txtMotivo"];
	$objInventario->nota_salida=$_POST["txtNotaSalida"];
	
	$objInventario->tipomovimiento = 2;
	$objInventario->tipo = $_POST["txtOpcion"];
	switch ($_POST["evento"]) { 
		case 'incluir': 
			$objInventario->BEGIN();
			if($objInventario->incluirMovimiento()){
				//empezamos a incluir la transaccion
				$idMovimiento = $objInventario->buscarUltimo2();			
				$objInventario->id = $idMovimiento;

				//incluimos los datos de la bitaora
				$i=0;
				foreach ($_POST["repuesto"] as $codigo){
					$objInventario->producto=$codigo;
					$objInventario->cantidad=$_POST["txtCantidad"][$i];
					$objInventario->fecha_vence=$_POST["txtFecha"][$i];

					$objInventario->idP = $codigo;
					$objInventario->cambiarStock("id_repuesto","trepuesto_lubricante",$_POST["txtCantidad"][$i],2);
					
					$objInventario->incluirDetalle();
					$i++;
				}
				$icono = "check";
				$objInventario->COMMIT();
				$guardado = true;
			}else{
				$guardado = false;
				$icono = "close";
				$objInventario->ROLLBACK();
			}
		break;
	} 
	$notaSalida = $objInventario->buscarUltimaNotaSalida();
?>