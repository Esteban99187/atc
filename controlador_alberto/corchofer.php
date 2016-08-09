<?php

	include_once("../modelo_alberto/clstchofer.php");
	$mitchofer = new clstchofer();
	$mitchofer->cedula= $_POST['cedula'];
	$mitchofer->nombre1= $_POST['nombre1'];
	$mitchofer->nombre2= $_POST['nombre2'];
	$mitchofer->apellido1= $_POST['apellido1'];
	$mitchofer->apellido2= $_POST['apellido2'];
	$mitchofer->sexo= $_POST['sexo'];
	$mitchofer->fecha_naci= $_POST['fecha_naci'];
	$mitchofer->estado_civil= $_POST['estado_civil'];
	$mitchofer->id_parroquia= $_POST['id_parroquia'];
	$mitchofer->direccion= $_POST['direccion'];
	$mitchofer->telefono= $_POST['telefono'];
	$mitchofer->correo= $_POST['correo'];
	$mitchofer->grado_licencia = $_POST['grado_licencia'];
	$mitchofer->estatus='1'; 


	if($_POST['incluir']){
	if($mitchofer->incluir()!=-1){
		//una ves incluida ps colocaremos los datos del chof
		$msj = "Registro exitoso";
	 }else{ 
	  
	  $msj = 'Error al registrar'; 

	}
	 }

	if($_POST['buscar']){
	if($mitchofer->buscar_chofer($_POST['cedula'])){
		$existe = 'yes';
	 	$rows = $mitchofer->row();
	 }else{ 
	  $msj = 'No existe '; 
	}
	 }

	if($_POST['modificar']){
	if($mitchofer->modificar()){
		$msj = 'Datos actualizados';

		//modificamos en tchofer
		$mitchofer->cedula = $_POST['cedula'];
		$mitchofer->grado_licencia = $_POST['grado_licencia'];
		$mitchofer->modificar();
		//cierre del modificar

	 }else{ 
	 	 $msj = 'Datos actualizados ';
		 	 //modificamos en tchofer
			$mitchofer->cedula = $_POST['cedula'];
			$mitchofer->grado_licencia = $_POST['grado_licencia'];
			$mitchofer->modificar();
			//cierre del modificar 
		}
	 }

	if($_POST['eliminar']){
	if($mitchofer->eliminar()){
		$msj = 'Eliminacion exitosa';
	 }else{ 
	  $msj = 'No se pudo Eliminar '; 
	}
	 }
	if($_POST["evento"]=="busquedaRapida"){
		$datos = $mitchofer->buscarLike($_POST["valor"]);
		echo json_encode($datos);
	}

 ?>