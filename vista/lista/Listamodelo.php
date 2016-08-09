<?php
/***************************************************************
 * Nombre:Listamodelo.php
 * Descripcion:Listado de Modelos
 * Fecha de creacion:Enero 2013
 * Modificado: Maria Macelo, Zoraly Gomez
 ***************************************************************/
 // Require Once de la clase Modelo (Incluye la clase Modelo)
require_once("../modelo/clsModelo.php");
   $lobjModelo = new clsModelo(); 
   $listado_modelo = $lobjModelo->fListar();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>atc</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/cohvestestilo.css" />
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" /> <!--link del css de COHVEST -->

</head>

<body>
		<br><div id="crlista"><h2>Lista de Modelos de Equipos</h2></div><br><br><br> <!--Cuerpo del Contenido -->
        <table border="1"> <!--Tabla -->
		   <tr><td bgcolor="#FFFFFF"><p><b> &nbsp Código</b></p>
		   </td>
		   <td bgcolor="#FFFFFF"><p><b> &nbsp  Nombre</b></p>
		   <td bgcolor="#FFFFFF"><p><b> &nbsp  Marca</b></p> <!--Listado del Codigo,Nombre Modelo y Marca de los Equipos -->
		   </td></tr>
		   <tr><td>
			   <p>
		 <?php 
						for($i=0;$i<count($listado_modelo);$i++){
						$idmodelo=$listado_modelo[$i][0];
						echo "<p>".$idmodelo."</p><hr>"; 
							}	
						?>
		</p>
		   </td>
		   <td> <?php 
						for($i=0;$i<count($listado_modelo);$i++){
						$nombre_modelo=$listado_modelo[$i][1];
						echo "<p>".$nombre_modelo."</p><hr>"; 
							}	
						?></td>
		<td>
			   <p>
		 <?php 
						for($i=0;$i<count($listado_modelo);$i++){
						$idmarca=$listado_modelo[$i][2];
						echo "<p>".$idmarca."</p><hr>"; 
							}	
						?>
		</p>
		   </td>
		</tr>
	</table></div> <!--Cierre de la Tabla y el Cuerpo del Contenido--> 
</body>
</html>
