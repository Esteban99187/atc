<?php
	include_once('../modelo_alberto/clstmodelo_unidad.php');

	$objModelo= new clstmodelo_unidad(); 

	$objModelo->idmodelo_unidad= $_POST['idmodelo_unidad'];
	$objModelo->idmarca_unidad= $_POST['idmarca_unidad'];
	$objModelo->desc_mode= strtoupper($_POST['desc_mode']);
	$objModelo->anio_modelo= $_POST['anio_modelo'];
	$objModelo->estatus_moduni='1'; 

	if($_POST['incluir']){
		if($objModelo->buscar()){
			$msj ='ya existe un módelo con ese nombre';
		}else{
			if($objModelo->incluir()!=-1){
				$msj = 'Modelo '.$_POST['desc_mode'].' se ha registrado exitosamente';
			}else{
				$msj = 'No se pudo registrar el modelo'.$_POST['desc_mode'];
			}
		}
	}

	if($_POST['buscar']){
		if($rows = $objModelo->buscar()){
			$existe = 'yes';
		 }else{ 
			$msj = 'No existe'; 
		}
	}

	if($_POST['modificar']){
		if($objModelo->modificar()){
			$msj = 'Modificacion exitosa';
		}else{
			$msj = 'No se pudo modificar '; 
		}
	}

	if($_POST['eliminar']){
		if($objModelo->eliminar()){
			$msj = 'Eliminacion exitosa';
		}else{ 
		  	$msj = 'No se pudo Eliminar ';
		}
	}

	$modelos = $objModelo->listar();
?>