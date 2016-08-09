<?php
	$nombrerol = isset($_POST['nombrerol']) ? $_POST['nombrerol'] : null;
	$url = isset($_POST['url']) ? $_POST['url'] : null;
	$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$ins = isset($_POST['ins']) ? $_POST['ins'] : null;
	$con = isset($_POST['con']) ? $_POST['con'] : null;
	$mod = isset($_POST['mod']) ? $_POST['mod'] : null;
	$eli = isset($_POST['eli']) ? $_POST['eli'] : null;
	$res = isset($_POST['res']) ? $_POST['res'] : null;
	require_once("../modelo/class_asignar_operacion_menu.php");
	$roles = new class_asignar_operacion_menu;
	$datos = array($nombrerol,$url,$descripcion);
	$operacion = $_POST["opt"];
	$id = $id;
	switch ($operacion) 
	{
		case 'Registrar':
			if($roles->ExisteRol($datos[0]))
			{
				if($roles->nuevoRol($datos))
				{
				   echo '<script>window.location="../vista/admin.php?url=roles&av=1"</script>';
				}
				else
				{
				   echo '<script>window.location="../vista/admin.php?url=roles&av=6"</script>';
				}
			}
			else
			{
				echo '<script>window.location="../vista/admin.php?url=roles&av=5"</script>';
			}
		break;
		case 'Modificar':
			if($roles->actualizarRol($id,$datos))
			{
				echo '<script>window.location="../vista/admin.php?url=roles&av=3"</script>';
			}
			else
			{
				echo '<script>window.location="../vista/admin.php?url=roles&av=6"</script>';
			}
		break;
		case 'Guardar':
			$rol = $_POST["idRol"];
			$cargo = $_POST["idCargo2"];
			$insertar = $ins;
			$consulta = $con;
			$modifica = $mod;
			$elimina = $eli;
			$restaura = $res;
			$cuantosroles = count($rol);
			for($i=0;$i<=$cuantosroles;$i++)
			{
				@$Responsabilidad = array($insertar[$rol[$i]][0],$consulta[$rol[$i]][0],$modifica[$rol[$i]][0],$elimina[$rol[$i]][0],$restaura[$rol[$i]][0]);
				$listo = $roles-> ActualizarResponsabilidades (@$rol[$i],$cargo,@$Responsabilidad);	
			}
			if($listo)
			{
				echo '<script>window.location="../vista/admin.php?url=asignarResponsabilidades&av=1"</script>';
			}
			else
			{
				echo '<script>window.location="../vista/admin.php?url=asignarResponsabilidades&av=2"</script>';
			}
		break;
		default:
		break;
	}
?>
