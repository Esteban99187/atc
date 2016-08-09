<?php
	require_once("../modelo/class_asignar_operacion_menu.php");
	$roles = new class_asignar_operacion_menu;
	$can = count($_POST["rol"]);
	$idRol=$_POST["rol"];
	$IdMenu=$_POST["IdMenu"];
	for($i=0;$i<=$can-1;$i++)
	{
		$listo = $roles->GuardarmenuOperacion($IdMenu,$idRol[$i]);
	}
	if($listo)
	{
		echo '<script>window.location="../vista/admin.php?url=asignar_operacion_menu&av=1"</script>';
	}
	else
	{
		echo '<script>window.location="../vista/admin.php?url=asignar_operacion_menu&av=2"</script>';
	}
?>
