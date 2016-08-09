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
	$cadena = $us->datos_objetivos();
?>
<script src="../libreria/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen","insertdatetime media table contextmenu paste",
        "emoticons","media","preview","print","paste","spellchecker","table","textcolor",
        "wordcount","searchreplace","nonbreaking","insertdatetime","hr","fullscreen",
        "fullpage","code","charmap", "visualchars","template", "pagebreak",
        "layer","save","contextmenu","directionality","noneditable",
        "autosave"
    ],
    toolbar: "insertfile undo redo | fontselect | fontsizeselect | formatselect | styleselect | bold italic underline strikethrough | " +
             "alignleft aligncenter alignright alignjustify | " +
             "bullist numlist outdent indent | table | forecolor  backcolor | cut copy paste pastetext newdocument  | image media  emoticons | link  unlink | preview searchreplace  print  |"+
             "spellchecker | hr nonbreaking |"+
             "   insertdatetime  |  charmap visualchars code  | template |" +
             "pagebreak  blockquote  anchor  | fullscreen | fullpage | help |" +
             "removeformat | restoredraft |  ltr rtl  | save ",
    language: "es_MX"
});
</script>

<div class="row spa">
	<div class="col-md-12">
		<form name="fSistema" id="fSistema" method="post" action="../controlador/controlador_configuracion_objetivos.php">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><div class="panel-title">Configuración del Contenido Objetivos</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
				</div>
					<div class="panel-body">
						<div class="row">
							<div class="form-group col-lg-12">
								<textarea rows="12" cols="50" class="form-control" name="objetivos"><?php if(isset($cadena)){ echo $cadena[0]; } ?></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="row">
								<center>
								<input type="hidden" name="id" value="<?php echo $_SESSION["idUsuario"]; ?>" >
								<input type="submit" class="btn btn-lg btn-primary" name="opt" value="<?php if(isset($cadena)){ echo "Modificar";}else{ echo "Registrar"; } ?>"></input>
								<button type="reset" class="btn btn-lg btn-primary">Cancelar</button>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<!-- BITACORA DE OPERACIONES -->
				<div class="panel panel-default">
					<div class="panel-heading"><div class="panel-title">Ultima actividad realizada</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div></div>
					<div class="panel-body"><i class="glyphicon glyphicon-pencil">- </i> <?php $b->ShowBitacora(); ?></div>
				</div>
			</div>
		</form>
	</div>
</div>

