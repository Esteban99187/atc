<?php
/***************************************************************
 * Nombre:Listadepartamentos.php
 * Descripcion:Listado de los Departamentos
 * Fecha de creacion:Enero 2013
 * Modificado: Daniela Montes
 ***************************************************************/
 // Require Once de la clase Departamento (Incluye la clase Departamento)
require_once("../modelo/clsDepartamento.php");
   $lobjDepartamento = new clsDepartamento(); 
   $listado_departamento = $lobjDepartamento->fListar();
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
		<br><div id="crlista"><h2>Lista de Departamentos</h2></div><br><br><br> <!--Cuerpo del Contenido -->
        <table border="1"> <!--Tabla -->
		   <tr><td bgcolor="#FFFFFF"><p><b>Código &nbsp &nbsp </b></p>
		   </td>
		   <td bgcolor="#FFFFFF"><p><b> &nbsp  Nombre</b></p>
		   <td bgcolor="#FFFFFF"><p><b> &nbsp  Télefono</b></p>
		   <td bgcolor="#FFFFFF"><p><b> &nbsp  Empresa</b></p> <!--Listado de los Codigos,Nombres,Telefono y Empresa de los Departamentos -->
		   </td></tr>
		   <tr><td>
			   <p>
		 <?php 
						for($i=0;$i<count($listado_departamento);$i++){
						$id_dep=$listado_departamento[$i][0];
						echo "<p>".$id_dep."</p><hr>"; 
							}	
						?>
		</p>
		   </td>
		   <td> <?php 
						for($i=0;$i<count($listado_departamento);$i++){
						$nombre_dep=$listado_departamento[$i][1];
						echo "<p>".$nombre_dep."</p><hr>"; 
							}	
						?></td>
		<td>
			   <p>
		 <?php 
						for($i=0;$i<count($listado_departamento);$i++){
						$telefono_dep=$listado_departamento[$i][2];
						echo "<p>".$telefono_dep."</p><hr>"; 
							}	
						?>
		</p>
		   </td>
		   <td> <?php 
						for($i=0;$i<count($listado_departamento);$i++){
						$id_empresa=$listado_departamento[$i][3];
						echo "<p>".$id_empresa."</p><hr>"; 
							}	
						?></td>
		</tr></table></div> <!--Cierre de la Tabla y el Cuerpo del Contenido--> 
</body>
</html>
