<?php
/***************************************************************
 * Nombre:Lista de departamentos.php
 * Descripcion:Listado del Personal de ATC
 * Fecha de creacion:abril 2014
 * Modificado:Daniela Montes
 ***************************************************************/
  // Require Once de la clase Personal (Incluye la clase Personal)
require_once("../../modelo/class_tipo_unidad.php");
   $lobjTunidad = new class_tipo_unidad();
   $listado_Tunidad = $lobjTunidad->fListar();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>ATC SISTEM</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link href="../css/maestro.css" type="text/css" rel="stylesheet" />  <!--link del css de ATC SISTEM -->

</head>

<body style="background:url(../imagenes/fondo2.png);">
	<fieldset style="width:400px;background:#FFFFFF;" id="formu">
	<legend class="label2" style="font-family:arial;border-radius:6px 6px 0px 0px;">Listado de Tipo de Unidad</legend>
	<a href="../reporte/pdfRep_Tipounidad.php"><input type="button" class="botonimp" style="margin:10px 0px 10px 240px;" value="Imprimir     " title="Click aqui para Imprimir"></a>
        <table border="0" align="center">
			<tr>

													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Código</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Nombre</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Capacidad</th>


												</tr>
												<?php
													for ($i=0;$i<count($listado_Tunidad);$i++){
														printf("<tr align=center>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($id_personal=$listado_Tunidad[$i][0]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Tunidad[$i][1]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Tunidad[$i][2]);
															printf("</th>");
															printf("</tr>");
													}

													?>

		</tr></table></div>  <!--Cierre de la Tabla y el Cuerpo del Contenido-->
</fieldset>
</body>
</html>
