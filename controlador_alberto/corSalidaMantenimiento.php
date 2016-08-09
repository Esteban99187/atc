<?php 
	@include_once("../modelo_alberto/clsMantenimiento.php");
	@include_once("../modelo_alberto/clsInventario.php");
	$objMantenimiento = new clsMantenimiento;
	$objMantenimiento->nroOrden = $_POST["nroOrden"];
	$objMantenimiento->fechaSalida = $objMantenimiento->set_fecha($_POST["txtFechaSalida"]);
	$objMantenimiento->HoraOficina = $_POST["txtHoraOficina"];
	$objMantenimiento->HoraVigilancia = $_POST["txtHoraVigilancia"];
	if($_POST["evento"] && $_POST["evento"]=="Guardar") {
		$objMantenimiento->BEGIN();
		if($objMantenimiento->salida()) {
			$msj ="Salida Registrada con Exito";
			//	Escribimos en el inventario
			$objInventario= new Inventario;
			$objInventario->responsable=0; //esta linea estará mientras tanto se arregla lo del responsable que esta en la otra base de datos en MySQL 
			$objInventario->motivo="Mantenimiento de una Unidad";
			$objInventario->tipomovimiento = 2;
			$objInventario->tipo = 4;
			$objInventario->nota_salida=$_POST["nroOrden"];
			if($objInventario->incluirMovimiento()){
				//empezamos a incluir la transaccion
				$idMovimiento = $objInventario->buscarUltimo2();		
				$objInventario->id = $idMovimiento;
				$i=0;
				foreach ($_POST["repuestoUtilizado"] as $codigo) {
					$objInventario->producto=$codigo;
					$objInventario->cantidad=$_POST["cantidadRepuesto"][$i];
					if($objInventario->incluirDetalle()){
						$objInventario->idP = $codigo;
						if($objInventario->cambiarStock("id_repuesto","trepuesto_lubricante",$_POST["cantidadRepuesto"][$i],2)){
							$icono = "check";
							$objMantenimiento->COMMIT();
							$msj = "Salida registrada con Exito";
						}else{
							$objMantenimiento->ROLLBACK();
							$msj = "Error al guardar el Inventario";
						}
					}else{
						$objMantenimiento->ROLLBACK();
						$msj = "Error al guardar el Inventario";
					}
					$i++;
				}
				$icono = "check";
			}else{
				$objMantenimiento->ROLLBACK();
				$msj ="Error al Registrar la Salida";
			}
		}else{
			$objMantenimiento->ROLLBACK();
			$msj ="Error al Registrar la Salida";
		}
	}
?>