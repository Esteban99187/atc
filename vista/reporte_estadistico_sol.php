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
	
	include_once ("../modelo/class_solicitud.php");
	//defined("SYSPATH") or die("No direct script access.");
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	//if(!$login)
	//{
	//	exit('<script> alert("Acceso Denegado!"); window.location.href="session.php" </script>');
	//}
	$fecha1= (isset($_POST['fecha1']))?$_POST['fecha1']:false;
	$fecha2= (isset($_POST['fecha2']))?$_POST['fecha2']:false;
	
	
	$titulo = array();
	$sol = new class_solicitud();
	$listado = $sol->estadistica_solicitud($fecha1,$fecha2);
	
	$cabecera = array("emitida","ejecutada","espera","procesada","anulada");
	$valores = array();
	if(count($listado))
	{
		for($i=0;$i<count($listado);$i++)
		{
			$valores[]= $listado[$i]['total'];
			$titulo[]= $listado[$i]['sol'];
		}
	}	
	///print_r($listado);exit();
	
?>

<link href="css/maestro.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="../jquery/jquery-ui.css">
	<script src="../jquery/jquery-ui.min.js"></script>
	<script src="../jquery/jquery-ui.js"></script>
	<link rel="stylesheet" href="../jquery/jquery-ui.theme.css">
	<script>
		$(function() 
		{ 
			//Array para dar formato en español
			$.datepicker.regional['es'] = 
			{
				closeText: 'Cerrar', 
				prevText: 'Previo', 
				nextText: 'Próximo',
				monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
				'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
				'Jul','Ago','Sep','Oct','Nov','Dic'],
				monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
				dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
				dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
				dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
				dateFormat: 'dd-mm-yy', firstDay: 0, 
				initStatus: 'Selecciona la fecha', isRTL: false
			};
			$.datepicker.setDefaults($.datepicker.regional['es']);
			//miDate: fecha de comienzo D=días | M=mes | Y=año
			//maxDate: fecha tope D=días | M=mes | Y=año
			$( "#datepicker" ).datepicker({  maxDate: "+1M +10D" });  
			$( "#datepicker1" ).datepicker({  maxDate: "+1M +10D" });
		});
	</script>
<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Estadistica de Solicitudes</strong></div>
				<div class="panel-body">
					<form method="post" name="fproducto" id="fproducto" action="" >
						<div class="row">
							<hr>
							<div>
								<?php if(count($titulo)): ?>
								<img src="graf_estadistico.php?fecha1=<?php echo $fecha1 ?>&fecha2=<?php echo $fecha2 ?>" />
								<?php else: ?>
									Consulta sin resultados.....
								<?php endif; ?>
							</div>
							<br/>
							<form name="form_graf" id="form_graf" >
							<p>
								<label>Origen</label>
								<input type="date" name="fecha1" id="datepicker" value="<?php if(isset($fecha1))echo $fecha1 ?>"  >
								<label>Destino</label>
								<input type="date" name="fecha2" id="datepicker1" value="<?php if(isset($fecha2))echo $fecha2 ?>"  >
								<button type="submit" >Enviar</button>
							</p>
							
							</form>
							<hr>
							<?php if(count($titulo)): ?>
							<table class="table table-striped" id="table_viatico">
								<tr>
									
								<?php for($i=0;$i<count($titulo);$i++):  ?>
									<td ><?php echo $titulo[$i] ?></td>							
								<?php endfor; ?>
								</tr>
								<?php $i = 0 ; ?> 
								<?php if(isset($listado) && count($listado)): ?> 
									<tr>
									<?php foreach($valores as $val) :?>
										
											<td align="center"><?php echo $val ?></td>
									
									<?php endforeach; ?>
									 </tr>
								<?php endif; ?>
							</table>
							<?php endif; ?>
							<hr>
							<div class="col-md-4 col-md-offset-4"></div>
							<div class="form-group col-lg-2 col-md-3 col-md-offset-4">
							</div>
							<br>
						</div>	
						<div class="form-group col-lg-3">
						</div> 
					</form>
				</div>
			</div>
		</div>
	</div>
</div>	
			
		<script src="js/validaciones.js"></script>
		
		
<script language="javascript">
	function flistar(dato)
	{
		mipopup = window.open("maestro_asignacion_viatico.php?operacion=incluir&orden_carga="+dato,"listaviatico","width=450,height=650,scrollbars=yes");
		mipopup.focus();
	}
	function fimprimir(dato)
	{
		mipopup = window.open("reporte/pdfRep_asignacion_viatico.php?lsa="+dato,"listaviatico","width=950,height=650,scrollbars=yes");
		mipopup.focus();
	}
	function fayuda()
	{
		mipopup = window.open("ayuda/ayudaproducto.php","ventanaayuda","width=550,height=650,scrollbars=yes");
		mipopup.focus();
	}
	var miPopup
		function abreproducto(){
		miPopup = window.open("busqueda/buscaproducto.php","solicitud","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}
	 
</script>
