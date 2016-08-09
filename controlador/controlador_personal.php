<?php

	$REMOTE_ADDR = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
	$status = isset($_POST['status']) ? $_POST['status'] : null;
	$cedula = isset($_POST['cedula']) ? $_POST['cedula'] : null;
	$nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null;

	require_once("../modelo/class_personal.php");
	require_once("../modelo/class_bitacora.php");
	$b = new bitacora;
	$m = new usuarios;
	$datos = array($cedula,$nacionalidad,$_POST["nombre"],$_POST["apellido"],$_POST["fecha_naci"],$_POST["sexo"],$_POST["fecha_in"],$status,$_POST["telefono"],$_POST["correo"],$_POST["direccion"]);
	$accion = $_POST["opt"];
	$myId = $_POST["myId"];
	switch ($accion){
	case "Registrar":

	if($m->chequea_existencia($_POST['cedula'])){
	if($m->nuevo_personal($datos)){
		 $b->addActividad(1,7,$myId,'a',$REMOTE_ADDR);
	echo '<script>window.location="../vista/administradortodo.php?url=personal&tipo=1&av=1"</script>';
	}else{
	echo '<script>window.location="../vista/administradortodo.php?url=personal&tipo=1&av=6"</script>';
	}
	}else{
	echo '<script>window.location="../vista/administradortodo.php?url=personal&tipo=1&av=5"</script>';
	}
	break;
	case "Modificar":

	if($m->editar_personal($datos,$_POST["id"])){
		if($b->addActividad(2,7,$myId,'a',$REMOTE_ADDR)){
		echo '<script>window.location="../vista/administradortodo.php?url=personal&av=3"</script>';
		}	
	}else{
		echo '<script>window.location="../vista/administradortodo.php?url=personal&av=6"</script>';
	}
	
	break;
	}
?>
