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
	require_once("../modelo/ClassSubmenu.php");
	$submenu = new ClassSubmenu;
	if(isset($_GET["idsubmenu"]))
	{
		if($submenu->revision_submenu($_GET["idsubmenu"]))
		{
			$cadena= $submenu->datos_submenu($_GET["idsubmenu"]);
		}
		else
		{
			echo '<script>window.location="admin.php?url=maestro_submenu&tipo=1&av=13"</script>';
		}
	}
	if(isset($_GET["del"]))
	{
		if($submenu->revision_submenu($_GET["del"]))
		{
			if($b->addActividad(3,'submenu',$_SESSION["idUsuario"],'s',$_SESSION["ip"]))
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
				if($submenu->desactivar_submenu('Submenu','EstatusSub',$estatus,$_GET["del"],'IdSubmenu'))
				{
					echo '<script>window.location="admin.php?url=maestro_submenu&tipo=1&av='.$mn.'"</script>';
				}
				else
				{
					echo '<script>window.location="admin.php?url=maestro_submenu&tipo=1&av=8"</script>';
				}
			}
		}
		else
		{
			echo '<script>window.location="admin.php?url=maestro_submenu&tipo=1&av=12"</script>';
		}
	}	
	if(isset($_GET["rea"]))
	{
		if($submenu->revision_submenu($_GET["rea"]))
		{
			if($b->addActividad(12,'submenu',$_SESSION["idUsuario"],'s',$_SESSION["ip"]))
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
				if($submenu->activar_submenu('Submenu','EstatusSub',$estatus,$_GET["rea"],'IdSubmenu'))
				{
					echo '<script>window.location="admin.php?url=maestro_submenu&tipo=1&av='.$mn.'"</script>';
				}
				else
				{
					echo '<script>window.location="admin.php?url=maestro_submenu&tipo=1&av=8"</script>';
				}
			}
		}
		else
		{
			echo '<script>window.location="admin.php?url=maestro_submenu&tipo=1&av=12"</script>';
		}
	}
?>
<div class="row spa">
	<div class="col-md-4">
		<!-- PANEL FORMULARIOS -->
		<div class="panel panel-default">
			<div class="panel-heading"><div class="panel-title">Registro de SubMenu</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
				</div>
			<div class="panel-body">
				<form name="fsubmenu" id="fsubmenu" method="post" action="../controlador/controlador_maestro_submenu.php">
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label>Nombre del Submenu :</label>
								<input type="text" name="nombre_submenu"  class="form-control" value="<?php if(isset($cadena)){ echo $cadena[0]; } ?>"/>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label>Url:</label>
								<input type="text" name="url_submenu"  class="form-control" value="<?php if(isset($cadena)){ echo $cadena[1]; } ?>"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label>Descripcion :</label>
								<textarea name="descripcion_submenu" class="form-control"><?php if(isset($cadena)){ echo $cadena[2]; } ?></textarea> 
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
						<input type="hidden" name="myId" value="<?php echo $_SESSION["idUsuario"] ?>">
						<input type="hidden" name="idsubmenu" value="<?php if(isset($_GET['idsubmenu'])){ echo $_GET['idsubmenu'];}?>">
						<input type="submit" class="btn btn-primary" name="opt" value="<?php if(isset($_GET['idsubmenu'])){ echo "Modificar";}else{ echo "Registrar"; } ?>"></input>

						<button type="reset" class="btn btn-primary" onclick="cancelar('maestro_submenu')">Cancelar</button>
					</div>
					</div>
				</form>
			</div>
		</div>
		<!-- FIN DE PANEL FORMULARIOS -->
	</div>
	<div class="col-md-8">
		<!-- BITACORA DE OPERACIONES -->
		<div class="panel panel-default">
			<div class="panel-heading"><div class="panel-title">Ultima actividad realizada</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
				</div>
			<div class="panel-body"><i class="glyphicon glyphicon-pencil">- </i> <?php $b->ShowBitacora(); ?></div>
		</div>
		<!-- FIN DE OPERACIONES -->
		<div class="panel panel-default">
			<div class="panel-heading"><div class="panel-title">Responsabilidades registradas</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
				</div>
			<div class="panel-body">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>SubMenu</th>
							<th>Url</th>
							<th>Editar</th>
							<th>Desactivar/Activar</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$submenu->listar_submenu();
						?>
					</tbody>
				</table>
			</div>
		</div>
    </div>
</div>
