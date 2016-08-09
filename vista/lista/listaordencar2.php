<?php
/***************************************************************
 * Nombre:Lista de departamentos.php
 * Descripcion:Listado del Personal de ATC
 * Fecha de creacion:abril 2014
 * Modificado:Daniela Montes
 ***************************************************************/
  // Require Once de la clase Personal (Incluye la clase Personal)
require_once("modelo/class_ordcar.php");
   $lobjOrdenc = new class_ordcar();
   $listado_Ordenc = $lobjOrdenc->flistar2();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>ATC SISTEM</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link href="../css/maestro.css" type="text/css" rel="stylesheet" />  <!--link del css de ATC SISTEM -->

</head>

<body style="background:url(imagenes/fondo2.png);">
	<fieldset style="width:400px;background:#FFFFFF;" id="formu">	<legend class="label2" style="font-family:arial;border-radius:6px 6px 0px 0px;">Listado de Orden de Cargas Emitida</legend>
	<a href="rep_pdf/pdfRep_Ordncarga2.php"><input type="button" class="botonimp" style="margin:3px 0px 5px 800px;" value="Imprimir       " title="Click aqui para Imprimir"></a>
	<label class="label" style='margin:0px 0px 0px 20px;color:#373CF0;font-size: 16px;font-family:arial;'>Emitidas</label>    <table border="1" align="center" style="margin:0px 0px 0px 20px;">
		<a href="?operacion=transaccion_recgui.php"><input type="button" onclick="flistar();" style="margin:3px 0px 5px 698px;height:36px;background:url(imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px;font-family:arial;" value="Asignar Unidad" ></a>

			<tr>

													<th bgcolor="#FFFFFF" align="center" style="background:url(imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Codigo</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Hora</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Fecha</th>

													<th bgcolor="#FFFFFF" align="center" style="background:url(imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Estatus</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Cedula Responsable</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Nombre</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Apellido</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Solicitud</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Relación de Unidades</th>





												</tr>
												<?php
													for ($i=0;$i<count($listado_Ordenc);$i++){
														printf("<tr align=center>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($id_personal=$listado_Ordenc[$i][0]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Ordenc[$i][1]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Ordenc[$i][2]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Ordenc[$i][6]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Ordenc[$i][3]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Ordenc[$i][4]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Ordenc[$i][5]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Ordenc[$i][7]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Ordenc[$i][8]);
															printf("</th>");
															printf("</tr>");
													}

													?>

		</tr></table></div>  <!--Cierre de la Tabla y el Cuerpo del Contenido-->
</fieldset>
</body>
</html>
