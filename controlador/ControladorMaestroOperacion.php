<?php
	$NombreOperacion = isset($_POST['NombreOperacion']) ? $_POST['NombreOperacion'] : null;
	$UrlOperacion = isset($_POST['UrlOperacion']) ? $_POST['UrlOperacion'] : null;
	$DescripcionOperacion = isset($_POST['DescripcionOperacion']) ? $_POST['DescripcionOperacion'] : null;
	$IdOperacion = isset($_POST['IdOperacion']) ? $_POST['IdOperacion'] : null;
	require_once("../modelo/ClassOperacion.php");
	$class_submenu = new ClassOperacion;
	$datos_submenu = array($NombreOperacion,$UrlOperacion,$DescripcionOperacion);
	$operacion = $_POST["opt"];
	$IdOperacion = $IdOperacion;
	switch ($operacion) 
	{
		case 'Registrar':
			if($class_submenu->ExisteOperacaion($datos_submenu[0]))
			{
				if($class_submenu->NuevaOperacion($datos_submenu))
				{
				   echo '<script>window.location="../vista/admin.php?url=MaestroOperacion&av=1"</script>';
				}
				else
				{
				   echo '<script>window.location="../vista/admin.php?url=MaestroOperacion&av=6"</script>';
				}
			}
			else
			{
				echo '<script>window.location="../vista/admin.php?url=MaestroOperacion&av=5"</script>';
			}
		break;
		case 'Modificar':
			if($class_submenu->ActualizarOperacion($IdOperacion,$datos_submenu))
			{
				echo '<script>window.location="../vista/admin.php?url=MaestroOperacion&av=3"</script>';
			}
			else
			{
				echo '<script>window.location="../vista/admin.php?url=MaestroOperacion&av=6"</script>';
			}
		break;
		default:
		break;
	}
?>
