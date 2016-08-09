<?php
	require_once("../modelo/class_roles_responsabilidades.php");
	$roles = new roles;

	$datos = $_POST["perfil"];
	$operacion = $_POST["opt"];
	$id = $_POST["id"];

	switch ($operacion) {
		case 'Registrar':
			if($roles->ExistePerfil($datos)){
			if($roles->nuevoPerfil($datos)){
			   echo '<script>window.location="../vista/admin.php?url=perfiles&av=1"</script>';
			}else{
			   echo '<script>window.location="../vista/admin.php?url=perfiles&av=6"</script>';
			}
			}else{
				echo '<script>window.location="../vista/admin.php?url=perfiles&av=5"</script>';
			}
			break;
		case 'Modificar':
			if($roles->actualizarPerfil($id,$datos)){
			   echo '<script>window.location="../vista/admin.php?url=perfiles&av=3"</script>';
			}else{
			   echo '<script>window.location="../vista/admin.php?url=perfiles&av=6"</script>';
			}
			break;
		default:
			# code...
		break;
	}
?>
