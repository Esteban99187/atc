<?php		
	echo '<option value="">seleccione</option>'; 
?>

<?php
    include 'conexion.php';
	fconectar();
	$consulta = "select * from estado where idpais = '$_POST[elegido]'";
	mysql_query("SET NAMES utf8");
	$resultado = mysql_query($consulta);
	if($fila=mysql_fetch_array($resultado)){
		do{
			echo "<option value=".$fila['idestado'].">".$fila['desc_esta']."</option>";
		}while($fila = mysql_fetch_array($resultado));
	}
	mysql_free_result($resultado);
	desconectar();
?>
