<?php
	require_once("../clases/class_particulares.php");
	require_once("../clases/class_bitacora.php");
	$b = new bitacora;
	$m = new usuarios;
	$accion = $_POST["opt"];
	$datos = array($_POST['cedula'],$_POST['nacionalidad'],$_POST['nombre'],$_POST['apellido'],$_POST['fecha_naci'],$_POST['sexo'],$_POST['telefono'],$_POST['correo'],$_POST['direccion']);
	$myId = $_POST["myId"];
	switch ($accion){
	case "Registrar":	
	if($m->nuevo_particulares($datos)){
		 if($b->addActividad(1,9)){
		 echo '<script>window.location="../administrador.php?url=particulares&ultimo='.$datos[1].'&tipo=1&av=1"</script>';
		}
	}else{
		echo "error";
	}
	break;
	case "Modificar":

	if($m->editar_particulares($datos,$_POST["id"])){
		if($b->addActividad(2,9)){
		echo '<script>window.location="../administrador.php?url=particulares&av=2"</script>';
		}	
	}else{
		echo "error";
	}
	
	break;
	}
?>