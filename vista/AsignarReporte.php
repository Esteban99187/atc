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
	$idCargo = isset($_POST['idCargo']) ? $_POST['idCargo'] : null;
	require_once("../modelo/class_perfil_reporte.php");
	require_once("../modelo/class_selects.php");
	$sl = new selects;
	$us = new class_perfil_reporte;
	if(isset($_GET["edit"]))
	{
		$listo = $us->recibir_datos($_GET["edit"]);
		if(listo)
		{
			$cadena = $us->getdatos_array();
		}
	}
	if(isset($_GET["del"]))
	{
		if($b->addActividad(3,5,$_SESSION["idUsuario"]))
		{
			if(isset($_GET["acc"]) and $_GET["acc"] == 'r')
			{
				$estatus = 1;
			}
			else if(isset($_GET["acc"]) and $_GET["acc"] != 'r')
			{
				$estatus = 0;
			}
			$b->EliminacionLogica('troles',$estatus,$_GET["del"],'idRol');
		}
	}
	$datos = $us->listaResponsabilidades();
	$cantidad = count($datos);
	if(isset($_GET["act"]))
	{
		if($us->eliminar_reporte($_GET["act"]))
		{
			echo '<script>window.location="admin.php?url=AsignarReporte&av=2"</script>';
		}
		else
		{
			echo '<script>window.location="admin.php?url=AsignarReporte&av=8"</script>';
		}
	}
?>
<div class="row spa">
	<div class="col-md-12">
		<!-- PANEL FORMULARIOS -->
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Asignar Reporte</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abrepais()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
				<div class="panel-body">
					<form name="buscarCargo" method="post" action="#activado">
						<div class="row">
							<div class="col-xs-3">
								<div class="form-group">
									<input type="hidden" name="opt" value="Siguiente">
									<label>Seleccion un perfil :</label>
									<select onChange="submit();" name="idCargo" class="form-control">
										<option value="0">Seleccione un Perfil</option>
											<?php
												$sl->selectPerfil();
											?>
									</select>
								</div>
							</div>
						</div>
					</form>        
					<form name="fActividad" id="fActividad" method="post" action="../controlador/controlador_asignar_reporte.php">
						<div class="row">
							<div class="col-md-12">
								<table class="table">
									<tr>
										<th>Menu</th>
									<tr>
									<?php
										$us->RecuperarResponsabilidades($idCargo);
										/* 
										$us->ListaAsignacion();
										*/ 
									?>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<input type="hidden" name="idCargo2" value="<?php echo $_POST["idCargo"] ?>">
								<input type="hidden"   name="opt" value="Guardar"></input>
								<input type="submit"  class="btn btn-primary" name="opt" value="Guardar"></input>
								<button type="reset" class="btn btn-primary" onclick="cancelar('AsignarReporte')">Cancelar</button>
								<button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Agregar otra responsabilidad</button>
							</div>
					</form>
				</div>
			</div>
			<!-- FIN DE PANEL FORMULARIOS -->
		</div>
	</div>
	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Seleccione un Reporte</h4>
					<form name="agregarRespo" method="post" action="../controlador/controlador_agregar_reporte.php">
						<table class="table">
							<tr>
								<th>Menus</th>
								<th></th>
							</tr>
							<tr>
								<?php
									for($i=0;$i<=$cantidad-1;$i++)
									{
										echo '<tr><td>'.strtoupper($datos[$i][0]).'</td><td>'.' '.'-'.' '.strtoupper($datos[$i][2]).'</td><td><input type="checkbox" name="rol[]" value="'.$datos[$i][1].'"></td></tr>';
									}
								?>  
							</tr>
						</table>
						<input type="hidden" name="idCargo" value="<?php echo $_POST["idCargo"] ?>">
						<input type="submit" class="btn btn-primary" name="opt" value="Guardar"></input>
						<input type="button" onclick="cancelar('MaestroReporte')" class="btn btn-primary" name="opt" value="Crear nuevo reporte"></input>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
