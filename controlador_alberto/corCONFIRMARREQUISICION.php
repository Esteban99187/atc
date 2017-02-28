<?php 
	require_once("../modelo_alberto/clsSolicitud.php");
	$objSolicitud = new clsSolicitud;
	if($_SERVER["REQUEST_METHOD"]=="POST") {
		if(isset($_POST["aceptar"])) {
			//$objSolicitud->aceptar($_POST["aceptar"]);
			$accion = "aceptar";
			$nro = $_POST["aceptar"];
		}
		if(isset($_POST["rechazar"])) {
			//$objSolicitud->rechazar($_POST["rechazar"]);
			$accion = "rechazar";
			$nro = $_POST["rechazar"];
		}
		if(isset($_POST["volver"])) {
			echo "<script> location.href='".$_SERVER["PHP_SELF"]."?url=CONFIRMARREQUISICION'; </script>";
		}
		if(isset($accion) && !empty($accion)) {
			echo "<script> location.href='".$_SERVER["PHP_SELF"]."?url=CONFIRMARREQUISICION&accion=".$accion."&nro=".$nro." '; </script>";
		}
		if(isset($_POST["guardarAceptado"]) && !empty($_POST["guardarAceptado"])) {
			$objSolicitud->BEGIN();
			$error = false;

			if($objSolicitud->aceptarRequisicion($_POST["guardarAceptado"])) {
				$objInventario= new Inventario;
				$objInventario->responsable=0; //esta linea estará mientras tanto se arregla lo del responsable que esta en la otra base de datos en MySQL 
				$objInventario->motivo='Entrada por Requisición';
				$objInventario->tipomovimiento = 1;
				$objInventario->tipo = 3;
				$objInventario->nota_salida=$_POST["guardarAceptado"];
				if($objInventario->incluirMovimiento()) {
					//empezamos a incluir la transaccion
					$idMovimiento = $objInventario->buscarUltimo2();
					$objInventario->id = $idMovimiento;
					foreach($_POST["codigoDetalle"] as $index => $codigo) {
						$objSolicitud->codigoDetalle = $codigo;
						$objSolicitud->cantidadAprobada = $_POST["txtCantidadAprobada"][$index];
						$objSolicitud->guardarcantidadAprobada();
						//	Incluimos el detalle del inventario
						$objInventario->producto=$_POST['txtIDRepuesto'][$index];
						$objInventario->cantidad=$_POST["txtCantidadAprobada"][$index];
						if($objInventario->incluirDetalle()){
							$objInventario->idP = $_POST['txtIDRepuesto'][$index];
							$objInventario->cambiarStock("id_repuesto","trepuesto_lubricante",$_POST["txtCantidadAprobada"][$index],1);
						}
						else 
							$error = true;
					}
				}
				else
					$error = true;

				if(!$error){
					$objSolicitud->COMMIT();
					echo "<script> location.href='".$_SERVER["PHP_SELF"]."?url=CONFIRMARREQUISICION&si=1'; </script>";
				}
			}else{
				$objSolicitud->ROLLBACK();
				echo "<script> location.href='".$_SERVER["PHP_SELF"]."?url=CONFIRMARREQUISICION&si=0'; </script>";
			}
		}

		if(isset($_POST["guardarRechazado"]) && !empty($_POST["guardarRechazado"])) {
			if($objSolicitud->rechazarRequisicion($_POST["guardarRechazado"])) {
				$objSolicitud->motivo = $_POST["txtMotivo"];
				echo "<script> location.href='".$_SERVER["PHP_SELF"]."?url=CONFIRMARREQUISICION&si=1&r'; </script>";
			}else{
				echo "<script> location.href='".$_SERVER["PHP_SELF"]."?url=CONFIRMARREQUISICION&si=0&r'; </script>";
			}
		}

		
	}
	if(isset($_GET["accion"]) && ($_GET["accion"]=="aceptar" || $_GET["accion"]=="rechazar") ) {
		$Repuestos = $objSolicitud->buscarRequisicion("poraceptar",0,$_GET["nro"]);
	}
	$solicitudes = $objSolicitud->buscarRequisicion("solicitadas",0);
?>