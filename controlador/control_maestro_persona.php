<?
session_start();

@include_once("modelo/class_persona.php");
@include_once("../modelo/class_persona.php");
	$persona = new persona;

	$persona->set_cedula($_POST["cedula"]);
	$persona->set_nacionalidad_per($_POST["nacionalidad_per"]);
	$persona->set_nombres_per($_POST["nombres_per"]);
	$persona->set_apellidos_per($_POST["apellidos_per"]);
	$persona->set_sexo_per($_POST["sexo_per"]);
	$persona->set_fecha_nacimiento_per($_POST["fecha_nacimiento_per"]);
	$persona->set_edad($_POST["edad"]);
	$persona->set_correo_per($_POST["correo_per"]);
	$persona->set_telefono_movil_per($_POST["telefono_movil_per"]);
	$persona->set_direccion_habitacion_per($_POST["direccion_habitacion_per"]);
	$persona->set_direccion_trabajo_per($_POST["direccion_trabajo_per"]);
	$persona->set_parroquia_habitacion_per($_POST["parroquia_habitacion_per"]);
	$persona->set_parroquia_trabajo_per($_POST["parroquia_trabajo_per"]);
	$persona->set_lugar_nacimiento($_POST["lugar_nacimiento"]);
	$persona->set_ocupacion_cod_ocupacion($_POST["ocupacion_cod_ocupacion"]);
	$persona->set_profesion_cod_profesion($_POST["profesion_cod_profesion"]);
	$persona->set_estatus_per($_POST["estatus_per"]);
	
	
	
	
	

	if($_POST["registrar"]) 	if($persona->consultar())		$msj='No se puede registrar, porque ya existe.';
								elseif($persona->registrar()=="1")	$msj='Registrado Correctamente';
								else 					 		$msj='No se puede registrar, intente de nuevo.';
	
	if($_POST["listar"]) 		if($persona->listar("ASC")) 		{$hay_datos_listar=true;}else{$msj='No hay datos a listar.';
																			$hay_datos=false;
																			}
	
	if($_GET["consultar_ultimo_numero"]){
		echo $persona->ultimo_id()+1;
		
		}
			//-------------------AL BUSCAR, LOS REGISTROS FORANEOS NO PUEDEN SER NULOS!!!
	if($_POST["buscar"])		{if($persona->buscar()==1)		{$row_persona=$persona->row();}
								elseif($persona->buscar()>1){
									$mas_de_uno=true;
									}else{
										
										$msj='No hay informacion para buscar';
										
										}
	}
								
								
									
	
	if($_POST["eliminar"])		if($persona->eliminar())		$msj='Eliminado Correctamente';
								else							$msj='Fallo la Eliminacion';

	
	if($_POST["editar"])		if($persona->editar())			{
		$persona->consultar();
		$row_persona=$persona->row();
		$msj='Editado Correctamente';
		}
								else							$msj='No se Realizaron Cambios';
	
	if($_GET["verificar_id"])		if($persona->consultar())			echo "1";		
	
	if($_POST["consultar"])		if($persona->consultar())	{$row_persona=$persona->row();}else{
		$msj='No hay datos a consultar';
		
		}		
		
		
				

?>
