<?php
	include_once('../modelo_alberto/clstmodelo_repuesto.php');

	$objModelo= new clstmodelo_repuesto(); 

	$objModelo->id_modelo_repuesto= $_POST['id_modelo'];
	$objModelo->id_marca_repuesto= $_POST['id_marca'];
	$objModelo->nombre_modelo_repuesto= strtoupper($_POST['nombre_modelo']);
	$objModelo->estatus='1'; 

	if($_POST['incluir']){
		if($objModelo->buscar()){
			$msj ='ya existe un módelo con ese nombre';
		}else{
			if($objModelo->incluir()!=-1){
				$msj = 'Modelo '.$_POST['nombre_modelo'].' se ha registrado exitosamente';
			}else{
				$msj = 'No se pudo registrar el modelo'.$_POST['nombre_modelo'];
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