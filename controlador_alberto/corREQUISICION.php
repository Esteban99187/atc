<?php
	require_once("../modelo_alberto/clsSolicitud.php");
	$objSolicitud = new clsSolicitud;

	if(isset($_POST["btnAceptar"])){
		$objSolicitud->fecha = $_POST["txtFechaEntrada"];
		$arrSolicitante = explode(" - ", $_POST["txtSolicitante"]);
		$objSolicitud->solicitante = $arrSolicitante[0];
		$objSolicitud->observacion = $_POST["txtObservacion"];

		$objSolicitud->BEGIN();
		$error = false;
		if($objSolicitud->guardarRequisicion()){
			$ultimoRegistro = $objSolicitud->buscarUltimo("trequisicon","idrequisicion");
			$objSolicitud->idrequisicion = intval( $ultimoRegistro );
			foreach ($_POST["id_repuestos"] as $index => $repuesto) {
				$objSolicitud->repuesto = $repuesto;
				$objSolicitud->cantidad = $_POST["cantidad"][$index];
				if(!$objSolicitud->guardarDetalleRequisicion()){
					$error = true;
					break;
				}
			}
			if($error){
				$msj = "Error inesperado en la requisición, contacte al administrador";
				$objSolicitud->ROLLBACK();
			}else{
				$msj = "requisición guardada bajo el nro: ".$_POST["txtNroRequisicion"];
				$objSolicitud->COMMIT();
			}
		}else{
			$msj = "Error inesperado en la requisición, contacte al administrador";
			$objSolicitud->ROLLBACK();
		}
	}

	$ultimoRegistro = intval ( $objSolicitud->buscarUltimo("trequisicon","idrequisicion") + 1 ) ;
?>