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


<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><div class="panel-title">Reporte Solicitud de Transporte</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abretipo_producto()"></i></div>
				</div>
				<div class="panel-body">
					<div class="form-group col-lg-3"></div>
					<div class="form-group col-lg-6">
					
						<center><h4>Ingrese Numero de Solicitud</h4></center>
						<form name="form1" action="">
						<div class="form-group col-lg-12"><input type="text" name="nro_solicitud"  class="form-control" value=""></div>
						<div class="form-group col-lg-12">
		                <center><input type="button" value="Buscar" name="buscar_reporte" class="btn btn-primary" onClick="enviar();	"></center></div>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" languaje="javasript">

	f=document.form1;

	function enviar()
	{

		var buscar_reporte=f.nro_solicitud.value;

		if(f.nro_solicitud.value!="")
		{
			miPopup = window.open("../vista/reporte/pdfRep_solicitud1.php?lsa="+buscar_reporte,"Banco","width=1333px,height=630px");   
		}
		else
		{
			alert("Vacio");
		}

	}

</script>
