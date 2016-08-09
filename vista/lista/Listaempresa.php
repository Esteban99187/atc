<?php
/***************************************************************
 * Nombre:Listaempresa.php
 * Descripcion:Listado de Empresa
 * Fecha de creacion:Enero 2013
 * Modificado: Daniela Montes
 ***************************************************************/
 // Require Once de la clase Empresa (Incluye la clase Empresa)
require_once("../modelo/clsEmpresa.php");
   $lobjEmpresa = new clsEmpresa(); 
     
   $listado_empresa = $lobjEmpresa->fListar();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>atc</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/cohvestestilo.css" /> <!--link del css de COHVEST -->
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" /> 

</head>

<body>
		<br><div id="crlista"><h2>Lista de Empresas</h2></div><br><br><br> <!--Cuerpo del Contenido -->
        <table border="1"> <!--Tabla -->
		   <tr><td bgcolor="#FFFFFF"><p><b>Rif &nbsp &nbsp </b></p>
		   </td>
		   <td bgcolor="#FFFFFF"><p><b> &nbsp  Nombre</b></p>
		   <td bgcolor="#FFFFFF"><p><b> &nbsp  Teléfono</b></p>
		   <td bgcolor="#FFFFFF"><p><b> &nbsp  Dirección</b></p> <!--Listado del Rif,Nombre,Telefono y Dirección de las Empresas -->
		   </td></tr>
		   <tr><td>
			   <p>
		 <?php 
						for($i=0;$i<count($listado_empresa);$i++){
						$id_empresa=$listado_empresa[$i][0];
						echo "<p>".$id_empresa."</p><hr>"; 
							}	
						?>
		</p>
		   </td>
		   <td> <?php 
						for($i=0;$i<count($listado_empresa);$i++){
						$nombre_empre=$listado_empresa[$i][1];
						echo "<p>".$nombre_empre."</p><hr>"; 
							}	
						?></td>
		<td>
			   <p>
		 <?php 
						for($i=0;$i<count($listado_empresa);$i++){
						$telefono_empre=$listado_empresa[$i][2];
						echo "<p>".$telefono_empre."</p><hr>"; 
							}	
						?>
		</p>
		   </td>
		   <td> <?php 
						for($i=0;$i<count($listado_empresa);$i++){
						$direccion_empre=$listado_empresa[$i][3];
						echo "<p>".$direccion_empre."</p><hr>"; 
							}	
						?></td>
		</tr></table></div> <!--Cierre de la Tabla y el Cuerpo del Contenido-->  
</body>
</html>
