<?php
    include 'conexion.php';
	fconectar();
	$consulta = "select * from ciudad where idparroquia = '$_POST[elegido]'";
	mysql_query("SET NAMES utf8");
	$resultado = mysql_query($consulta);
	if($fila = mysql_fetch_array($resultado)){
		do{
			echo "<option value=".$fila['idciudad'].">".$fila['desc_ciud']."</option>";
		}while($fila = mysql_fetch_array($resultado));
	}
	mysql_free_result($resultado);
	desconectar();
?>
