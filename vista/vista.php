<?php 
	/********************************************************************************************
	*                                                                                           *
	*  Nombre: ATCSISTEM                                                                        *
	*  Descripción: (Almacenes y Transporte Cerealeros C.A Sistema).                            *
	*  Fecha de Creacion: Año 2014 Acarigua, Venezuela.                                         *
	*                                                                                           *
	*  Programador (a): Carballo Jesús <jesusalejandrocarballo@gmail.com>                       *
	*                   Gomez Zoraly   <z-oral-y8@hotmail.com>                                  *
	*                   Montes Daniela <dani.daniela.montes@gmail.com>                          *
	*                   Mogollón José  <josetomas_033@hotmail.com>                              *
	*                   Marcelo Maria  <mary_mvr_272@hotmail.com>                               *
	*                   Sanchez Jesús  <jesussh7@gmail.com>                                     *
	*                                                                                           *
	*  Este programa es software libre, puede redistribuirlo y / o modificar                    *
	*  Bajo los términos de la GNU Licencia Pública General(GPL) publicada por                  *
	*  La Fundación de Software Libre (FSF), en su versión 2 o cualquier versión posterior.     *
	*                                                                                           *
	*  Este programa se distribuye con la esperanza de que sea útil,                            *
	*  Pero SIN NINGUNA GARANTÍA, incluso sin la garantía implícita de                          *
	*  COMERCIALIZACIÓN o IDONEIDAD PARA UN PROPÓSITO PARTICULAR.                               *
	*                                                                                           *
	********************************************************************************************/
	define("SYSPATH", realpath("system") . "/"); 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/menu.css">
		<link rel="stylesheet" href="css/main.css">
		<!-- INICIO LLAMADO DEL HEAD  DEL ARCHIVO ADMIN.PHP -->
		<meta http-equiv="content-type" content="text/html" charset="UTF-8"> 
		<title>ATC Sistema</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="js/bootstrapValidator.css" rel="stylesheet">
		<link href="css/mainSis.css" rel="stylesheet">
		<link type="text/css" href="../libreria/jquery/css/redmond/jquery-ui-1.8.19.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="../libreria/jquery/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="../libreria/jquery/js/jquery-ui-1.8.19.custom.min.js"></script>
		<script src="js/ajax.js"></script>
		<script type='text/javascript' src="js/google.jquery.min.js"></script>
		<script type='text/javascript' src="js/vendor/bootstrap.js"></script>
		<script src="js/highcharts.js"></script>
		<script src="js/modules/exporting.js"></script>
		<script src="js/graficos.js"></script>
		<script type='text/javascript' src="js/vendor/jquery.min.js"></script>
		
		<script src="js/validaciones.js"></script>
	</head>
	<body>
		
			
			<?php
				if(isset($_GET["url"]))
				{
					include("".$_GET["url"].".php");
				}
			?>
			
		
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
		<script src="js/vendor/bootstrap.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/main.js"></script>
		<script src="js/validacionScript.js"></script>
		<script src="js/bootstrapValidator.js"></script>
	</body>
</html>
<script type="text/javascript">
	document.oncontextmenu = function()
	{
		return false;
	}
</script>
