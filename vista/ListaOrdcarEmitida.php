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
  require_once("../modelo/class_ordcar.php");
  $us = new class_ordcar;
  if(isset($_GET["edit"])){
  if($us->RevisionUsoPerfil($_GET["edit"])){
  $cadena = $us->RecibirDatos($_GET["edit"]);
  }else{
   echo '<script>window.location="admin.php?url=perfiles&tipo=1&av=13"</script>';
  }  
}
	if(isset($_GET["del"]))
	{
		if($us->RevisionUsoPerfil($_GET["del"]))
		{
			if($b->addActividad(3,'perfil',$_SESSION["idUsuario"],'sistema',$_SESSION["ip"]))
			{
				if(isset($_GET["acc"]) and $_GET["acc"] == 'r')
				{
					$estatus = 1;
					$mn = 9;
				}
				else if(isset($_GET["acc"]) and $_GET["acc"] != 'r')
				{
					$estatus = 0;
					$mn = 7;
				}
				if($b->EliminacionLogica('tperfiles',$estatus,$_GET["del"],'idPerfil'))
				{
					echo '<script>window.location="admin.php?url=perfiles&tipo=1&av='.$mn.'"</script>';
				}
				else
				{
					echo '<script>window.location="admin.php?url=perfiles&tipo=1&av=8"</script>';
				}
			}
		}
		else
		{
			echo '<script>window.location="admin.php?url=perfiles&tipo=1&av=12"</script>';
		}
	}
	if(isset($_GET["rea"]))
	{
		if($us->RevisionUsoPerfil($_GET["rea"]))
		{
			if($b->addActividad(12,'perfil',$_SESSION["idUsuario"],'sistema',$_SESSION["ip"]))
			{
				if(isset($_GET["acc"]) and $_GET["acc"] == 'r')
				{
					$estatus = 1;
					$mn = 9;
				}
				else if(isset($_GET["acc"]) and $_GET["acc"] != 'r')
				{
					$estatus = 0;
					$mn = 7;
				}
				if($b->EliminacionLogica('tperfiles',$estatus,$_GET["rea"],'idPerfil'))
				{
					echo '<script>window.location="admin.php?url=perfiles&tipo=1&av='.$mn.'"</script>';
				}
				else
				{
					echo '<script>window.location="admin.php?url=perfiles&tipo=1&av=8"</script>';
				}
			}
		}
		else
		{
			echo '<script>window.location="admin.php?url=perfiles&tipo=1&av=12"</script>';
		}
	}
?>
<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><div class="panel-title">Recepcion de Guia</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>Nro</th>
								<th>Cedula Conductor</th>
								<th>Conductor</th>
								<th>Fecha</th>
								<th>Hora</th>
								<th>Nro Guia</th>
								<th>Guardar</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$us->ListaOrdcarEmitida();
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>




<script language="javascript">
	var miPopup
	function abre_orden_de_carga(idsolicitud){
		miPopup = window.open("transaccion_orden_de_carga.php?idsolicitud="+idsolicitud,"empresa","width=1250px,height=570px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}
	
	</script>
