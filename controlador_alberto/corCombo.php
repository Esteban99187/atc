<?php
	//nos traeremos ls estados segun el pais escogido
	//nos traeremos el municipio
	if($_POST['valor']=="pais"){
		include_once("../modelo_alberto/clsCombo.php");
		$combo = new clsCombo();
		//son datos dinamicos estos
		$combo->id = $_POST['idpais'];
		$combo->tabla = "estado";
		$combo->colu = "idpais";
		//la busqueda se realiza aqui
		$combo->buscar();
		//hacemos la busqueda
		print("<option value=''>Seleccione el  Estado</option>");
		while ($micombo = $combo->row()) {
			print("<option value='".$micombo['idestado']."'> ".$micombo['desc_esta']."</option>");
		}
	}


	//nos traeremos el municipio segun el estado escogido
	if($_POST['valor']=="estado"){
		include_once("../modelo_alberto/clsCombo.php");
		$combo = new clsCombo();
		//son datos dinamicos estos
		$combo->id = $_POST['idestado'];
		$combo->tabla = "municipio";
		$combo->colu = "idestado";
		//la busqueda se realiza aqui
		$combo->buscar();
		//hacemos la busqueda
		print("<option value=''>Seleccione el municipio</option>");
		while ($micombo = $combo->row()) {
			print("<option value='".$micombo['idmunicipio']."'> ".$micombo['desc_muni']."</option>");
		}
	}


	//nos traeremos las parroquias segun el municipio escogido
	if($_POST['valor']=="municipio"){
		include_once("../modelo_alberto/clsCombo.php");
		$combo = new clsCombo();
		//son datos dinamicos estos
		$combo->id = $_POST['idmunicipio'];
		$combo->tabla = "parroquia";
		$combo->colu = "idmunicipio";
		//la busqueda se realiza aqui
		$combo->buscar();
		//hacemos la busqueda
		print("<option value=''>Seleccione la parroquia</option>");
		while ($micombo = $combo->row()) {
			print("<option value='".$micombo['idparroquia']."'> ".$micombo['desc_parr']."</option>");
		}
	}

	//****************************ESTO ES SOLO PARA LOS DATOS DE UNIDAD EJEMPLO, CARROCERIA ETC***************
	//buscar el serial del motor
	if($_POST['valor']=='buscar_serial_motor'){
		include_once("../modelo_alberto/clstunidad.php");
		$unidad = new clstunidad();
		$unidad->serial_motor =  $_POST['serial_motor'];
		if($unidad->buscar_serial_motor()){
			echo "1";
		}else{
			echo "0";
		}
	}


	if($_POST['valor']=='buscar_serial_carroceria'){
		include_once("../modelo_alberto/clstunidad.php");
		$unidad = new clstunidad();
		$unidad->serial_carroceria =  $_POST['serial_carroceria'];
		if($unidad->buscar_serial_carroceria()){
			echo "1";
		}else{
			echo "0";
		}

	}


	//verificar si la placa existe
	if($_POST['valor']=='buscar_placa'){
		include_once("../modelo_alberto/clstunidad.php");
		$unidad = new clstunidad();
		$unidad->placa_unidad =  $_POST['placa'];
		if($unidad->buscar_placa()){
			echo "1";
		}else{
			echo "0";
		}
	}

	//esto es para el mantenimiento correctivo
	if($_POST['valor']=="comboCorrectivo"){
		include_once("../modelo_alberto/clstdetalle_unidades_repuesto.php");
		$detalle = new tdetalle_unidades_repuesto();
		$detalle->placa_unidad = $_POST['placa'];
		$datos = $detalle->listar();

		print("<option value=''>Seleccione el repuesto</option>");
		foreach ($datos as $index => $midetalle) {
			print("<option value='".$midetalle['id_repuesto']."'> ".$midetalle['nombre_repuesto']."-".$midetalle['cantidad']."</option>");
		}
	}

	//----BUSCAR KILOMETRAJE DIARIO
	if($_POST['valor']=='buscar_kilometraje_diario'){
		include_once("../modelo_alberto/clstregistro_diario.php");
		$registro_diario = new  clstregistro_diario();
		$registro_diario->placa_unidad = $_POST['placa'];
		$total = $registro_diario->buscar_kilometraje_diario();
		echo $total['kilometraje'];	
	}

	//aqui buscaremos el repuesto
	
	if($_POST['valor']=="buscar_repuestos"){
		
		include_once("../modelo_alberto/clstdetalle_unidades_repuesto.php");
		$detalle = new clstdetalle_unidades_repuesto();
		$detalle->idmodelo_unidad = $_POST['modelounidad'];
		$datos = $detalle->buscar_repuestos();

		print("<option value=''>Seleccione el repuesto</option>");
		foreach ($datos as $index => $midetalle) {
			print("<option value='".$midetalle['id_repuesto']."'> ".$midetalle['nombre_repuesto']."-".$midetalle['cantidad']."</option>");
		}
	}

	//buscar los repuestos de una falla segun la adminsitracion de la misma
	if($_POST['valor']=="buscar_repuestos_falla") {
		include_once("../modelo_alberto/clstadministracion_falla.php");
		$detalle = new clstadministracion_falla();
		$detalle->idfalla = $_POST['idfalla'];
		$detalle->idmodelo_unidad = $_POST['modelounidad'];
		$detalle->buscar_repuestos();
		print("<option value=''>Seleccione el repuesto</option>");
		while ($midetalle = $detalle->row()) {
			print("<option value='".$midetalle['id_repuesto']."'> ".$midetalle['nombre_repuesto']."-".$midetalle['cantidad']."</option>");
		}

	}

	if($_POST["valor"]=="buscarFallasModelo") {
		include_once("../modelo_alberto/clsCombo.php");
		$combo = new clsCombo();
		$datos = $combo->buscarFallas($_POST["unidad"]);
		echo json_encode($datos);
	}
	if($_POST["valor"]=="buscarRepuestoFalla") {
		include_once("../modelo_alberto/clsCombo.php");
		$combo = new clsCombo();
		$datos = $combo->buscarRepuesto($_POST["falla"]);
		echo json_encode($datos);
	}


	

?>