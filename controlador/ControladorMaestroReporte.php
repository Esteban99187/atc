<?php
	$NombreReporte = isset($_POST['NombreReporte']) ? $_POST['NombreReporte'] : null;
	$UrlReporte = isset($_POST['UrlReporte']) ? $_POST['UrlReporte'] : null;
	$DescripcionReporte = isset($_POST['DescripcionReporte']) ? $_POST['DescripcionReporte'] : null;
	$IdReporte = isset($_POST['IdReporte']) ? $_POST['IdReporte'] : null;
	require_once("../modelo/ClassReporte.php");
	$class_submenu = new ClassReporte;
	$datos_submenu = array($NombreReporte,$UrlReporte,$DescripcionReporte);
	$operacion = $_POST["opt"];
	$IdReporte = $IdReporte;
	switch ($operacion) 
	{
		case 'Registrar':
			if($class_submenu->ExisteOperacaion($datos_submenu[0]))
			{
				if($class_submenu->NuevaReporte($datos_submenu))
				{
				   echo '<script>window.location="../vista/admin.php?url=MaestroReporte&av=1"</script>';
				}
				else
				{
				   echo '<script>window.location="../vista/admin.php?url=MaestroReporte&av=6"</script>';
				}
			}
			else
			{
				echo '<script>window.location="../vista/admin.php?url=MaestroReporte&av=5"</script>';
			}
		break;
		case 'Modificar':
			if($class_submenu->ActualizarReporte($IdReporte,$datos_submenu))
			{
				echo '<script>window.location="../vista/admin.php?url=MaestroReporte&av=3"</script>';
			}
			else
			{
				echo '<script>window.location="../vista/admin.php?url=MaestroReporte&av=6"</script>';
			}
		break;
		default:
		break;
	}
?>
