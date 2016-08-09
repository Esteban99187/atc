<?php
	require_once("../modelo/class_reportes.php");
	$roles = new Reportes;

	$datos = array($_POST["nombreReporte"],$_POST["url"],$_POST["descripcion"]);
	$operacion = $_POST["opt"];
	$id = $_POST["id"];

	switch ($operacion) {
		case 'Registrar':
			if($roles->RevisionReporte($datos[0])){
			if($roles->nuevoReporte($datos)){
			   echo '<script>window.location="../vista/admin.php?url=crearReportes&av=1"</script>';
			}else{
			   echo '<script>window.location="../vista/admin.php?url=crearReportes&av=6"</script>';
			}
			}else{
				echo '<script>window.location="../vista/admin.php?url=crearReportes&av=5"</script>';
			}
				break;
		/*case 'Guardar2':

		$rol = $_POST["idRol"];
		$cargo = $_POST["idCargo"];

		$insertar = $_POST["ins"];
		$consulta = $_POST["con"];
		$modifica = $_POST["mod"];
		$elimina = $_POST["eli"];
		$restaura = $_POST["res"];
		$cuantosroles = count($rol);
		for($i=0;$i<=$cuantosroles-1;$i++){	
			$Responsabilidad = array($insertar[$rol[$i]][0],$consulta[$rol[$i]][0],$modifica[$rol[$i]][0],$elimina[$rol[$i]][0],$restaura[$rol[$i]][0]);
			$roles->GuardarResponsabilidades($rol[$i],$cargo,$Responsabilidad);
		}
		break;
		*/
		case 'Modificar':
		if($roles->actualizarRol($id,$datos)){
			   echo '<script>window.location="../admin.php?url=roles&av=3"</script>';
			}else{
			   echo '<script>window.location="../admin.php?url=roles&av=6"</script>';
			}
		break;
		
		case 'Guardar':


		$rol = $_POST["idRol"];
		$cargo = $_POST["idCargo2"];

		$insertar = $_POST["ins"];
		$consulta = $_POST["con"];
		$modifica = $_POST["mod"];
		$elimina = $_POST["eli"];
		$restaura = $_POST["res"];
		$cuantosroles = count($rol);

		for($i=0;$i<=$cuantosroles;$i++){	
			$Responsabilidad = array($insertar[$rol[$i]][0],$consulta[$rol[$i]][0],$modifica[$rol[$i]][0],$elimina[$rol[$i]][0],$restaura[$rol[$i]][0]);
			$listo = $roles->ActualizarResponsabilidades($rol[$i],$cargo,$Responsabilidad);	
		}

		if($listo){
			   echo '<script>window.location="../admin.php?url=asignarResponsabilidades&av=1"</script>';
			}else{
			   echo '<script>window.location="../admin.php?url=asignarResponsabilidades&av=2"</script>';
			}

		break;
		default:
			# code...
		break;
	}
?>
