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

  session_start();
  $msj = isset($_GET['msj']) ? $_GET['msj'] : null ;
  $login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
  if(!$login)
    {
  	 exit('<script> alert("Acceso Denegado!"); window.location.href="../../adsertrans.php" </script>');
  	}
  if($msj)
  	{
  		echo "<script> alert('".$msj."') </script>";
  	}

?>

	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.23.1" />
	<link href="vista/css/maestro.css" type="text/css" rel="stylesheet" />

<fieldset>
	
	<legend class="label2">Reportes</legend>

	<a href="rep_pdf/pdfRep_cargopersona.php?lsa=-" style="text-decoration: none;color:#000000;"><img src="images/pdf.png" width="80" style="margin:20px 0px 0px 85px;" title="Descargar" height="80" /></a>
	<a href="rep_pdf/pdfRep_estatuspersona.php?lsa=-" style="text-decoration: none;color:#000000;"><img src="images/pdf.png" width="80" style="margin:20px 0px 0px 140px;" title="Descargar" height="80" /></a>
	<a href="rep_pdf/pdfRep_cargopersona.php?lsa=-" style="text-decoration: none;color:#000000;"><img src="images/pdf.png" width="80" style="margin:20px 0px 0px 140px;" title="Descargar" height="80" /></a>
	<a href="rep_pdf/pdfRep_estatuspersona.php?lsa=1" style="text-decoration: none;color:#000000;"><img src="images/pdf.png" width="80" style="margin:20px 0px 0px 140px;" title="Descargar" height="80" /></a>
	<br><a href="rep_pdf/pdfRep_cargopersona.php?lsa=-" style="text-decoration: none;color:#000000;margin:0px 0px 0px 60px;">Reportes por Cargos</a>
	<a href="rep_pdf/pdfRep_cargopersona.php?lsa=-" style="text-decoration: none;color:#000000;margin:0px 0px 0px 60px;">Reportes por Departamentos</a>
	<a href="rep_pdf/pdfRep_cargopersona.php?lsa=-" style="text-decoration: none;color:#000000;margin:0px 0px 0px 70px;">Reportes por Fechas</a>
	<a href="rep_pdf/pdfRep_estatuspersona.php?lsa=1" style="text-decoration: none;color:#000000;margin:0px 0px 0px 70px;">Reportes por Estatus</a>

<legend class="label" style="margin:30px 0px 15px 340px;">Buscar Reportes por Cargos</legend>
<form name="form1" action="">



 

    <?   
										include_once("modelo/class_rol.php");
										$rol = new rol;
										$rol->listar();
		   								echo '<select class="combo" style="width:180px;height:30px;margin:0px 0px 0px 310px;" name="busquedapercar" id="cam_cod_rol">'; 
										echo '<option value="-">Seleccione</option>';
           								while($row_rol = $rol->row()){
											echo '<option value='.$row_rol['cod_rol'];	
											if($row_rol['cod_rol']== $row_persona['cod_rol']) echo " selected ";									
											echo '>'.$row_rol['1'].'</option>';
		 								}
        								echo '</select>';
        				
        						?>
        						<input type="button" class="boton3" value="Buscar       " onClick="enviar();	">

</form>	
</fieldset>

    <script type="text/javascript" languaje="javasript">
        f=document.form1;

        function enviar(){
         var buscar=f.busquedapercar.value;
            if(f.busquedapercar.value!="-"){
                window.location=("rep_pdf/pdfRep_cargopersona.php?lsa="+buscar);   
            }
            else{ alert("Vacio");
				}
        }
    </script>
    </html>
