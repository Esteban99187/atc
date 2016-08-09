<?php

		$REMOTE_ADDR = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;

	
	require_once("../clases/class_actividad.php");
	require_once("../clases/class_bitacora.php");
	$b = new bitacora;
	$m = new cargo;
	$datos = array($_POST['actividad'],$_POST['duracion']);
	$myId = $_POST["myId"];
	$accion = $_POST["opt"];

	switch ($accion){
	case "Registrar":	

	if($m->chequea_existencia($datos)){
		if($m->nuevo_actividad($datos)){
			if($b->addActividad(1,5,$myId,'a',$REMOTE_ADDR)){
		 echo '<script>window.location="../administradortodo.php?url=actividad&tipo=1&av=1"</script>';
		}
	}else{
		echo '<script>window.location="../administradortodo.php?url=actividad&tipo=1&av=6"</script>';
	}
}else{
	echo '<script>window.location="../administradortodo.php?url=actividad&tipo=1&av=5"</script>';
}
	break;
	case "Modificar":

	if($m->modificar_actividad($datos,$_POST["id"])){
		if($b->addActividad(2,5,$myId,'a',$REMOTE_ADDR)){
		 echo '<script>window.location="../administradortodo.php?url=actividad&av=3"</script>';
		}	
	}else{
		echo '<script>window.location="../administradortodo.php?url=actividad&tipo=1&av=6"</script>';
	}
	
	break;
	}
?>
