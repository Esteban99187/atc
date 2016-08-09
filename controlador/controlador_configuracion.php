<?php
require_once("../modelo/class_configuracion.php");
$us=new configuracion;

$datos = array($_POST["fallidos"],$_POST["cclave"],$_POST["preguntas"],$_POST["tconexion"],$_POST["sistema"],$_POST["version"],$_POST["lenguaje"],$_POST["mensajes"]);
if($us->actulizarConfiguracion($datos)){
	echo '<script>window.location="../vista/admin.php?url=sistemaConfiguracion&tipo=1&av=3"</script>';
}else{
	echo '<script>window.location="../vista/admin.php?url=sistemaConfiguracion&tipo=1&av=8"</script>';
}
?>
