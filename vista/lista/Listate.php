<?php
/***************************************************************
 * Nombre:Listate.php
 * Descripcion:Listado de Tipos de Equipos
 * Fecha de creacion:Enero 2013
 * Modificado: Maria Macelo
 ***************************************************************/
  // Require Once de la clase Tipo de Equipo (Incluye la clase Tipo de Equipo)
require_once("../modelo/clsTipo_equipo.php");
   $lobjTipo_equipo = new clsTipo_equipo(); 
     
   $listado_tipo_equipo = $lobjTipo_equipo->fListar();

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
		<br><div id="crlista"><h2>Lista de Tipos de Equipos</h2></div><br><br><br> <!--Cuerpo del Contenido -->
        <table border="1"> <!--Tabla -->
		   <tr><td bgcolor="#FFFFFF"><p><b>Código &nbsp &nbsp </b></p>
		   </td>
		   <td bgcolor="#FFFFFF"><p><b> &nbsp &nbsp &nbsp &nbsp &nbsp Nombre</b></p>
		   </td></tr> <!--Listado del los Codigos y Nombres de los Tipos de Equipo -->
		   <tr><td>
			   <p>
		 <?php 
						for($i=0;$i<count($listado_tipo_equipo);$i++){
						$idtipo_equipo=$listado_tipo_equipo[$i][0];
						echo "<p>".$idtipo_equipo."</p><hr>"; 
							}	
						?>
		</p>
		   </td>
		   <td> <?php 
						for($i=0;$i<count($listado_tipo_equipo);$i++){
						$nombre_tipo=$listado_tipo_equipo[$i][1];
						echo "<p>".$nombre_tipo."</p><hr>"; 
							}	
						?></td></tr></table></div> <!--Cierre de la Tabla y el Cuerpo del Contenido--> 
</body>
</html>
