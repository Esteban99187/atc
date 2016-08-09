<?php
/***************************************************************
 * Nombre:Listaequipo.php
 * Descripcion:Vision de la empresa ATC
 * Fecha de creacion:Enero 2013
 * Modificado: Maria Macelo
 ***************************************************************/
require_once("../modelo/clsEquipo.php");
   $lobjEquipo = new clsEquipo(); 
     
   $listado_equipo = $lobjEquipo->fListar();

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
		<br><div id="crlista"><h2>Lista de Equipos</h2></div><br><br><br> <!--Cuerpo del Contenido -->
        <table border="1"> <!--Tabla -->
		   <tr><td bgcolor="#FFFFFF"><p><b>Serial &nbsp &nbsp </b></p>
		   </td>
		   <td bgcolor="#FFFFFF"><p><b> &nbsp  Tipo de Equipo</b></p>
		   <td bgcolor="#FFFFFF"><p><b> &nbsp  Marca</b></p>
		   <td bgcolor="#FFFFFF"><p><b> &nbsp  Modelo</b></p> <!--Listado del Serial,Tipo,Marca y Modelo de los Equipos -->
		   </td></tr>
		   <tr><td>
			   <p>
		 <?php 
						for($i=0;$i<count($listado_equipo);$i++){
						$idequipo=$listado_equipo[$i][0];
						echo "<p>".$idequipo."</p><hr>"; 
							}	
						?>
		</p>
		   </td>
		   <td> <?php 
						for($i=0;$i<count($listado_equipo);$i++){
						$nombre_tipo=$listado_equipo[$i][1];
						echo "<p>".$nombre_tipo."</p><hr>"; 
							}	
						?></td>
		<td>
			   <p>
		 <?php 
						for($i=0;$i<count($listado_equipo);$i++){
						$nombre_modelo=$listado_equipo[$i][2];
						echo "<p>".$nombre_modelo."</p><hr>"; 
							}	
						?>
		</p>
		   </td>
		   <td> <?php 
						for($i=0;$i<count($listado_equipo);$i++){
						$nombre_marca=$listado_equipo[$i][3];
						echo "<p>".$nombre_marca."</p><hr>"; 
							}	
						?></td>
		</tr></table></div> <!--Cierre de la Tabla y el Cuerpo del Contenido--> 
</body>
</html>
