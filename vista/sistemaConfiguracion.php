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
	require_once("../modelo/class_configuracion.php");
	$us=new configuracion;
	$cadena = $us->datosConfiguracionTodo();
?>
<script src="tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>

<div class="row spa">
	<div class="col-md-12">
		<form name="fSistema" id="fSistema" method="post" action="../controlador/controlador_configuracion.php">
			<div class="col-md-12">
				<!-- PANEL FORMULARIOS -->
				<div class="panel panel-default">
					<div class="panel-heading">Configuración del sistema</div>
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-lg-6">
									<label>Numero de intentos fallidos:</label>
									<input type="text" name="fallidos"  class="form-control text-center" value="<?php if(isset($cadena)){ echo $cadena[0]; } ?>"/>
								</div>
								<div class="form-group col-lg-6">
									<label>Dias caducidad de contraseña:</label>
									<input type="text" name="cclave"  class="form-control text-center" value="<?php if(isset($cadena)){ echo $cadena[1]; } ?>" />
								</div>
								<div class="form-group col-lg-6">
									<label>Cantidad de preguntas secretas:</label>
									<input type="text" name="preguntas"  class="form-control  text-center" value="<?php if(isset($cadena)){ echo $cadena[2]; } ?>"/>
								</div>
								<div class="form-group col-lg-6">
									<label>Tiempo limite conexion:</label>
									<input type="text" name="tconexion"  class="form-control text-center" value="<?php if(isset($cadena)){ echo $cadena[3]; } ?>" />
								</div>
								<div class="form-group col-lg-6">
									<label>Nombre sistema:</label>
									<input type="text" name="sistema"  class="form-control text-center" value="<?php if(isset($cadena)){ echo $cadena[4]; } ?>" />
								</div>
								<div class="form-group col-lg-6">
									<label>Version:</label>
									<input type="text" name="version"  class="form-control text-center" value="<?php if(isset($cadena)){ echo $cadena[5]; } ?>" />
								</div>
								<div class="form-group col-lg-6">
									<label>Lenguaje programación:</label>
									<input type="text" name="lenguaje"  class="form-control text-center" value="<?php if(isset($cadena)){ echo $cadena[6]; } ?>" />
								</div>
								<div class="form-group col-lg-6">
									<label>Mesajes de textos:</label>
									<br>
									<label class="checkbox-inline">
										<input type="radio" name="mensajes" value="1" <?php if($cadena[7] == 1){ echo "checked";}?> > Activo
									</label>
									<label class="checkbox-inline">
										<input type="radio"  name="mensajes" value="0"<?php if($cadena[7] == 0){ echo "checked";}?> > Inactivo
									</label>       
								</div>
									
							</div>
							<div class="row">
								<center>
								<input type="hidden" name="id" value="<?php echo $_SESSION["idUsuario"]; ?>" >
								<input type="submit" class="btn btn-lg btn-primary" name="opt" value="<?php if(isset($cadena)){ echo "Modificar";}else{ echo "Registrar"; } ?>"></input>
								<button type="reset" class="btn btn-lg btn-primary">Cancelar</button></center>
							</div>
						</div>
					</div>
				</div>
			
			<div class="col-md-12">
				<!-- BITACORA DE OPERACIONES -->
				<div class="panel panel-default">
					<div class="panel-heading">Ultima actividad realizada</div>
					<div class="panel-body"><i class="glyphicon glyphicon-pencil">- </i> <?php $b->ShowBitacora(); ?></div>
				</div>
			</div>
		</form>
	</div>
</div>
