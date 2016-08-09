<?
@include_once("modelo/class_modulo.php");
@include_once("../modelo/class_modulo.php");
	$modulo = new modulo;

	$modulo->set_cod_modulo($_POST["cod_modulo"]);
	$modulo->set_nombre_mod($_POST["nombre_mod"]);
	$modulo->set_url_mod($_POST["url_mod"]);
	$modulo->set_rol_cod_rol($_POST["rol_cod_rol"]);

	if($_POST["registrar"]) 	if($modulo->consultar())		$msj='No se puede registrar, porque ya Existe.';
								elseif($modulo->registrar()=="1")	$msj='Registrado Correctamente';
								else 					 		$msj='No se puede registrar, intente de nuevo.';
	
	if($_POST["listar"]) 		if($modulo->listar("ASC")) 		{$hay_datos_listar=true;}else{$msj='No hay datos a listar.';
																			$hay_datos=false;
																			}
	
	if($_GET["consultar_ultimo_numero"]){
		echo $modulo->ultimo_id()+1;
		
		}
			//-------------------AL BUSCAR, LOS REGISTROS FORANEOS NO PUEDEN SER NULOS!!!
	if($_POST["buscar"])		{if($modulo->buscar()==1)		{$row_modulo=$modulo->row();}
								elseif($modulo->buscar()>1){
									$mas_de_uno=true;
									}else{
										
										$msj='No hay informacion para buscar';
										
										}
	}
								
								
									
	
	if($_POST["eliminar"])		if($modulo->eliminar())		$msj='Eliminado Correctamente';
								else							$msj='Fallo la Eliminacion';

	
	if($_POST["editar"])		if($modulo->editar())			{
		$modulo->consultar();
		$row_modulo=$modulo->row();
		$msj='Editado Correctamente';
		}
								else							$msj='No se Realizaron Cambios';
	
	if($_GET["verificar_id"])		if($modulo->consultar())			echo "1";		
	
	if($_POST["consultar"])		if($modulo->consultar())	{$row_modulo=$modulo->row();}else{
		$msj='No hay datos a consultar';
		
		}		;			
				

?>