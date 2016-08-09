<?php
	include_once('../modelo_alberto/clstfalla.php');

	$objFalla= new clstfalla(); 
	if(isset($_POST["idfalla"]) && $_POST["idfalla"]!="-1")
		$objFalla->idfalla = $_POST["idfalla"];

	$objFalla->idfalla= $_POST['idfalla'];
	$objFalla->descripcion= $_POST['descripcion'];
	$objFalla->estatus=''; 


	if($_POST['incluir']){
		if($objFalla->incluir()){
			$msj = 'falla '.$_POST['descripcion'].' registrada exitosamente';
		}else{
			$msj = 'ERROR, falla '.$_POST['descripcion'].' ya existe registrada';
		}
	}

	if($_POST['buscar']){
		if($rows = $objFalla->buscar()){
			$existe = 'yes';
		 }else{ 
			$msj = 'No existe '.$_POST['descripcion']; 
		}
	}

	if($_POST['modificar']){
		if($objFalla->modificar()){
			$msj = 'Modificación exitosa';
		 }else{ 
			$msj = 'No se pudo modificar '; 
		}
	}

	if($_POST['eliminar']){
		if($_POST["estatus"]==1){
			$objMedida->eliminar(0);
			$msj = $_POST["descripcion"]." fué desactivado con exito";
		}else{
			$objMedida->eliminar(1);
			$msj = $_POST["descripcion"]." fué activado con exito";
		}
	}

	$fallas = $objFalla->listar();
?>