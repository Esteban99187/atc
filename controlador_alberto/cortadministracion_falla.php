<?php
	@include_once('../modelo_alberto/clstadministracion_falla.php');

	$objAdminFalla= new clstadministracion_falla(); 
	if(isset($_POST["idtadministracion_falla"]) && $_POST["idtadministracion_falla"]!="-1")
		$objAdminFalla->idtadministracion_falla = $_POST["idtadministracion_falla"];

	$objAdminFalla->idfalla= $_POST['idfalla'];
	$objAdminFalla->idmodelo_unidad= $_POST['idmodelo_unidad'];

	//aqui llamaremos a la transaccion
	function transaccion($eliminado=0) {
		include_once("../modelo_alberto/clstdetallefalla.php");
		$clstdetallefalla = new clstdetallefalla();
		$clstdetallefalla->idfalla = $_POST['idfalla'];
		$clstdetallefalla->idmodelo_unidad = $_POST['idmodelo_unidad'];


		if($eliminado==1){
			$clstdetallefalla->eliminarDetalle();
		}

		//abrimos el detalle de la transaccion
		for($i=0; $i<count($_POST['id_repuestos']);$i++){
			$clstdetallefalla->id_repuesto = $_POST['id_repuestos'][$i];
			$clstdetallefalla->cantidad = 0;
			//incluimos uno por uno
			$clstdetallefalla->incluir();
		}//cierre del for para incluir en el detalle 
	}
	//cierre de la transaccion


	if($_POST['incluir']){
		if($objAdminFalla->incluir()){
			//funcion para la transaccion
			transaccion();
			$msj = 'Fallas Registradas exisotasamente';
		}else{ 
			$msj = 'Error al registrar'; 
		}
	}

	if($_POST['buscar']){
		if($rows = $objAdminFalla->buscar()){
			$existe = 'yes';
		}else{ 
			$msj = 'No existe '; 
		}
	}

	if($_POST['modificar']){
		if($objAdminFalla->modificar()){
			transaccion(1);
			$msj = 'Modificacion exitosa';
		}else{ 
			$msj = 'No se pudo modificar '; 
		}
	}

	if($_POST['eliminar']){
		if($objAdminFalla->eliminar()){
			$msj = 'Eliminacion exitosa';
		}else{ 
			$msj = 'No se pudo Eliminar '; 
		}
	}

	$fallas = $objAdminFalla->listarFallas();
?>