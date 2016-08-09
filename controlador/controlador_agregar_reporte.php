<?php
	require_once("../modelo/class_perfil_reporte.php");
	$roles = new class_perfil_reporte;
	$can = count($_POST["rol"]);
	$idRol=$_POST["rol"];
	$idCargo=$_POST["idCargo"];
	for($i=0;$i<=$can-1;$i++)
	{
		$listo = $roles->guardarAsignacion($idCargo,$idRol[$i]);
	}
	if($listo)
	{
		echo '<script>window.location="../vista/admin.php?url=AsignarReporte&av=1"</script>';
	}
	else
	{
		echo '<script>window.location="../vista/admin.php?url=AsignarReporte&av=2"</script>';
	}
?>
