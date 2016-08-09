<?php
	include_once('../modelo_alberto/clsmarca_unidad.php');

	$objMarca= new clsmarca_unidad(); 

	$objMarca->idmarca_unidad= $_POST['idmarca_unidad'];
	$objMarca->desc_marc= strtoupper($_POST['desc_marc']);
	$objMarca->estatus_maruni='1'; 

	if($_POST['incluir']){
		if($objMarca->buscar()){
			$msj ='ya existe la marca '.$_POST["desc_marc"];
		}else{
			if($objMarca->incluir()){
				$msj = 'Marca '.$_POST["desc_marc"].' Registrado exitosamente';
			}else{
				$msj = 'Marca '.$_POST["desc_marc"].' ya se encuentra registrada ';
			}
		}
	}

	if($_POST['buscar']){
		if($rows = $objMarca->buscar()){
			$existe = 'yes';
		 }else{ 
			$msj = 'No existe'; 
		}
	}

	if($_POST['modificar']){
		if($objMarca->modificar()){
			$msj = 'marca '.$_POST["desc_marc"].' fue modificada con exito';
		}else{ 
			$msj = 'No se pudo modificar, '.$_POST["desc_marc"].' ya existe registrada '; 
		}
	}

	if($_POST['eliminar']){
		if($objMarca->eliminar()){
			$msj = 'Eliminacion exitosa';
		}else{ 
			$msj = 'No se pudo Eliminar '; 
		}
	}

	$marcas = $objMarca->listar();
?>