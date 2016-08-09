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
	defined("SYSPATH") or die("No direct script access.");
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	if(!$login)
	{
		exit('<script> alert("Acceso Denegado!"); window.location.href="session.php" </script>');
	}
  require_once("../modelo/class_reportes.php");
  $rp=new Reportes;

?>
<div class="row spa">
<div class="col-md-2">

<ul class="nav nav-pills nav-stacked">
  <h4 class="text-center"><b><i class="glyphicon glyphicon-th-list"></i> Menu de reportes</b></h4>

  <?php

    echo '<li><a href="?url=reportes&report=bitacora&tab=1">bitacora</a></li>';
    echo '<li><a href="?url=reportes&report=bitacoraseguridad&tab=2">bitacora de seguridad</a></li>';

  ?>
</ul>

</div>
<div class="col-md-10">
      <div class="panel panel-default">
        <div class="panel-heading"><div class="panel-title">Bitacora</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
				</div>
        <div class="panel-body" >
          <div class="mygrid-wrapper-div">
            
            <?php
              if(isset($_GET["report"])){
                  include("reporte/".$_GET["report"].".php");
              }
            ?>
          </div>
        </div>
   

