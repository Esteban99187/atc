<?php

	include_once("../modelo/class_equipo.php");
	$modulo = new equipo;

	include_once("../modelo/class_servicio_equipo.php");
	$servicio_modulo = new servicio_equipo;

	$registrar = isset($_POST['registrar']) ? $_POST['registrar'] : null ;
	$listar = isset($_POST['listar']) ? $_POST['listar'] : null ;
	$buscar = isset($_POST['buscar']) ? $_POST['buscar'] : null ;
	$consultar = isset($_POST['consultar']) ? $_POST['consultar'] : null ;
	$eliminar = isset($_POST['eliminar']) ? $_POST['eliminar'] : null ;
	$eliminar_servicio_modulo = isset($_POST['eliminar_servicio_modulo']) ? $_POST['eliminar_servicio_modulo'] : null ;
	$editar = isset($_POST['editar']) ? $_POST['editar'] : null ;
	$idunidad = isset($_POST['idunidad']) ? $_POST['idunidad'] : null ;
	$serial_motor = isset($_POST['serial_motor']) ? $_POST['serial_motor'] : null ;
	$placa = isset($_POST['placa']) ? $_POST['placa'] : null ;
	$idservicio_unidad = isset($_POST['idservicio_unidad']) ? $_POST['idservicio_unidad'] : null ;
	$nombre_equipo = isset($_POST['nombre_equipo']) ? $_POST['nombre_equipo'] : null ;
	$cantidad_equipo = isset($_POST['cantidad_equipo']) ? $_POST['cantidad_equipo'] : null ;
	$observacion_equipo = isset($_POST['observacion_equipo']) ? $_POST['observacion_equipo'] : null ;
	$consultar_ultimo_numero = isset($_GET['consultar_ultimo_numero']) ? $_GET['consultar_ultimo_numero'] : null ;
	$verificar_id = isset($_GET['verificar_id']) ? $_GET['verificar_id'] : null ;

	$modulo->set_idunidad($idunidad);
	$modulo->set_serial_motor($serial_motor);
	$modulo->set_placa($placa);
	$servicio_modulo->set_idservicio_unidad($idservicio_unidad);
	$servicio_modulo->set_nombre_equipo($nombre_equipo);
	$servicio_modulo->set_cantidad_equipo($cantidad_equipo);
	$servicio_modulo->set_observacion_equipo($observacion_equipo);
	$servicio_modulo->set_idunidad($idunidad);

	if($registrar) 
	{
		if($modulo->consultar())
		{
			$msj='No se puede registrar, porque ya Existe.';
		}
		elseif($modulo->registrar())
		{
			$u=1;
			while($_POST["idservicio_unidad_".$u] || $_POST["nombre_equipo_".$u])
			{
				$servicio_modulo->set_idservicio_unidad($_POST["idservicio_unidad_".$u]);
				$servicio_modulo->set_nombre_equipo($_POST["nombre_equipo_".$u]);
				$servicio_modulo->set_cantidad_equipo($_POST["cantidad_equipo_".$u]);
				$servicio_modulo->set_observacion_equipo($_POST["observacion_equipo_".$u]);
				if(($_POST["idservicio_unidad_".$u]!=-1) and ($_POST["nombre_equipo_".$u]!=-1) and ($_POST["cantidad_equipo_".$u]!=-1) and ($_POST["observacion_equipo_".$u]!=-1) and ($_POST["idunidad_".$u]!=-1))
				{
					$servicio_modulo->registrar();
				}
				$u++;
			}
			//esta linea es para q no consulte despues de registrar
			$_POST["idunidad"]="";
			$msj='Registrado Correctamente';
		}
	}

	if($listar)
	{
		if($modulo->listar("ASC"))
		{
			$hay_datos_listar=true;
		}
		else
		{
			$msj='No hay datos a listar.';
			$hay_datos=false;
		}
	}

	if($consultar_ultimo_numero)
	{
		echo $modulo->ultimo_id()+1;
	}

	if($verificar_id)
	{
		if($modulo->consultar())
		{
			echo "1";
		}
	}

	if($buscar)
	{
		if($modulo->buscar()==1)
		{
			$row_modulo=$modulo->row();
			$_POST["idunidad"]=$row_modulo[0];
		}
		elseif($modulo->buscar()>1)
		{
			$mas_de_uno=true;
		}
		else
		{
			$msj='No hay informacion para buscar';
		}
	}

	if($consultar)
	{
		if($modulo->consultar())
		{
			$btn_modo_consulta=true;
			$row_modulo=$modulo->row();
		}
		else
		{
			$msj='No Existe.';
		}
	}

	if($eliminar)
	{
		$modulo->eliminar();
		$msj='Eliminado Correctamente';
	}

	if($eliminar_servicio_modulo)
	{
		$servicio_modulo->set_idservicio_unidad($_POST["eliminar_servicio_modulo"]);
		$servicio_modulo->eliminar();
		//$msj='Eliminado Correctamente';
		$modulo->consultar();
		$row_modulo=$modulo->row();
		$btn_modo_consulta=true;
	}

	if($editar)
	{
		if(!$modulo->consultar())
		{
			$msj='No se puede modificar, porque no Existe.';
		}
		else
		{
			$modulo->editar();
			$servicio_modulo->eliminar_por("idunidad",$_POST["idunidad"]);$u=1;
			while(@$_POST["idservicio_unidad_".$u] || @$_POST["nombre_equipo_".$u])
			{
				$servicio_modulo->set_idservicio_unidad(@$_POST["idservicio_unidad_".$u]);
				$servicio_modulo->set_nombre_equipo($_POST["nombre_equipo_".$u]);
				$servicio_modulo->set_cantidad_equipo($_POST["cantidad_equipo_".$u]);
				$servicio_modulo->set_observacion_equipo($_POST["observacion_equipo_".$u]);
				
				if((@$_POST["idservicio_unidad_".$u]!=-1) and (@$_POST["nombre_equipo_".$u]!=-1) and (@$_POST["cantidad_equipo_".$u]!=-1) and (@$_POST["observacion_equipo_".$u]!=-1) and (@$_POST["idunidad_".$u]!=-1) and (@$_POST["idservicio_unidad_".$u]!=-1) and (@$_POST["nombre_equipo_".$u]!=-1) and (@$_POST["cantidad_equipo_".$u]!=-1) and (@$_POST["observacion_equipo_".$u]!=-1) and (@$_POST["idunidad_".$u]!=-1))
				{
					$servicio_modulo->registrar();
				}
				$u++;
			}
			$modulo->consultar();
			$row_modulo=$modulo->row();
					
			$btn_modo_consulta=true;
			$msj='Modificado Correctamente';
		}
	}

?>
