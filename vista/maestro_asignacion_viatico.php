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
	require_once("../modelo/class_asig_viatico.php");
	require_once("../modelo/clscombo.php");
	$lobjcombo= new clscombo();
	
	$idorden_carga = (isset($_GET['orden_carga'])) ? $_GET['orden_carga'] : null;
	$operacion = (isset($_GET['operacion']))?$_GET['operacion']:'cerrar';
	$lobjtab = new class_asig_viatico();
	
	if($operacion=='modificar')
	{
		$asignacion = $lobjtab->fbuscarAsignacion($id_asignacion);
		
		//print_r($asignacion);exit();
		
		$idorden_carga = $asignacion['idorden_carga_asivia'];
		$ruta = $lobjtab->buscarRuta($asignacion['idruta_tabvia']);
		
		$origen =  $lobjtab->buscarCiudad($ruta['idciudad_origen_rut']);
		$destino =  $lobjtab->buscarCiudad($ruta['idciudad_destino_rut']);
		$id_tabulador = $asignacion['idtabulador_viatico_asivia'];	
		$dias_ruta = $ruta['dias_rut'];
		$monto_asignado = $asignacion['monto_asignado_asivia'];
	}
	
	
	$tabulador= $lobjtab->listarCombo();
	$precio = $lobjtab->precioTabulador();
	
?>
<!DOCTYPE html> 
<html>
<head>
		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" id="style-resource-1"> 
		<link rel="stylesheet" href="css/entypo.css" id="style-resource-2"> 
		<link rel="stylesheet" href="../jquery/jquery-ui.theme.css">
		<link rel="stylesheet" href="css/bootstrap.css" id="style-resource-4"> 
		<link rel="stylesheet" href="css/neon-core.css" id="style-resource-5"> 
		<link rel="stylesheet" href="css/neon-theme.css" id="style-resource-6"> 
		<link rel="stylesheet" href="css/neon-forms.css" id="style-resource-7"> 
		<link rel="stylesheet" href="css/custom.css" id="style-resource-8">
		
		<link rel="stylesheet" href="../jquery/jquery-ui.css">
		<script src="../jquery/jquery-ui.min.js"></script>
		<script src="../jquery/jquery-ui.js"></script>
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
</head>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Asignar Viatico</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" ></i></div> 
			</div>
				<div class="panel-body">
					
					<form method="post" name="asignacion" id="asignacion" action="../controlador/control_asignacion_viatico.php">
						
						<input type="hidden" name="txtorden_carga" value="<?php print($idorden_carga);?>">
						<input type="hidden" name="txtoperacion" value="<?php print($operacion);?>">
						<div class="row">
							<div class="form-group col-lg-3">
								<label >Fecha de Asignacion:</label>
								<input class="form-control"  type="date" name="txtfecha" id="datepicker1" title="ingrese la fecha de asignacion"  tabindex="1" value="<?php echo date('d-m-Y') ?>"   />
							</div>	
							<div class="col-lg-6">
								<div class="form-group has-error">
										<label >Tabulador de viatico:</label>
										<select name="tabulador_viatico" id="tabulador_viatico" class="form-control" onChange="cargarRuta(this.value)">
											<option value="-" >-Seleccione-</option>
											<?php  if(count($tabulador)):  ?>
											<?php foreach($tabulador as $valor): ?>
												<option value="<?php echo $valor['codigo']; ?>" ><?php echo 'Tabulador:'.$valor['codigo'].' - Ruta:'.$valor['via_ruta']; ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
										</select>
								</div>
							</div>
							<div class="form-group col-lg-2">
								<label >Origen:</label>
								<input class="form-control"  type="text" name="txtorigen" id="txtorigen"  onkeypress="return soloNumero(event)" title="Ingrese código del tabulador"   tabindex="2"  onblur="fperderfocusidproducto();" size="5" value="" disabled="true" />
							</div>
							<div class="form-group col-lg-2">
								<label >Destino:</label>
								<input class="form-control"  type="text" name="txtdestino" id="txtdestino" onkeypress="return soloNumero(event)" title="Ingrese código del tabulador"   tabindex="3"  onblur="fperderfocusidproducto();" size="5" value="" disabled="true" />
							</div>
							<div class="form-group col-lg-2">
								<label >Dias:</label>
								<input class="form-control"  type="text"  name="txtdias" id="txtdias" onkeypress="return soloNumero(event)" title="Ingrese el numero de dias"  maxlength="3" tabindex="1"  onblur="recalcular()" size="5" value="" readOnly="true" />
							</div>
							<div class="form-group col-lg-2">
								<label >Monto Viatico:</label>
								<input class="form-control"  type="text"  name="txtmonto" id="txtmonto" onkeypress="return soloNumero(event)" title="Ingrese el numero de dias"  tabindex="1"   size="5" value="" readOnly="true" />
							</div>
							<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							</div>	
							<div class="row">
								<div class="form-group col-lg-3"></div>
							
							</div>
							
							<center>
								<button type="submit" name="btnguardar"   class="btn btn-lg btn-primary"  title="Clic para Guardar" onclick="fguardar();">Guardar</button>
								<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('maestro_banco')">Cancelar</button>
						</center>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title"><i class="entypo-info"></i>Información
				</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> 
				</div>
			</div>
			<div class="panel-body"> <div class="col-md-1">
					<i class="entypo-basket" style="font-size:30px;"></i>
			</div>
			<div class="col-md-11">
				<label>Un producto es el elemento principal en el servicio de transporte por lo tanto es un registro obligatorio que debe estar disponible en el registro de la solicitud de transporte</label>
			</div> 
		</div>
	</div> 
</div>
</div>



<script language="javascript">
	finicio();
	function finicio()
	{
		lof=document.asignacion;
		
			if (lof.txtoperacion.value=="cerrar")
			{
				window.opener.location.reload();
				window.close();
			}
			else
			{
						lof.txtoperacion.value="incluir";
			}			
	}
	function guardar()
	{
		lof=document.asignacion;
		if (lof.txtoperacion.value=="incluir")
		{
			lof.submit();
		}
	}
	function cerrar()
	{
		window.close();	
	}
	function cargarRuta(valor)
	{
		var datos = <?php echo $precio ?>;
		var encontrado = 0;
		
		if(datos.length>0)
		{
			for(i=0;i < datos.length;i++)
			{		
				if(datos[i].codigo==valor)
				{
							encontrado = 1;	
							document.getElementById('txtorigen').value= datos[i].origen;
							document.getElementById('txtdestino').value= datos[i].destino;
							document.getElementById('txtdias').value= datos[i].dias;
							document.getElementById('txtmonto').value= datos[i].total;
				}
			}
			if(encontrado==0)
			{
				document.getElementById('txtorigen').value= "";
				document.getElementById('txtdestino').value= "";
				document.getElementById('txtdias').value= 0;
				document.getElementById('txtmonto').value= 0;
			}	
		}	
	}
	
	 
</script>

	

</html>
