<?php
	include_once('../modelo_alberto/clsmedidacaucho.php');

	$objMedida= new clsmedidacaucho;
	if(isset($_POST["idMedida"]) && $_POST["idMedida"]!="-1")
		$objMedida->idMedida = $_POST["idMedida"];

	$objMedida->descripcion= strtoupper($_POST['descripcion']);

	if($_POST['incluir']){
		if($objMedida->incluir()){
			$msj = 'Medida de caucho '.$_POST["descripcion"].' registrado  exitosamente';
		}else{
			$msj = 'ERROR, Medida de caucho '.$_POST["descripcion"].' ya existe';
		}
	}

	if($_POST['buscar']){
		if($rows = $objMedida->buscar()){
			$existe = 'yes';
		 }else{ 
			$msj = 'No existe '; 
		}
	}

	if($_POST['modificar']){
		if($objMedida->modificar()){
			$msj = 'Modificacion exitosa';
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

	$medidas = $objMedida->listar();
?>