<?
@include_once("modelo/class_servicio_modulo.php");
@include_once("../modelo/class_servicio_modulo.php");
	$servicio_modulo = new servicio_modulo;

	$servicio_modulo->set_cod_servicio_modulo($_POST["cod_servicio_modulo"]);
	$servicio_modulo->set_nombre_ser_mod($_POST["nombre_ser_mod"]);
	$servicio_modulo->set_url_ser_mod($_POST["url_ser_mod"]);
	$servicio_modulo->set_estatus_ser_mod($_POST["estatus_ser_mod"]);
	$servicio_modulo->set_cod_modulo($_POST["cod_modulo"]);

	if($_POST["registrar"]) 	if($servicio_modulo->consultar())		$msj='No se puede registrar, porque ya Existe.';
								elseif($servicio_modulo->registrar()=="1")	$msj='Registrado Correctamente';
								else 					 		$msj='No se puede registrar, intente de nuevo.';
	
	if($_POST["listar"]) 		if($servicio_modulo->listar("ASC")) 		{$hay_datos_listar=true;}else{$msj='No hay datos a listar.';
																			$hay_datos=false;
																			}
	
	if($_GET["consultar_ultimo_numero"]){
		echo $servicio_modulo->ultimo_id()+1;
		
		}
			//-------------------AL BUSCAR, LOS REGISTROS FORANEOS NO PUEDEN SER NULOS!!!
	if($_POST["buscar"])		{if($servicio_modulo->buscar()==1)		{$row_servicio_modulo=$servicio_modulo->row();}
								elseif($servicio_modulo->buscar()>1){
									$mas_de_uno=true;
									}else{
										
										$msj='No hay informacion para buscar';
										
										}
	}
								
								
									
	
	if($_POST["eliminar"])		if($servicio_modulo->eliminar())		$msj='Eliminado Correctamente';
								else							$msj='Fallo la Eliminacion';

	
	if($_POST["editar"])		if($servicio_modulo->editar())			{
		$servicio_modulo->consultar();
		$row_servicio_modulo=$servicio_modulo->row();
		$msj='Editado Correctamente';
		}
								else							$msj='No se Realizaron Cambios';
	
	if($_GET["verificar_id"])		if($servicio_modulo->consultar())			echo "1";		
	
	if($_POST["consultar"])		if($servicio_modulo->consultar())	{$row_servicio_modulo=$servicio_modulo->row();}else{
		$msj='No hay datos a consultar';
		
		}		;			
				

?>