<?php
	include_once('../modelo_alberto/clstmarca.php');

	$objMarca= new clstmarca(); 

	$objMarca->id_marca_repuesto= $_POST['id_marca_repuesto'];
	$objMarca->nombre_marca= strtoupper($_POST['nombre_marca']);
	$objMarca->estatus='1'; 
	$objMarca->tipo_marca = $_POST['tipo_marca'];


	if($_POST['incluir']){
		if($objMarca->buscar()){
			$msj ='ya existe la marca '.$_POST["nombre_marca"];
		}else{
			if($objMarca->incluir()){
				$msj = 'Marca '.$_POST["nombre_marca"].' Registrado exitosamente';
			}else{
				$msj = 'Marca '.$_POST["nombre_marca"].' ya se encuentra registrada ';
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
			$msj = 'marca '.$_POST["nombre_marca"].' fue modificada con exito';
		}else{ 
			$msj = 'No se pudo modificar, '.$_POST["nombre_marca"].' ya existe registrada '; 
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