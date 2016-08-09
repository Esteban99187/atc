<?php		
	echo '<option value="" value="<?php print($lsidpais);?>" >seleccione</option>'; 
?>
	

<?php
    include 'conexion.php';
	fconectar();
	$consulta = "select * from parroquia where idmunicipio = '$_POST[elegido]'";
	mysql_query("SET NAMES utf8");
	$resultado = mysql_query($consulta);
	if($fila = mysql_fetch_array($resultado)){
		do{
			echo "<option value=".$fila['idparroquia'].">".$fila['desc_parr']."</option>";
		}while($fila = mysql_fetch_array($resultado));
	}
	mysql_free_result($resultado);
	desconectar();
?>
