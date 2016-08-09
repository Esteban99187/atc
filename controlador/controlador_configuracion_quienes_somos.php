<?php
require_once("../modelo/class_configuracion.php");
$us=new configuracion;

$datos = array($_POST["quienes_somos"]);
if($us->actulizar_quienes_somos($datos)){
	echo '<script>window.location="../vista/admin.php?url=configuracion_quienes_somos&tipo=1&av=3"</script>';
}else{
	echo '<script>window.location="../vista/admin.php?url=configuracion_quienes_somos&tipo=1&av=8"</script>';
}
?>
