<?php
	include_once('../modelo_alberto/clsmarcacaucho.php');

	$objmarca= new clsmarcacaucho;
	if(isset($_POST["idmarca"]) && $_POST["idmarca"]!="-1")
		$objmarca->idmarca = $_POST["idmarca"];

	$objmarca->descripcion= strtoupper($_POST['descripcion']);

	if($_POST['incluir']){
		if($objmarca->incluir()){
			$msj = 'marca de caucho '.$_POST["descripcion"].' registrado  exitosamente';
		}else{
			$msj = 'ERROR, marca de caucho '.$_POST["descripcion"].' ya existe';
		}
	}

	if($_POST['buscar']){
		if($rows = $objmarca->buscar()){
			$existe = 'yes';
		 }else{ 
			$msj = 'No existe '; 
		}
	}

	if($_POST['modificar']){
		if($objmarca->modificar()){
			$msj = 'Modificación exitosa';
		 }else{ 
			$msj = 'No se pudo modificar '; 
		}
	}

	if($_POST['eliminar']){
		if($_POST["estatus"]==1){
			$objmarca->eliminar(0);
			$msj = $_POST["descripcion"]." fué desactivado con exito";
		}else{
			$objmarca->eliminar(1);
			$msj = $_POST["descripcion"]." fué activado con exito";
		}
	}

	$marcas = $objmarca->listar();
?>