<?php
	include_once('../modelo_alberto/clscaucho.php');

	$objcaucho= new clscaucho;
	if(isset($_POST["idcaucho"]) && $_POST["idcaucho"]!="-1")
		$objcaucho->idcaucho = $_POST["idcaucho"];

	$objcaucho->idmedida= strtoupper($_POST['txtMedida']);
	$objcaucho->idmarca= strtoupper($_POST['txtMarca']);
	$objcaucho->rin= strtoupper($_POST['rin']);

	if($_POST['incluir']){
		if($objcaucho->incluir()){
			$msj = 'caucho registrado exitosamente';
		}else{
			$msj = 'ERROR, caucho ya existe';
		}
	}

	if($_POST['buscar']){
		if($rows = $objcaucho->buscar()){
			$existe = 'yes';
		 }else{ 
			$msj = 'No existe '; 
		}
	}

	if($_POST['modificar']){
		if($objcaucho->modificar()){
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

	$cauchos = $objcaucho->listar();
?>