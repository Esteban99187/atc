<?php
		
	include_once("../modelo_alberto/clstsolicitud.php");	
	include_once("../modelo_alberto/clstsolicitud_mantenimiento.php");
	$tsolicitud = new clstsolicitud();
	$tsoli_mantenimiento = new clssolicitud_mantenimiento();

	$tsolicitud->nro_solicitud  = $_POST['nro_solicitud'];
	$tsolicitud->fecha_solicitud = $_POST['fecha_solicitud'];
	$tsolicitud->cedula_chofer = $_POST['cedula_chofer'];
	$tsolicitud->placa_unidad = $_POST['placa_unidad'];
	$tsolicitud->observacion_solicitud = $_POST['descripcion_solicitud'];


	//transaccion del formulario
	function transaccion(){

		//este sera para el detalle
		$detalle = new clstsolicitud();
		
		//for para la transaccion
		for($i=0; $i<count($_POST['repuestos']); $i++){
	
			//incluir el detalle
			$detalle->incluir_detalle($_POST['nro_solicitud'],$_POST['repuestos'][$i],$_POST['cantidad'][$i]);
		}
		//cierre de la transaccion
	}
	//cierre de la transaccion



	//se queremos incluir
	if($_POST['incluir']){
		if($tsolicitud->incluir()!=-1){
			//hacemos la transaccion
			transaccion();

			//guardar la solicitud para aceptarla o no
			$tsoli_mantenimiento->nro_solicitud = $_POST['nro_solicitud'];
			$tsoli_mantenimiento->descripcion = $_POST['descripcion_solicitud'];
			$tsoli_mantenimiento->tipo_solicitud = '1';
			$tsoli_mantenimiento->incluir();

			$msj = "Solicitud realizada exitosamente";
		}else{
			$msj = "No se pudo realizar la solicitud";
		}
	}



	//funcion para buscar
	if($_POST['buscar']){
		if($tsolicitud->buscar()){
			$rows = $tsolicitud->row();
			$existe = "yes";
		}else{
			$msj = "No existe";
		}
	}

	//si existe el get solicitud
	if($_GET['nro_solicitud']){

		$tsolicitud->nro_solicitud = $_GET['nro_solicitud'];
		if($tsolicitud->buscar()){
			$rows = $tsolicitud->row();
			$existe_aprobacion = "yes";
			$existe = "yes";
		}else{
			$msj = "No existe";
		}
	}//cierre de la solicitud



	//si la solicitud es aprobada
	if($_POST['Aprobar']){
		$tsolicitud->nro_solicitud = $_GET['nro_solicitud'];
		$tsolicitud->estatus = '1';
		$tsolicitud->estatus_aprobacion();
		$tsolicitud->estatus_aprobacion_detalle();
		$msj = "Solicitud Aprobada Exitosamente";
	}

	if($_POST['Rechazar']){
		$tsolicitud->nro_solicitud = $_GET['nro_solicitud'];
		$tsolicitud->estatus = '0';
		$tsolicitud->estatus_aprobacion();
		$tsolicitud->estatus_aprobacion_detalle();
		$msj = "Solicitud Rechazada Exitosamente";
	}




?>	