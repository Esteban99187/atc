<?php
	require_once("../modelo/class_asignar_operacion_submenu.php");
	$roles = new class_asignar_operacion_submenu;
	$can = count($_POST["rol"]);
	$idRol=$_POST["rol"];
	$IdSubmenu=$_POST["IdSubmenu"];
	for($i=0;$i<=$can-1;$i++)
	{
		$listo = $roles->GuardarSubmenuOperacion($IdSubmenu,$idRol[$i]);
	}
	if($listo)
	{
		echo '<script>window.location="../vista/admin.php?url=asignar_operacion_submenu&av=1"</script>';
	}
	else
	{
		echo '<script>window.location="../vista/admin.php?url=asignar_operacion_submenu&av=2"</script>';
	}
?>
