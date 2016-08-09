<?php
/***************************************************************
 * Nombre:Listam.php
 * Descripcion:Listado de Marcas
 * Fecha de creacion:Enero 2013
 * Modificado: Zoraly Gomez
 ***************************************************************/
  // Require Once de la clase Marca (Incluye la clase Marca)
require_once("../modelo/clsMarca.php");
   $lobjMarca = new clsMarca(); 
     
   $listado_marca = $lobjMarca->fListar();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>atc</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/cohvestestilo.css" />  <!--link del css de COHVEST -->
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />

</head>

<body>
		<br><div id="crlista"><h2>Lista de Marcas de Equipo</h2></div><br><br><br> <!--Cuerpo del Contenido -->
        <table border="1"> <!--Tabla -->
		   <tr><td bgcolor="#FFFFFF"><p><b>Código &nbsp &nbsp </b></p>
		   </td>
		   <td bgcolor="#FFFFFF"><p><b> &nbsp &nbsp &nbsp &nbsp &nbsp Nombre</b></p> <!--Listado del Codigo y Nombre de las Marcas -->
		   </td></tr>
		   <tr><td>
			   <p>
		 <?php 
						for($i=0;$i<count($listado_marca);$i++){
						$idmarca=$listado_marca[$i][0];
						echo "<p>".$idmarca."</p><hr>"; 
							}	
						?>
		</p>
		   </td>
		   <td> <?php 
						for($i=0;$i<count($listado_marca);$i++){
						$nombre_marca=$listado_marca[$i][1];
						echo "<p>".$nombre_marca."</p><hr>"; 
							}	
						?></td></tr></table></div> <!--Cierre de la Tabla y el Cuerpo del Contenido--> 
</body>
</html>
