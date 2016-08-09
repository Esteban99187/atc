<?php
	include_once("../modelo/clstmecanico.php");
	$objMecanico = new clstmecanico();

	if(isset($_POST["idmecanico"]) && $_POST["idmecanico"]!="-1")
		$objMecanico->idmecanico = $_POST["idmecanico"];

	$objMecanico->cedula= $_POST['cedula'];
	$objMecanico->nombre1= $_POST['nombre1'];
	$objMecanico->nombre2= $_POST['nombre2'];
	$objMecanico->apellido1= $_POST['apellido1'];
	$objMecanico->apellido2= $_POST['apellido2'];
	$objMecanico->sexo= $_POST['sexo'];
	$objMecanico->fecha_naci= $_POST['fecha_naci'];
	$objMecanico->estado_civil= $_POST['estado_civil'];
	$objMecanico->id_parroquia= $_POST['id_parroquia'];
	$objMecanico->direccion= $_POST['direccion'];
	$objMecanico->telefono= $_POST['telefono'];
	$objMecanico->correo= $_POST['correo'];
	$objMecanico->estatus='1'; 


	if($_POST['incluir']){
		if($objMecanico->incluir()){
			$msj = $_POST['nombre1']." Registrado exitosamente";
		}else{ 
			$msj = "Error al Registrar ".$_POST['nombre1'];
		}
	}

	if($_POST['buscar']){
		if($rows = $objMecanico->buscar()){
			$existe = 'yes';
		}else{ 
			$msj = 'No existe '; 
		}
	}

	if($_POST['modificar']){
		if($objMecanico->modificar()){
			$msj = 'Modificacion exitosa';
		}else{ 
			$msj = 'No se pudo modificar '; 
		}
	}

	if($_POST['eliminar']){
		if($_POST["estatus"]==1){
			$objMecanico->eliminar(0);
			$msj = $_POST["nombre1"]." fué desactivado con exito";
		}else{
			$objMecanico->eliminar(1);
			$msj = $_POST["nombre1"]." fué activado con exito";
		}
	}

	$mecanicos = $objMecanico->listar();
?>