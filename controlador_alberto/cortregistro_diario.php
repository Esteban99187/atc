<?php
	//---registro diario
	include_once('../modelo_alberto/clstregistro_diario.php');
	$mitregistro_diario = new clstregistro_diario(); 
	$mitregistro_diario->id_tregistro_diario = $_POST['id_tregistro_diario'];
	$mitregistro_diario->placa_unidad = $_POST['placa'];
	$mitregistro_diario->kilometraje = $_POST['kilometraje'];
	$mitregistro_diario->fecha = $_POST['fecha'];
	$mitregistro_diario->id_chofer = $_POST['id_chofer'];
	$mitregistro_diario->observacion = $_POST['observacion'];
	//	Soporte para guardar el kilometraje anterior
	$mitregistro_diario->kilometraje_anterior = $_POST['kilometraje_anterior'];
	//	Fin soporte

	//--cierre de registro diario
	//en esta funcion registraremos los kilometrajes con su cantidad actual
	function registrar_kilometrajes()
	{
		//nos traeremos el modelo de repuesto de la unidad
		include_once("../modelo_alberto/clstunidad.php");
		$unidad = new clstunidad();
		$unidad->placa_unidad = $_POST['placa'];
		$miunidad = $unidad->buscar();
		//esto sera solo para buscar el modelo de la unidad

		//ahora traeremos los lubricantes / repuestos de la unidad elegida
		include_once("../modelo_alberto/clstdetalle_unidades_repuesto.php");
		$unidades_repuesto = new clstdetalle_unidades_repuesto();
		$unidades_repuesto->idmodelo_unidad = $miunidad['idmodelo_unidad'];
		$miunidad_repuesto = $unidades_repuesto->buscar_lubricantes();
		
		//haremos la insersion de los datos
		include_once("../modelo_alberto/clsdetalle_registro_diario.php");
		$detalle_registro_diario = new clsdetalle_registro_diario();
		
		if($miunidad_repuesto)
		{
			foreach($miunidad_repuesto as $iunirepu => $miunidades_repuesto)
			{
				$detalle_registro_diario->placa_unidad = $_POST['placa'];
				$detalle_registro_diario->idmodelo_unidad = $miunidades_repuesto['idmodelo_unidad'];
				$detalle_registro_diario->id_repuesto = $miunidades_repuesto['id_repuesto'];
				$detalle_registro_diario->kminima = $miunidades_repuesto['kmin'];
				$detalle_registro_diario->kmaxima = $miunidades_repuesto['kmax'];
				//aqui haremos el registro
				$midetalle_registrodiario = $detalle_registro_diario->buscar();
				if($midetalle_registrodiario)
				{
					$detalle_registro_diario->kactual = ((int)$midetalle_registrodiario['kactual'] + (int)$_POST['consumo_diario']);
					$kactual_temp = ((int)$midetalle_registrodiario['kactual'] + (int)$_POST['consumo_diario']);
					$cont = "0";
					//actualizamos el valor del lubricantes
					//colocaremos el estatus del lubricante cuando sobrepasa el minimo pero es menor al maximo
					if($kactual_temp >= (int)$midetalle_registrodiario['kminima'] && $kactual_temp < (int)$midetalle_registrodiario['kmaxima'])
					{
						$cont =  '1';
						//en este caso se paso de kilometraje mínimo pero no el máximo
					}
					else if($kactual_temp >= (int)$midetalle_registrodiario['kmaxima'])
					{
						$cont =  '2';
						//esta sera una condicion para saber si ya me he pasado de la raya
					}
					//	Aun no he llegado al mínimo
					else
						$cont = '0';
					$detalle_registro_diario->estatus_mantenimiento = $cont;
					if($detalle_registro_diario->modificar())
						return true;
					else 
						return false;
					//cierre de la condicion
				}
				else
				{
					$detalle_registro_diario->kactual = (int)$_POST['consumo_diario'];
				
					if($detalle_registro_diario->kactual >= $detalle_registro_diario->kminima && $detalle_registro_diario->kactual < $detalle_registro_diario->kmaxima)
					{
						$detalle_registro_diario->estatus_mantenimiento = '1';
					}else if($detalle_registro_diario->kactual >= $detalle_registro_diario->kmaxima)
					{
						$detalle_registro_diario->estatus_mantenimiento = '2';
					}
					else
						$detalle_registro_diario->estatus_mantenimiento = '0';	
					if($detalle_registro_diario->incluir())
						return true;
					else
						return false;
					//aqui solo buscaremos
				}
			}
		}
	}


	if($_POST['incluir'])
	{
		if($mitregistro_diario->buscar())
		{
			$msj ='ya existe un dato con ese nombre';
		}
		else
		{
			$mitregistro_diario->BEGIN();
			if($mitregistro_diario->incluir())
			{
				//ahora registraremos los datos de kilometraje por repuesto
				if(registrar_kilometrajes()){
					$mitregistro_diario->COMMIT();
					$msj = "Registro Exitoso, \xbf Desea realizar otro registro?";
				}else
					$mitregistro_diario->ROLLBACK();
			}
			else
			{
				$mitregistro_diario->ROLLBACK();
				$msj = 'No se pudo realizar el registro diario';
			}
		}
	}



	if($_POST['buscar']){
		if($rows = $mitregistro_diario->buscar()){
			$existe = 'yes';
		}else{ 
			$msj = 'No existe '; 
		}
	}
	if($_POST['modificar']){
		if($mitregistro_diario->modificar()){
			$msj = 'Modificacion exitosa';
		}else{ 
			$msj = 'No se pudo modificar '; 
		}
	}
	if($_POST['eliminar']){
		if($mitregistro_diario->eliminar()){
			$msj = 'Eliminacion exitosa';
		}else{ 
			$msj = 'No se pudo Eliminar '; 
		}
	}
?>