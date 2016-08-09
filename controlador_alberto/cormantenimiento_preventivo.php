<?php
	include_once("../modelo_alberto/clstmantenimiento_preventivo.php");
	include_once("../modelo_alberto/clsdetalle_registro_diario.php");
	include_once("../modelo_alberto/clspreventivo.php");
	//	Soporte para afectar inventario.
	include_once("../modelo_alberto/clsInventario.php");

	$preventivo = new preventivo();
	$preventivo->fecha = $_POST['fecha'];
	$preventivo->placa = $_POST['placa'];
	$preventivo->kilometraje = $_POST['kilometraje'];
	$preventivo->observaciones = $_POST['observaciones'];
	$preventivo->idpreventivo = $_POST['idpreventivo'];

	function transaccion(){
		//el for para saber si estamos entrando a la transaccion
		for($i=0; $i<count($_POST['repuestos']);$i++){
			$detalle = new clstmantenimiento_preventivo();
			$concat = $_POST['repuestos'][$i];
			$detalle->id_repuesto = $_POST['repuestos'][$i];
			$detalle->cantidad = $_POST['cantidad_'.$concat];
			$detalle->fecha = $_POST['fecha_'.$concat];
			$detalle->idmecanico = $_POST['mecanico_'.$concat];
			$detalle->kilometraje = $_POST['kilometraje_'.$concat];
			$detalle->idpreventivo = $_POST["idpreventivo"];
			$detalle->BEGIN();
			if($detalle->incluir()){
				//actualizar los datos del repuesto
				$detalle_registro_diario  = new clsdetalle_registro_diario();
				$detalle_registro_diario->placa_unidad = $_GET['placa'];
				$detalle_registro_diario->id_repuesto = $_POST['repuestos'][$i];
				//actualizamos el kilometraje
				if($detalle_registro_diario->cambio_kilometraje()){
					//	Escribimos en el inventario
					$objInventario= new Inventario;
					$objInventario->responsable=0; //esta linea estará mientras tanto se arregla lo del responsable que esta en la otra base de datos en MySQL 
					$objInventario->motivo=$_POST["observaciones"];
					$objInventario->tipomovimiento = 2;
					$objInventario->tipo = 3;
					$objInventario->nota_salida=$_POST["idpreventivo"];
					if($objInventario->incluirMovimiento()){
						//empezamos a incluir la transaccion
						$idMovimiento = $objInventario->buscarUltimo2();		
						$objInventario->id = $idMovimiento;
						$objInventario->producto=$_POST['repuestos'][$i];
						$objInventario->cantidad=$_POST['cantidad_'.$concat];
						$objInventario->fecha_vence=$_POST['fecha_'.$concat];
						$objInventario->idP = $_POST['repuestos'][$i];
						if($objInventario->cambiarStock("id_repuesto","trepuesto_lubricante",$_POST['cantidad_'.$concat],2)){
							if($objInventario->incluirDetalle()){
								$detalle->COMMIT();
								return true;
							}else{
								$detalle->ROLLBACK();
								return false;
							}
						}else{
							$detalle->ROLLBACK();
							return false;
						}
					}else{
						$detalle->ROLLBACK();
						return false;
					}
				}else{
					$detalle->ROLLBACK();
					return false;
				}
			}else{
				$detalle->ROLLBACK();
				return false;
			}

		}	
		return 1;
	}

	if($_POST['incluir']){
		$preventivo->BEGIN();
		if($preventivo->incluir()){
			//llamamos a la transaccion
			if(transaccion()){
				$preventivo->COMMIT();
				echo "<script> crearMsj('Registro exitoso'); </script>";
			}else{
				$preventivo->ROLLBACK();
				$msj = "Error al registrar el detalle";
			}
		}else{
			$preventivo->ROLLBACK();
			$msj = "Error al registrar";
		}
	}


?>