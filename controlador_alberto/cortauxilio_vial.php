<?php
include_once('../modelo_alberto/clstauxilio_vial.php');
include_once("../modelo_alberto/clstsolicitud_mantenimiento.php");


$mitauxilio_vial= new clstauxilio_vial(); 
$tsoli_mantenimiento = new clssolicitud_mantenimiento();

$mitauxilio_vial->id_auxilio_vial= $_POST['id_auxilio_vial'];
$mitauxilio_vial->placa_unidad= $_POST['placa_unidad'];
$mitauxilio_vial->fecha_auxilio_vial= $_POST['fecha_auxilio_vial'];
$mitauxilio_vial->descripcion_accidente= $_POST['descripcion_accidente'];
$mitauxilio_vial->id_parroquia= $_POST['id_parroquia'];
$mitauxilio_vial->direccio_detallada= $_POST['direccio_detallada'];
$mitauxilio_vial->descripcion_materiales = $_POST['descripcion_materiales'];



if($_POST['incluir']){
	if($mitauxilio_vial->buscar()){
	$msj ='ya existe un dato con ese nombre';
	}else{
	if($mitauxilio_vial->incluir()!=-1){
		$msj = 'Historial de auxilio vial registrado exitosamente';
			//guardar la solicitud para aceptarla o no
			$tsoli_mantenimiento->nro_solicitud = $_POST['id_auxilio_vial'];
			$tsoli_mantenimiento->descripcion = $_POST['descripcion_accidente'];
			$tsoli_mantenimiento->tipo_solicitud = '2'; //del tipo auxilio vial
			$tsoli_mantenimiento->incluir();


	}else{
	$msj = 'No se pudo registrar el auxilio vial';
	}
	}
}

if($_POST['buscar']){
	if($mitauxilio_vial->buscar()){
		$existe = 'yes';
	 	$rows = $mitauxilio_vial->row();
	 }else{ 
	  $msj = 'No existe '; 
	}
 }


	//si existe el get solicitud
	if($_GET['nro_solicitud']){

		$mitauxilio_vial->id_auxilio_vial = $_GET['nro_solicitud'];
		if($mitauxilio_vial->buscar()){
			$rows = $mitauxilio_vial->row();
			$existe_aprobacion = "yes";
			$existe = "yes";
		}else{
			$msj = "No existe";
		}
	}//cierre de la solicitud




	//si la solicitud es aprobada
	if($_POST['Aprobar']){
		$mitauxilio_vial->id_auxilio_vial = $_GET['nro_solicitud'];
		$mitauxilio_vial->estatus = '1';
		$mitauxilio_vial->estatus_aprobacion();
		$mitauxilio_vial->estatus_aprobacion_detalle();
		$msj = "Solicitud Aprobada Exitosamente";
	}

	if($_POST['Rechazar']){
		$mitauxilio_vial->id_auxilio_vial = $_GET['nro_solicitud'];
		$mitauxilio_vial->estatus = '0';
		$mitauxilio_vial->estatus_aprobacion();
		$mitauxilio_vial->estatus_aprobacion_detalle();
		$msj = "Solicitud Rechazada Exitosamente";
	}



if($_POST['modificar']){
	if($mitauxilio_vial->modificar()){
		$msj = 'Modificacion exitosa';
	 }else{ 
	  $msj = 'No se pudo modificar '; 
	}
 }

if($_POST['eliminar']){
	if($mitauxilio_vial->eliminar()){
		$msj = 'Eliminacion exitosa';
	 }else{ 
	  $msj = 'No se pudo Eliminar '; 
	}
	 }
 ?>