<?php
/***************************************************************
 * Nombre:Listacargo.php
 * Descripcion:Listado de Cargos
 * Fecha de creacion:Enero 2013
 * Modificado: Anthony Tovar
 ***************************************************************/
 //Require Once de la clase Cargo (Incluye la clase Cargo)
require_once("../modelo/clsCargo.php");
   $lobjCargo = new clsCargo(); 
   $listado_cargo = $lobjCargo->fListar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>atc</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/cohvestestilo.css" /> <!--link del css de COHVEST -->
</head>

<body>
		<br><div id="crlista"><h2>Lista de Cargo</h2></div><br><br><br> <!--Cuerpo del Contenido -->
        <table border="1"> <!--Tabla -->
		   <tr><td bgcolor="#FFFFFF"><p><b>Código &nbsp &nbsp </b></p>
		   </td>
		   <td bgcolor="#FFFFFF"><p><b> &nbsp &nbsp &nbsp &nbsp &nbsp Nombre</b></p>
		   </td></tr> <!--Listado del los Codigos y Nombres del Cargo -->
		   <tr><td>
			   <p>
		 <?php 
						for($i=0;$i<count($listado_cargo);$i++){
						$id_cargo=$listado_cargo[$i][0];
						echo "<p>".$id_cargo."</p><hr>"; 
							}	
						?>
		</p>
		   </td>
		   <td> <?php 
						for($i=0;$i<count($listado_cargo);$i++){
						$nombre_cargo=$listado_cargo[$i][1];
						echo "<p>".$nombre_cargo."</p><hr>"; 
							}	
						?></td></tr></table></div>   <!--Cierre de la Tabla y el Cuerpo del Contenido-->
</body>
</html>
