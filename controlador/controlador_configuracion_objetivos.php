<?php
require_once("../modelo/class_configuracion.php");
$us=new configuracion;

$datos = array($_POST["objetivos"]);
if($us->actulizar_objetivos($datos)){
	echo '<script>window.location="../vista/admin.php?url=configuracion_objetivos&tipo=1&av=3"</script>';
}else{
	echo '<script>window.location="../vista/admin.php?url=configuracion_objetivos&tipo=1&av=8"</script>';
}
?>
