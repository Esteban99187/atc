<?php
	require_once("../clases/class_respaldo.php");
	require_once("../clases/class_bitacora.php");
	$b  = new bitacora;
	$as = new Respaldo;

	if(isset($_POST["opt"])){
	$accion = $_POST["opt"];
	}else if($_GET["acc"]){
	$accion = $_GET["acc"];
	$idres = $_GET["idres"];
	$myId = $_GET["myId"];
	}
	switch ($accion) {
		case 'Guardar':
		$datos = array($_POST["dias"],date("Y-m-d"),$_POST["id"]);
		if($b->addActividad(6,12,$myId)){
		if($as->actualizar_configuracion($datos)){
	    echo '<script>window.location="../administrador.php?url=respaldo&av=1"</script>';
		}else{
		 echo '<script>window.location="../administrador.php?url=respaldo&av=9"</script>';
		}
		}
			break;
		
		case 're':
		sleep(3);
		if($b->addActividad(5,12,$myId)){
			if($as->cambioFecha()){
				if($as->respaldar(b)){
					echo '<script>window.location="administrador.php?url=respaldo&av=1"</script>';
						}else{
					echo '<script>window.location="administrador.php?url=respaldo&av=9"</script>';
					}
			}
		}
			break;

	    case 'res':
		sleep(5);
		if($b->addActividad(7,12,$myId)){
		$datos = $as->detalleRespaldo($idres);
		if($as->restaurador($datos[1])){
			echo '<script>window.location="../index.html"</script>';
		}else{
			echo "Ocurrio un problema , intente nuevamente.";
		}
		}
		break;
	}

?>
