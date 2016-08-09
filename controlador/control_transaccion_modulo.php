<? 

	include_once("../modelo/class_modulo.php");
	$modulo = new modulo;

	include_once("../modelo/class_servicio_modulo.php");
	$servicio_modulo = new servicio_modulo;

	$registrar = isset($_POST['registrar']) ? $_POST['registrar'] : null ;
	$listar = isset($_POST['listar']) ? $_POST['listar'] : null ;
	$buscar = isset($_POST['buscar']) ? $_POST['buscar'] : null ;
	$consultar = isset($_POST['consultar']) ? $_POST['consultar'] : null ;
	$eliminar = isset($_POST['eliminar']) ? $_POST['eliminar'] : null ;
	$eliminar_servicio_modulo = isset($_POST['eliminar_servicio_modulo']) ? $_POST['eliminar_servicio_modulo'] : null ;
	$editar = isset($_POST['editar']) ? $_POST['editar'] : null ;
	$cod_modulo = isset($_POST['cod_modulo']) ? $_POST['cod_modulo'] : null ;
	$nombre_mod = isset($_POST['nombre_mod']) ? $_POST['nombre_mod'] : null ;
	$url_mod = isset($_POST['url_mod']) ? $_POST['url_mod'] : null ;
	$rol_cod_rol = isset($_POST['rol_cod_rol']) ? $_POST['rol_cod_rol'] : null ;
	$cod_servicio_modulo = isset($_POST['cod_servicio_modulo']) ? $_POST['cod_servicio_modulo'] : null ;
	$nombre_ser_mod = isset($_POST['nombre_ser_mod']) ? $_POST['nombre_ser_mod'] : null ;
	$url_ser_mod = isset($_POST['url_ser_mod']) ? $_POST['url_ser_mod'] : null ;
	$estatus_ser_mod = isset($_POST['estatus_ser_mod']) ? $_POST['estatus_ser_mod'] : null ;
	$consultar_ultimo_numero = isset($_GET['consultar_ultimo_numero']) ? $_GET['consultar_ultimo_numero'] : null ;
	$verificar_id = isset($_GET['verificar_id']) ? $_GET['verificar_id'] : null ;
	
	$modulo->set_cod_modulo($cod_modulo);
	$modulo->set_nombre_mod($nombre_mod);
	$modulo->set_url_mod($url_mod);
	$modulo->set_rol_cod_rol($rol_cod_rol);
	$servicio_modulo->set_cod_servicio_modulo($cod_servicio_modulo);
	$servicio_modulo->set_nombre_ser_mod($nombre_ser_mod);
	$servicio_modulo->set_url_ser_mod($url_ser_mod);
	$servicio_modulo->set_estatus_ser_mod($estatus_ser_mod);
	$servicio_modulo->set_cod_modulo($cod_modulo);

	if($registrar) 
	{

		if($modulo->consultar())
		{
			$msj='No se puede registrar, porque ya Existe.';
		}

		elseif($modulo->registrar())
		{

			$u=1;

			while(@$_POST["cod_servicio_modulo_".$u] || @$_POST["nombre_ser_mod_".$u])
			{
				$servicio_modulo->set_cod_servicio_modulo(@$_POST["cod_servicio_modulo_".$u]);
				$servicio_modulo->set_nombre_ser_mod($_POST["nombre_ser_mod_".$u]);
				$servicio_modulo->set_url_ser_mod($_POST["url_ser_mod_".$u]);
				$servicio_modulo->set_estatus_ser_mod($_POST["estatus_ser_mod_".$u]);
				if((@$_POST["cod_servicio_modulo_".$u]!=-1) and ($_POST["nombre_ser_mod_".$u]!=-1) and ($_POST["url_ser_mod_".$u]!=-1) and ($_POST["estatus_ser_mod_".$u]!=-1) and (@$_POST["cod_modulo_".$u]!=-1))
				{
					$servicio_modulo->registrar();
				}
				$u++;
			}
			//esta linea es para q no consulte despues de registrar
			$_POST["cod_modulo"]="";


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
			$cod_modulo=$row_modulo[0];
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
		$servicio_modulo->set_cod_servicio_modulo($_POST["eliminar_servicio_modulo"]);
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

			$servicio_modulo->eliminar_por("cod_modulo",$cod_modulo);$u=1;

			while(@$_POST["cod_servicio_modulo_".$u] || @$_POST["nombre_ser_mod_".$u])
			{
				$servicio_modulo->set_cod_servicio_modulo(@$_POST["cod_servicio_modulo_".$u]);
				$servicio_modulo->set_nombre_ser_mod($_POST["nombre_ser_mod_".$u]);
				$servicio_modulo->set_url_ser_mod($_POST["url_ser_mod_".$u]);
				$servicio_modulo->set_estatus_ser_mod($_POST["estatus_ser_mod_".$u]);

				if((@$_POST["cod_servicio_modulo_".$u]!=-1) and (@$_POST["nombre_ser_mod_".$u]!=-1) and (@$_POST["url_ser_mod_".$u]!=-1) and (@$_POST["estatus_ser_mod_".$u]!=-1) and (@$_POST["cod_modulo_".$u]!=-1) and (@$_POST["cod_servicio_modulo_".$u]!=-1) and (@$_POST["nombre_ser_mod_".$u]!=-1) and (@$_POST["url_ser_mod_".$u]!=-1) and (@$_POST["estatus_ser_mod_".$u]!=-1) and (@$_POST["cod_modulo_".$u]!=-1))
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
