<?php

	$REMOTE_ADDR = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
	$idPerfil = isset($_POST['idPerfil']) ? $_POST['idPerfil'] : null;
	$motivo = isset($_POST['motivo']) ? $_POST['motivo'] : null;
	$idTrabajador = isset($_POST['idTrabajador']) ? $_POST['idTrabajador'] : null;

	require_once("../modelo/class_usuarios.php");
	require_once("../modelo/class_bitacora.php");
	$b = new bitacora;
	$m = new usuariosex;
	$accion = $_POST["opt"];
	$myId  = $_POST["myId"];

	$datos2 = array($idTrabajador,$idPerfil);
	$envio = $_POST["envio"];
	switch ($accion){
	case "Crear usuario":

	if($m->chequea_existencia($datos2[0])){
    	echo '<script>window.location="../vista/administradortodo.php?url=usuarios&av=5&c='.$datos2[1].'"</script>';	
    }else{
	
	if($b->addActividad(1,1,$myId,'a',$REMOTE_ADDR)){
	   
        if($envio == 'b'){

		if($m->crearUsuarioPersonal($datos2[0],$datos2[1])){
		 echo '<script>window.location="../vista/administradortodo.php?url=usuarios&tipo=1&av=1"</script>';
		}else{
		 echo '<script>window.location="../vista/administradortodo.php?url=usuarios&tipo=1&av=6"</script>';
		}

		}else if($envio == 'a'){

		 if($m->nuevo_usuario($datos)){
	     echo '<script>window.location="../../index.php?av=2#a"</script>';
			}
		}
	}
}
	break;
	case "Modificar":

	if($m->editar_usuario($datos,$_POST["id"])){
		if($b->addActividad(2,1,$myId)){
		echo '<script>window.location="../vista/administrador.php?url=usuarios&ultimo='.$datos[1].'&tipo=1&av=2"</script>';
		}	
	}else{
		echo '<script>window.location="../vista/administrador.php?url=usuarios&ultimo='.$datos[1].'&tipo=1&av=8"</script>';
	}
	
	break;
	case "Guardar":
	$datos = array($_POST['telefono'],$_POST['correo']);
	if($m->editar_usuario2($datos,$_POST["id"]))
	{
		echo '<script>window.location="../vista/admin.php?url=miperfil&ultimo='.$datos[1].'&tipo=1&av=3"</script>';
	}
	else
	{
		echo '<script>window.location="../vista/admin.php?url=miperfil&ultimo='.$datos[1].'&tipo=1&av=33"</script>';
	}
	
	break;
	case "NuevaClave":
	$datos = array($_POST['Clave'],$_POST['NuevaClave']);
	if($m->NuevaClave($datos,$_POST["id"]))
	{
		echo '<script>window.location="../vista/admin.php?url=miclave&av=3"</script>';
	}
	else
	{
		echo '<script>window.location="../vista/admin.php?url=miclave&av=34"</script>';
	}
	
	break;
	
	case "Registrar":
	$datos = array($_POST['nacionalidad'],$_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['correo'],$_POST['clave'],$_POST['tipo']);
	if($m->chequea_existencia($_POST['cedula']))
	/*usuari externo ya existente regresa al index*/
	{
		echo '<script>window.location="../vista/administrador.php?url=usuarios&av=12&c='.$datos[1].'"</script>';	
	}
	else
	{
		if($m->nuevo_usuario($datos))
		{
			if($b->addActividad(1,1,$myId,'a',$REMOTE_ADDR))
			{
				if($envio == 'b')
				{	
					echo '<script>window.location="../vista/administrador.php?url=usuarios&ultimo='.$datos[1].'&tipo=1&av=1"</script>';
				}
				else if($envio == 'a')
				/*registra nuevo usuari externo corectamente y regresa al index*/
				{
					echo '<script>window.location="../index.php"</script>';
				}
			}
		}
		else
		{
			echo "error";
		}
	}
	break;

		case "Desactivar":

		$idUsuario = $_POST["idTrabajador"];
		$idMotivo = $motivo;

		if($m->BloqueoUsuario($idUsuario)){
			 echo '<script>window.location="../vista/admin.php?url=desactivarusuario&av=7"</script>';
		}else{
			 echo '<script>window.location="../vista/admin.php?url=desactivarusuario&av=8"</script>';
		}

		break;
		
		case "Desactivarexterno":

		$idUsuario = $_POST["idTrabajador"];
		$idMotivo = $motivo;

		if($m->BloqueoUsuarioexterno($idUsuario)){
			 echo '<script>window.location="../vista/admin.php?url=bloquearusuarioexterno&av=7"</script>';
		}else{
			 echo '<script>window.location="../vista/admin.php?url=bloquearusuarioexterno&av=8"</script>';
		}

		break;
	}
?>
