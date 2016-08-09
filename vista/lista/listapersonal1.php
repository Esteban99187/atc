<?php
/***************************************************************
 * Nombre:Lista de departamentos.php
 * Descripcion:Listado del Personal de ATC
 * Fecha de creacion:abril 2014
 * Modificado:Daniela Montes
 ***************************************************************/
  // Require Once de la clase Personal (Incluye la clase Personal)
require_once("../../modelo/class_personal.php");
   $lobjPersonal = new class_personal();
   $listado_Personal = $lobjPersonal->fListar2();

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
	<fieldset style="width:1333px;background:#FFFFFF;" id="formu">
	<legend class="label2" style="font-family:arial;border-radius:6px 6px 0px 0px;">Listado del Personal</legend>
	<a href="../reporte/pdfRep_Personal.php"><input type="button" class="botonimp" style="margin:10px 0px 10px 1075px;" value="Imprimir     " title="Click aqui para Imprimir"></a>
        <table border="0" align="center">
			<tr>

													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Cédula</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Nombre</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Apellido</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Sexo</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Estado Civil</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Telf Móvil</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Telf Casa</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Fecha Nacimiento</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Forma Pago</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Periodo Pago</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Sueldo</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Nivel Académico</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Dirección</th>




												</tr>
												<?php
													for ($i=0;$i<count($listado_Personal);$i++){
														printf("<tr align=center>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($id_personal=$listado_Personal[$i][0]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Personal[$i][1]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Personal[$i][2]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Personal[$i][3]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Personal[$i][4]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Personal[$i][5]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Personal[$i][6]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Personal[$i][7]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Personal[$i][8]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Personal[$i][9]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Personal[$i][10]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Personal[$i][13]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Personal[$i][14]);
															printf("</th>");
															printf("</tr>");
													}

													?>

		</tr></table></div>  <!--Cierre de la Tabla y el Cuerpo del Contenido-->
</fieldset>
</body>
</html>
