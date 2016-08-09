<?php
	require_once("../modelo/class_asignar_submenu.php");
	$roles = new class_asignar_submenu;
	$can = count($_POST["rol"]);
	$idRol=$_POST["rol"];
	$idCargo=$_POST["idCargo"];
	for($i=0;$i<=$can-1;$i++)
	{
		$listo = $roles->guardarAsignacion($idCargo,$idRol[$i]);
	}
	if($listo)
	{
		echo '<script>window.location="../vista/admin.php?url=asignar_submenu&av=1"</script>';
	}
	else
	{
		echo '<script>window.location="../vista/admin.php?url=asignar_submenu&av=2"</script>';
	}
?>
