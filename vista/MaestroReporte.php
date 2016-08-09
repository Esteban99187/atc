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
	if(empty($login))
	{
		echo '<script>window.location="session.php?alert=32"</script>';
	}
	require_once("../modelo/ClassReporte.php");
	$Reporte = new ClassReporte;
	if(isset($_GET["IdReporte"]))
	{
		if($Reporte->RevisionReporte($_GET["IdReporte"]))
		{
			$cadena= $Reporte->DatosReporte($_GET["IdReporte"]);
		}
		else
		{
			echo '<script>window.location="admin.php?url=MaestroReporte&tipo=1&av=13"</script>';
		}
	}
	if(isset($_GET["del"]))
	{
		if($Reporte->RevisionReporte($_GET["del"]))
		{
			if($b->addActividad(3,'Reporte',$_SESSION["idUsuario"],'s',$_SESSION["ip"]))
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
				if($Reporte->DesactivarReporte('Reporte','EstatusRep',$estatus,$_GET["del"],'IdReporte'))
				{
					echo '<script>window.location="admin.php?url=MaestroReporte&tipo=1&av='.$mn.'"</script>';
				}
				else
				{
					echo '<script>window.location="admin.php?url=MaestroReporte&tipo=1&av=8"</script>';
				}
			}
		}
		else
		{
			echo '<script>window.location="admin.php?url=MaestroReporte&tipo=1&av=12"</script>';
		}
	}	
	if(isset($_GET["rea"]))
	{
		if($Reporte->RevisionReporte($_GET["rea"]))
		{
			if($b->addActividad(12,'Reporte',$_SESSION["idUsuario"],'s',$_SESSION["ip"]))
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
				if($Reporte->ActivarReporte('Reporte','EstatusRep',$estatus,$_GET["rea"],'IdReporte'))
				{
					echo '<script>window.location="admin.php?url=MaestroReporte&tipo=1&av='.$mn.'"</script>';
				}
				else
				{
					echo '<script>window.location="admin.php?url=MaestroReporte&tipo=1&av=8"</script>';
				}
			}
		}
		else
		{
			echo '<script>window.location="admin.php?url=MaestroReporte&tipo=1&av=12"</script>';
		}
	}
?>
<div class="row spa">
	<div class="col-md-4">
		<!-- PANEL FORMULARIOS -->
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Registro de Reporte</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abrepais()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
			<div class="panel-body">
				<form name="foperacion" id="foperacion" method="post" action="../controlador/ControladorMaestroReporte.php">
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label>Nombre de la Reporte :</label>
								<input type="text" name="NombreReporte"  class="form-control" value="<?php if(isset($cadena)){ echo $cadena[0]; } ?>"/>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label>Url:</label>
								<input type="text" name="UrlReporte"  class="form-control" value="<?php if(isset($cadena)){ echo $cadena[1]; } ?>"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label>Descripcion :</label>
								<textarea name="DescripcionReporte" class="form-control"><?php if(isset($cadena)){ echo $cadena[2]; } ?></textarea> 
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
						<input type="hidden" name="myId" value="<?php echo $_SESSION["idUsuario"] ?>">
						<input type="hidden" name="IdReporte" value="<?php if(isset($_GET['IdReporte'])){ echo $_GET['IdReporte'];}?>">
						<input type="submit" class="btn btn-primary" name="opt" value="<?php if(isset($cadena)){ echo "Modificar";}else{ echo "Registrar"; } ?>"></input>
						<button type="reset" class="btn btn-primary" onclick="cancelar('MaestroReporte')">Cancelar</button>
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
			<div class="panel-heading"> 
				<div class="panel-title">Ultima Actividad Realizada</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abrepais()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
			<div class="panel-body"><i class="glyphicon glyphicon-pencil">- </i> <?php $b->ShowBitacora(); ?></div>
		</div>
		<!-- FIN DE OPERACIONES -->
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Responsabilidades Registradas</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abrepais()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Reporte</th>
							<th>Url</th>
							<th>Editar</th>
							<th>Desactivar/Activar</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$Reporte->ListarReporte();
						?>
					</tbody>
				</table>
			</div>
		</div>
    </div>
</div>
