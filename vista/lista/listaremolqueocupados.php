<?php
/***************************************************************
 * Nombre:Lista de departamentos.php
 * Descripcion:Listado del Personal de ATC
 * Fecha de creacion:abril 2014
 * Modificado:Jesus Carballo
 ***************************************************************/
  // Require Once de la clase Personal (Incluye la clase Personal)
require_once("../../modelo/class_remolque.php");
   $lobjOcupados = new class_remolque();
   $listado_Ocupados = $lobjOcupados->flistarocupados();

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
	<legend class="label2" style="font-family:arial;border-radius:6px 6px 0px 0px;">Listado de Remolques de Transporte Ocupados</legend>
	<label class="label" style='margin:0px 0px 0px 20px;color:#373CF0;font-size: 16px;font-family:arial;'>OCUPADOS</label><a href="../rep_pdf/pdfRep_Remolqueocupados.php?lsa=-"><input type="button" class="botonimp" style="margin:10px 0px 10px 605px;" value="Imprimir        " title="Click aqui para Imprimir"></a>
        <table border="0" align="center">
			<tr>

													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Codigo</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Serial Motor</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Serial Carroceria</th>

													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Placa</th>

													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Modelo</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Tipo de Unidad</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Observación</th>
													<th bgcolor="#FFFFFF" align="center" style="background:url(../imagenes/colores3.jpg);color:#FFFFFF;border-radius:6px 6px 0px 0px;padding:3px;font-family:arial;" colspan="2">Conductor Asignado</th>




												</tr>
												<?php
													for ($i=0;$i<count($listado_Ocupados);$i++){
														printf("<tr align=center>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($id_personal=$listado_Ocupados[$i][0]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Ocupados[$i][1]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Ocupados[$i][2]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Ocupados[$i][3]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Ocupados[$i][6]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Ocupados[$i][5]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Ocupados[$i][7]);
															printf("</th>");
															printf("<th colspan='2' style=font-family:arial;padding:3px;background:#FFCECE;>");
															printf ($nombre1_per=$listado_Ocupados[$i][8]).'  '. printf ("&nbsp") .' '.
															printf ($nombre1_per=$listado_Ocupados[$i][9]).'  '. printf ("&nbsp") .' '.
															printf ($nombre1_per=$listado_Ocupados[$i][10]);
															printf("</th>");
															printf("</tr>");
													}

													?>

		</tr></table></div>  <!--Cierre de la Tabla y el Cuerpo del Contenido-->
</fieldset>
</body>
</html>
