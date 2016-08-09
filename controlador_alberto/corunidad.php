<?php
	include_once('../modelo_alberto/clsunidad.php');
	$ObjUnidad= new clsunidad(); 
	if(isset($_POST["idunidad"]) && $_POST["idunidad"]!="-1")
		$ObjUnidad->idunidad = $_POST["idunidad"];

	$ObjUnidad->idunidad= $_POST['idunidad'];
	$ObjUnidad->serial_motor= $_POST['serial_motor'];
	$ObjUnidad->serial_carroceria= $_POST['serial_carroceria'];
	$ObjUnidad->placa= $_POST['placa'];
	$ObjUnidad->observaciones= $_POST['observaciones'];
	$ObjUnidad->idmodelo_unidad= $_POST['idmodelo_unidad'];
	
	if($_POST['incluir']){
		if($ObjUnidad->incluir()){
			$msj = 'Unidad '.$_POST["placa"].' registrado  exitosamente';
		}else{
			$msj = 'ERROR, Unidad'.$_POST["placa"].' ya existe';
		}
	}
	if($_POST['buscar']){
		if($rows = $ObjUnidad->buscar()){
			$existe = 'yes';
		 }else{ 
			$msj = 'No existe '; 
		}
	}
	if($_POST['modificar']){
		if($ObjUnidad->modificar()){
			$msj = 'Modificacion exitosa';
		 }else{ 
			$msj = 'No se pudo modificar '; 
		}
	}
	if($_POST['eliminar']){
		if($_POST["estatus"]==1){
			$ObjUnidad->eliminar(0);
			$msj = $_POST["placa"]." fué desactivado con exito";
		}else{
			$ObjUnidad->eliminar(1);
			$msj = $_POST["placa"]." fué activado con exito";
		}
	}
	if($_POST["evento"]=="busquedaRapida"){
		if(!empty($_POST["valor"])){
			$datos = $ObjUnidad->buscarLike($_POST["valor"],$_POST["validarEntrada"]);
			echo json_encode($datos);
		}
	}
	$unidades = $ObjUnidad->listar();
?>