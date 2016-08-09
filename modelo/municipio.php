<?php		
	echo '<option value="" value="<?php print($lsidpais);?>" >seleccione</option>'; 
?>
							

<?php
    include 'conexion.php';
	fconectar();
	$consulta = "select * from municipio where idestado = '$_POST[elegido]'";
	mysql_query("SET NAMES utf8");
	$resultado = mysql_query($consulta);
	if($fila = mysql_fetch_array($resultado)){
		do{
			echo "<option value=".$fila['idmunicipio'].">".$fila['desc_muni']."</option>";
		}while($fila = mysql_fetch_array($resultado));
	}
	mysql_free_result($resultado);
	desconectar();
?>
