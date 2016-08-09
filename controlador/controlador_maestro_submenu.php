<?php
	$nombre_submenu = isset($_POST['nombre_submenu']) ? $_POST['nombre_submenu'] : null;
	$url_submenu = isset($_POST['url_submenu']) ? $_POST['url_submenu'] : null;
	$descripcion_submenu = isset($_POST['descripcion_submenu']) ? $_POST['descripcion_submenu'] : null;
	$idsubmenu = isset($_POST['idsubmenu']) ? $_POST['idsubmenu'] : null;
	require_once("../modelo/ClassSubmenu.php");
	$class_submenu = new ClassSubmenu;
	$datos_submenu = array($nombre_submenu,$url_submenu,$descripcion_submenu);
	$operacion = $_POST["opt"];
	$idsubmenu = $idsubmenu;
	switch ($operacion) 
	{
		case 'Registrar':
			if($class_submenu->existe_submenu($datos_submenu[0]))
			{
				if($class_submenu->nuevo_submenu($datos_submenu))
				{
				   echo '<script>window.location="../vista/admin.php?url=maestro_submenu&av=1"</script>';
				}
				else
				{
				   echo '<script>window.location="../vista/admin.php?url=maestro_submenu&av=6"</script>';
				}
			}
			else
			{
				echo '<script>window.location="../vista/admin.php?url=maestro_submenu&av=5"</script>';
			}
		break;
		case 'Modificar':
			if($class_submenu->actualizar_submenu($idsubmenu,$datos_submenu))
			{
				echo '<script>window.location="../vista/admin.php?url=maestro_submenu&av=3"</script>';
			}
			else
			{
				echo '<script>window.location="../vista/admin.php?url=maestro_submenu&av=6"</script>';
			}
		break;
		default:
		break;
	}
?>
