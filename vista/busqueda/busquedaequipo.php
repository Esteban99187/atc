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


  $msj = isset($_GET['msj']) ? $_GET['msj'] : null ;
	defined("SYSPATH") or die("No direct script access.");
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	if(!$login)
	{
		exit('<script> alert("Acceso Denegado!"); window.location.href="session.php" </script>');
	}
  if($msj)
  	{
  		echo "<script> alert('".$msj."') </script>";
  	}

?>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link href="css/maestro.css" type="text/css" rel="stylesheet" />

<fieldset>
	
	<legend class="label2">Reportes</legend>

	<a href="rep_pdf/pdfRep_Ordencargal.php?lsa=-" style="text-decoration: none;color:#000000;"><img src="imagenes/pdf.png" width="80" style="margin:20px 0px 0px 90px;" title="Descargar" height="80" /></a>
	<a href="rep_pdf/pdfRep_Ordencarga2.php?lsa=-" style="text-decoration: none;color:#000000;"><img src="imagenes/pdf.png" width="80" style="margin:20px 0px 0px 140px;" title="Descargar" height="80" /></a>
	<a href="rep_pdf/pdfRep_ .php?lsa=-" style="text-decoration: none;color:#000000;"><img src="imagenes/pdf.png" width="80" style="margin:20px 0px 0px 140px;" title="Descargar" height="80" /></a>
	<a href="rep_pdf/pdfRep_ .php?lsa=1" style="text-decoration: none;color:#000000;"><img src="imagenes/pdf.png" width="80" style="margin:20px 0px 0px 140px;" title="Descargar" height="80" /></a>
	<br><a href="rep_pdf/pdfRep_Ordencargal.php?lsa=-" style="text-decoration: none;color:#000000;margin:0px 0px 0px 45px;">Reportes por Orden de Cargas</a>
	<a href="rep_pdf/pdfRep_Ordencarga2.php?lsa=-" style="text-decoration: none;color:#000000;margin:0px 0px 0px 50px;">Reportes por Fecha</a>
	<a href="rep_pdf/pdfRep_.php?lsa=-" style="text-decoration: none;color:#000000;margin:0px 0px 0px 90px;">Reportes por Fechas</a>
	<a href="rep_pdf/pdfRep_.php?lsa=1" style="text-decoration: none;color:#000000;margin:0px 0px 0px 80px;">Reportes por Estatus</a>
	
<legend class="label" style="margin:30px 0px 15px 340px;">Buscar asignacion de equipo</legend>
<form name="form1" action="">

<input type="text" name="busquedaequipo" style="width:180px;height:25px;margin:0px 0px 0px 310px;" value="">


<input type="button" name="btnAbrecam" value="buscar" class="boton3" onClick="enviar();	">

</form>	
</fieldset>

    <script type="text/javascript" languaje="javasript">
        f=document.form1;

        function enviar(){
         var buscar=f.busquedaequipo.value;

            if(f.busquedaequipo.value!=""){
               miPopup = window.open("rep_pdf/pdfRep_asignacion.php?lsa="+buscar,"Banco","width=1333px,height=630px,scrollbars=yes,toolbar=No");   
            }
            else{ alert("Vacio");
				}
        }
    </script>
    </html>
