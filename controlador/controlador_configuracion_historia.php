<?php
require_once("../modelo/class_configuracion.php");
$us=new configuracion;

$datos = array($_POST["historia"]);
if($us->actulizar_historia($datos)){
	echo '<script>window.location="../vista/admin.php?url=configuracion_historia&tipo=1&av=3"</script>';
}else{
	echo '<script>window.location="../vista/admin.php?url=configuracion_historia&tipo=1&av=8"</script>';
}
?>
