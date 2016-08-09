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
	*                   Marcelo Maria  <mary_mvr_cliente72@hotmail.com>                               *
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
	include_once ("../modelo/class_producto.php");
	include_once ("../modelo/class_solicitud_cliente.php");
	defined("SYSPATH") or die("No direct script access.");
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	if(!$login)
	{
		exit('<script> alert("Acceso Denegado!"); window.location.href="session.php" </script>');
	}
	require_once("../modelo/clscombo.php");
	$lobjcombo= new clscombo();
	
	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;
	$idsolicitud = isset($_GET['idsolicitud']) ? $_GET['idsolicitud'] : null;
	//~ cliente
	$lsidcliente = isset($_GET['lsidcliente']) ? $_GET['lsidcliente'] : null;
	$lsnombre_cli = isset($_GET['lsnombre_cli']) ? $_GET['lsnombre_cli'] : null;
	$lstelefono_cli = isset($_GET['lstelefono_cli']) ? $_GET['lstelefono_cli'] : null;
	$lscorreo_cli = isset($_GET['lscorreo_cli']) ? $_GET['lscorreo_cli'] : null;
	//~ fin cliente
	//~ tabulador
	$lsidtabulador = isset($_GET['lsidtabulador']) ? $_GET['lsidtabulador'] : null;
	$lsprecio_tabulador = isset($_GET['lsprecio_tabulador']) ? $_GET['lsprecio_tabulador'] : null;
	$lsidpais_destino_tabulador = isset($_GET['lsidpais_destino_tabulador']) ? $_GET['lsidpais_destino_tabulador'] : null;
	$lsidestado_destino_tabulador = isset($_GET['lsidestado_destino_tabulador']) ? $_GET['lsidestado_destino_tabulador'] : null;
	$lsidmunicipio_destino_tabulador = isset($_GET['lsidmunicipio_destino_tabulador']) ? $_GET['lsidmunicipio_destino_tabulador'] : null;
	$lsidparroquia_destino_tabulador = isset($_GET['lsidparroquia_destino_tabulador']) ? $_GET['lsidparroquia_destino_tabulador'] : null;
	$lsidciudad_destino_tabulador = isset($_GET['lsidciudad_destino_tabulador']) ? $_GET['lsidciudad_destino_tabulador'] : null;
	$lsidpais_origen_tabulador = isset($_GET['lsidpais_origen_tabulador']) ? $_GET['lsidpais_origen_tabulador'] : null;
	$lsidestado_origen_tabulador = isset($_GET['lsidestado_origen_tabulador']) ? $_GET['lsidestado_origen_tabulador'] : null;
	$lsidmunicipio_origen_tabulador = isset($_GET['lsidmunicipio_origen_tabulador']) ? $_GET['lsidmunicipio_origen_tabulador'] : null;
	$lsidparroquia_origen_tabulador = isset($_GET['lsidparroquia_origen_tabulador']) ? $_GET['lsidparroquia_origen_tabulador'] : null;
	$lsidciudad_origen_tabulador = isset($_GET['lsidciudad_origen_tabulador']) ? $_GET['lsidciudad_origen_tabulador'] : null;
	$lsprecio_sol = isset($_GET['lsprecio_sol']) ? $_GET['lsprecio_sol'] : null;
	$lsunidades_req = isset($_GET['lsunidades_req']) ? $_GET['lsunidades_req'] : null;
	$lsdireccion_salida = isset($_GET['lsdireccion_salida']) ? $_GET['lsdireccion_salida'] : null;
	$lsdireccion_entrega = isset($_GET['lsdireccion_entrega']) ? $_GET['lsdireccion_entrega'] : null;
	$lsfecha_salida = isset($_GET['lsfecha_salida']) ? $_GET['lsfecha_salida'] : null;
	$lsfecha_entrega = isset($_GET['lsfecha_entrega']) ? $_GET['lsfecha_entrega'] : null;
	$lsobservaciones_sol = isset($_GET['lsobservaciones_sol']) ? $_GET['lsobservaciones_sol'] : null;
	$lsidtipo_unidad = isset($_GET['lsidtipo_unidad']) ? $_GET['lsidtipo_unidad'] : null;
	$lsdesc_tipo_unid = isset($_GET['lsdesc_tipo_unid']) ? $_GET['lsdesc_tipo_unid'] : null;
	$lscapacidad = isset($_GET['lscapacidad']) ? $_GET['lscapacidad'] : null;
	$lsdesc_unid_medi = isset($_GET['lsdesc_unid_medi']) ? $_GET['lsdesc_unid_medi'] : null;	
	//~ fin tabulador	
	$class_producto = new class_producto();
	$datosproducto=$class_producto->listarCombo();
	$contador = 0;
	if($lsoperacion=='buscar')
	{
		$solicitud= new class_solicitud_cliente();
		$solicitud->buscarDetalle($idsolicitud);
		$detalle =$solicitud->get_detalle();
		$contador = count($detalle);
		//print_r($detalle);
	}	
	$peso_total=0;
	include '../modelo/conexion_select.php';	
	function Select_dependiente_origen_tabulador()
	{
		$lsidpais_origen_tabulador = isset($_GET['lsidpais_origen_tabulador']) ? $_GET['lsidpais_origen_tabulador'] : null;
		conectar();
		$consulta=mysql_query("SELECT idpais, desc_pais FROM pais");
		desconectar();
		// Voy imprimiendo el primer select compuesto por los cmbpais_origen_solicitudes
		echo "<label >Pais Origen:</label>";
		echo "<select name='cmbidpais_origen_tabulador' class='form-control' id='cmbidpais_origen_tabulador' onChange='cargaContenido_origen(this.id)'>";
		if (!empty($lsidpais_origen_tabulador))
		{
			echo '<option value="" >'.$lsidpais_origen_tabulador.'</option>';
		}
		else
		{
			while($registro=mysql_fetch_row($consulta))
			{
				echo "<option value=''>Seleccione</option>";
				echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
			}
		}
		echo "</select>";
	}
	function Select_dependiente_destino_tabulador()
	{
		$lsidpais_destino_tabulador = isset($_GET['lsidpais_destino_tabulador']) ? $_GET['lsidpais_destino_tabulador'] : null;
		conectar();
		$consulta=mysql_query("SELECT idpais, desc_pais FROM pais");
		desconectar();
		// Voy imprimiendo el primer select compuesto por los cmbpais_origen_solicitudes
		echo "<label >Pais Destino:</label>";
		echo "<select name='cmbidpais_destino_tabulador' class='form-control' id='cmbidpais_destino_tabulador' onChange='cargaContenido_destino(this.id)'>";
		if (!empty($lsidpais_destino_tabulador))
		{
			echo '<option value="" >'.$lsidpais_destino_tabulador.'</option>';
		}
		else
		{
			while($registro=mysql_fetch_row($consulta))
			{
				echo "<option value=''>Seleccione</option>";
				echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
			}
		}
		echo "</select>";
	}
	require_once("../modelo/class_solicitud_cliente.php");
	$objsolicitud = new class_solicitud_cliente();
	$liidsolicitud = $objsolicitud->fContar();
?>
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
				dateFormat: 'dd/mm/yy', firstDay: 0, 
				initStatus: 'Selecciona la fecha', isRTL: false
			};
			$.datepicker.setDefaults($.datepicker.regional['es']);
			//miDate: fecha de comienzo D=días | M=mes | Y=año
			//maxDate: fecha tope D=días | M=mes | Y=año
			$( "#datepicker" ).datepicker({ minDate: 0, maxDate: "+1M +10D" });  
			$( "#datepicker1" ).datepicker({ minDate: 0, maxDate: "+1M +10D" });
		});
	</script>
<link href="css/maestro.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/select_dependiente_origen_tabulador.js"></script>
<script type="text/javascript" src="js/select_dependiente_destino_tabulador.js"></script>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Solicitud de Transporte</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
			</div>
			<div class="panel-body">
					<form method="post" name="fsolicitud" id="fsolicitud" action="../controlador/control_transaccion_solicitud_cliente.php" >
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<input type="hidden" name="txtidcliente" value="<?php print($idclienteusuario);?>">
						<div class="row">
							<div class="form-group col-lg-2">
								<input class="form-control"  type="hidden" name="txtidsolicitud" onkeypress="return soloNumero(event)" title="Ingrese código del tabulador"   tabindex="1"  onblur="fperderfocusidproducto();" size="5" value="<?php echo $liidsolicitud; ?>" disabled="true" />
							</div>
						</div>
						<div class="row"><hr><h4><center>Datos de Origen</center></h4><hr>
								<!--inican los select dependientes de la direccion origen del tabulador-->
								<div class="form-group col-lg-2"><?php Select_dependiente_origen_tabulador(); ?></div>
								<div class="form-group col-lg-2">
									<label >Estado Origen:</label>
									<select class="form-control"  name="cmbidestado_origen_tabulador" id="cmbidestado_origen_tabulador">
										<?php
											if (!empty($lsidestado_origen_tabulador))
											{
												echo '<option value="" >'.$lsidestado_origen_tabulador.'</option>';
											}
											else
											{
											 echo '<option value="">Seleccione</option>';
											}
										?>
									</select>
								</div>
								<div class="form-group col-lg-2">
									<label >Municipio Origen:</label>
									<select class="form-control"  name="cmbidmunicipio_origen_tabulador" id="cmbidmunicipio_origen_tabulador">
										<?php
											if (!empty($lsidmunicipio_origen_tabulador))
											{
												echo '<option value="" >'.$lsidmunicipio_origen_tabulador.'</option>';
											}
											else
											{
											 echo '<option value="">Seleccione</option>';
											}
										?>
									</select>
								</div>
								<div class="form-group col-lg-3">
									<label >Parroquia Origen:</label>
									<select class="form-control"  name="cmbidparroquia_origen_tabulador" id="cmbidparroquia_origen_tabulador">
										<?php
											if (!empty($lsidparroquia_origen_tabulador))
											{
												echo '<option value="" >'.$lsidparroquia_origen_tabulador.'</option>';
											}
											else
											{
											 echo '<option value="">Seleccione</option>';
											}
										?>
									</select>
								</div>
								<div class="form-group col-lg-3">
									<label >Ciudad Origen:</label>
									<select class="form-control"  name="cmbidciudad_origen_tabulador" id="cmbidciudad_origen_tabulador">
										<?php
											if (!empty($lsidciudad_origen_tabulador))
											{
												echo '<option value="" >'.$lsidciudad_origen_tabulador.'</option>';
											}
											else
											{
											 echo '<option value="">Seleccione</option>';
											}
										?>
									</select>
								</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-2">
								<label >Fecha de Origen:</label>
								<input class="form-control"  readonly type="text" id="datepicker" name="txtfecha_salida" title="Ingrese Fecha de Origen"  maxlength="12"  tabindex="2"  value="<?php print($lsfecha_salida);?>"> 
							</div>
							<div class="form-group col-lg-10">
								<label >Direccion de Origen:</label>
								<input class="form-control"  type="text" name="txtdireccion_salida"   title="Ingrese Dirección de Origen" maxlength="250" tabindex="2"  value="<?php print($lsdireccion_salida);?>">
							</div>
						</div>
						<div class="row"><hr><h4><center>Datos de Destino</h4></center><hr>
							<!--********************************************************************-->
							<!--inican los select dependientes de la direccion destino del tabulador-->
							<div class="form-group col-lg-2"><?php Select_dependiente_destino_tabulador(); ?></div>
							<div class="form-group col-lg-2">
								<label >Estado Destino:</label>
								<select class="form-control"  name="cmbidestado_destino_tabulador" id="cmbidestado_destino_tabulador">
									<?php
										if (!empty($lsidestado_destino_tabulador))
										{
											echo '<option value="" >'.$lsidestado_destino_tabulador.'</option>';
										}
										else
										{
										 echo '<option value="">Seleccione</option>';
										}
									?>
								</select>
							</div>
							<div class="form-group col-lg-2">
								<label >Municipio Destino:</label>
								<select class="form-control"  name="cmbidmunicipio_destino_tabulador" id="cmbidmunicipio_destino_tabulador">
									<?php
										if (!empty($lsidmunicipio_destino_tabulador))
										{
											echo '<option value="" >'.$lsidmunicipio_destino_tabulador.'</option>';
										}
										else
										{
										 echo '<option value="">Seleccione</option>';
										}
									?>
								</select>
							</div>
							<div class="form-group col-lg-3">
								<label >Parroquia Destino:</label>
								<select class="form-control"  name="cmbidparroquia_destino_tabulador" id="cmbidparroquia_destino_tabulador">
									<?php
										if (!empty($lsidparroquia_destino_tabulador))
										{
											echo '<option value="" >'.$lsidparroquia_destino_tabulador.'</option>';
										}
										else
										{
										 echo '<option value="">Seleccione</option>';
										}
									?>
								</select>
							</div>
							<div class="form-group col-lg-3">
								<label >Ciudad Destino:</label>
								<select class="form-control"  name="cmbidciudad_destino_tabulador" id="cmbidciudad_destino_tabulador">
									<?php
										if (!empty($lsidciudad_destino_tabulador))
										{
											echo '<option value="" >'.$lsidciudad_destino_tabulador.'</option>';
										}
										else
										{
										 echo '<option value="">Seleccione</option>';
										}
									?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-2">
									<label >Fecha de Destino:</label>
									<input class="form-control"  readonly type="text" id="datepicker1" name="txtfecha_entrega"  maxlength="30" title="Ingrese fecha de Origen"  tabindex="2"  value="<?php print($lsfecha_entrega);?>">
							</div>
							<div class="form-group col-lg-10">
								<label >Dirección de Destino:</label>
								<input class="form-control"  type="text" name="txtdireccion_entrega"  maxlength="30" title="Ingrese Dirección de Destino" tabindex="2"  value="<?php print($lsdireccion_entrega);?>">
							</div>
						</div>
						<div class="row">
							<input type="hidden" name="txtidtabulador"  value="<?php print($lsidtabulador);?>">
							<input type="hidden" name="txtidtipo_unidad" id="txtidtipo_unidad"   value="<?php print($lsidtipo_unidad);?>">
							<div class="form-group col-lg-1">
								<label >Buscar:</label>
								<button class="btn btn-primary" type="button" title="buscar precio" value="..."  class="botontab" name="btnAbretabulador"   onclick="abretabulador()"><i class="glyphicon glyphicon-search"></i></button>
							</div>
							<div class="form-group col-lg-3">
								<label >Tipo unidad:</label>
								<input class="form-control"  type="text" name="txtdesc_tipo_unid" readonly value="<?php print($lsdesc_tipo_unid);?>">
							</div>
							<div class="form-group col-lg-4">
								<label >Capacidad:</label>
								<input class="form-control"  type="text" name="txtcapacidad" id="txtcapacidad" readonly onkeypress="return soloNumero(event)" title="ingrese Código del Tabulador" maxlength="5" tabindex="2"   value="<?php print($lscapacidad);?>">
							</div>
							<div class="form-group col-lg-4">
								<label >Medida:</label>
								<input class="form-control"  type="text" name="txtdesc_unid_medi" readonly  title="ingrese Código del Tabulador" maxlength="5" tabindex="2"   value="<?php print($lsdesc_unid_medi);?>">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-12">
									<label >Observaciones:</label>
									<textarea rows="1" class="form-control" name="txtobservaciones_sol"  value="<?php print($lsobservaciones_sol);?>"   ></textarea>
							</div>
						</div>
						<div class="row">
							<h5><center>Producto</h5></center><hr>
							<div class="form-group col-lg-2">
								<button type="button"  class="btn btn-success"  onclick="addRow('table_solicitud');" disabled="true"  name="agrfila"    ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
								<button type="button" class="btn btn-danger" onclick="deleteRow('table_solicitud');" disabled="true" name="delfila"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></div>
								<table class="table table-striped" id="table_solicitud">
									<tr>
										<td></td>
										<td >Descripción</td>
										<td >Tipo Producto</td>
										<td >Unidad de Medida</td>
										<td >Cantidad</td>
										<td></td>
									</tr>
									<?php $i = 0 ; ?> 
									<?php if(isset($detalle) && count($detalle)): ?> 
									<?php foreach($detalle as $val) :?>
									<?php  
											$peso_pro =  $val['peso_pro']; 
											$peso_total = $peso_total + $peso_pro;
											$i++;
									?>
									<tr>
										<td align="center"><input  id="opt" type="checkbox"></td>
										<td>
											<select  class="form-control"  name="descripcion[]" id="des<?php echo $i  ?>" onChange="cargarProducto(this.id)">
												<option value="" value="" >Seleccione</option>
												<?php
													$lssql="select * from producto ";
													$lobjcombo->fgenerar($lssql,"idproducto","desc_prod",$val['iddet_cencos']);
												?>
											</select>
										</td>
										<td><input class="form-control" name="precio[]" id="pvp<?php echo $i  ?>" value="<?php if(isset($val['desc_tipo_prod']))echo $val['desc_tipo_prod']  ?>" size="3" readOnly="true" /></td>
										<td><input class="form-control" name="peso_pro[]" id="mto<?php echo $i  ?>" value="<?php if(isset($val['unidad_medida']))echo $val['unidad_medida']  ?>" size="3"  /></td>
										<td><input class="form-control" name="cantidad[]" id="can<?php echo $i  ?>" value="<?php if(isset($val['peso_pro']))echo $val['peso_pro']  ?>" size="3" onChange="recalcular()"  /></td>
										<td><input id="cod<?php echo $i  ?>" name="codigo[]" type="hidden" value="<?php echo $val['idsolicitud_producto'];  ?>" /></td>
									</tr>
									<?php endforeach; ?>
									<?php endif; ?>
								</table>
							<input type="hidden" id="contador" value="<?php if(isset($contador)) echo $contador;  ?>"/>
							<hr>
							<div class="form-group col-lg-8">
							</div>
							<div class="form-group col-lg-3" style="margin-left:70px;">
								<label>Cantidad Total:</label>
								<input name="totalviatico" id="totalviatico"  class="form-control"  type="text" size="10" readonly value="<?php echo $peso_total ?>"/>
								<label >Nro de Unidades:</label>
								<input class="form-control"  type="text" name="txtunidades_req" id="txtunidades_req"  readonly   value="<?php print($lsunidades_req);?>">
							</div>
							<br>
						</div>
						<center>
							
							<button type="submit" name="btnguardar"   class="btn btn-lg btn-primary"  title="Clic para Guardar" onclick="fguardar();">Guardar</button>
							
							<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('transaccion_solicitud_cliente')">Cancelar</button>
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
		lof=document.fsolicitud;
		if ((lof.txtoperacion.value!="buscar")&&(lof.txtoperacion.value!="nuevo"))
		{
			if (lof.txthacer.value=="listo")
			{
				if (lof.txtoperacion.value=="incluir")
				{
					alert("registro incluido");
				}
				else if (lof.txtoperacion.value=="modificar")
				{
					alert("registro modificado");
				}
				else if (lof.txtoperacion.value=="eliminar")
				{
					alert("registro eliminado");
				}
			}
			if (lof.txthacer.value!="listo"&&lof.txthacer.value!="")
			{
				alert("no se pudo realizar la operación");
			}
			fcancelar();
		}
		else
		{
			if ((lof.txthay.value==1)&&(lof.txthacer.value!="incluir"))
			{
				fexiste();
			}
			else if ((lof.txthay.value==0)&&(lof.txthacer.value!="incluir"))
			{
				alert("Producto no existe");
				fcancelar();
			}
			else if ((lof.txthay.value==1)&&(lof.txthacer.value=="incluir"))
			{
				fexiste();
			}
			else if ((lof.txthay.value==0)&&(lof.txthacer.value=="incluir"))
			{
				lof.txtoperacion.value="incluir";
				lof.txtidsolicitud.disabled=true;

				lof.agrfila.disabled=false;
				lof.delfila.disabled=false;

				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnguardar.disabled=false;
				lof.btnmodificar.disabled=true;
				lof.btneliminar.disabled=true;
				lof.btncancelar.disabled=false;
			}
		}
	}

	function fexiste()
	{
		lof=document.fsolicitud;
		lof.txtidsolicitud.disabled=true;
		
		//lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=false;
		lof.btneliminar.disabled=false;
		lof.btnAbreproducto.disabled=true;
	}

	function fnuevo()
	{
		lof=document.fsolicitud;
		lof.txtoperacion.value="nuevo";
		lof.txthacer.value="incluir";
		lof.txtidsolicitud.disabled=false;
		lof.submit();
		lof.agrfila.disabled=false;
		lof.delfila.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnguardar.disabled=false;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btncancelar.disabled=false;
	}

	function fcancelar()
	{
		lof=document.fsolicitud;
		lof.txtoperacion.value="incluir";

		lof.agrfila.disabled=false;
		lof.delfila.disabled=false;

		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnguardar.disabled=false;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btncancelar.disabled=false;
	}

	function fbuscar()
	{
		lof=document.fsolicitud;
		lof.txtidsolicitud.disabled=false;
		lof.txtidsolicitud.focus();
		
		//lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		//lof.btnAbreproducto.disabled=false;
	}

	function fmodificar()
	{
		lof=document.fsolicitud;
		lof.txtoperacion.value="modificar";
		lof.txtidsolicitud.disabled=true;

		lof.agrfila.disabled=false;
		lof.delfila.disabled=false;

		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		
	}

	function feliminar()
	{
		lof=document.fsolicitud;
		if (confirm("desea eliminar"))
		{
			lof.txtidcosto.disabled=false;
			lof.txtoperacion.value="eliminar";
			lof.submit();
		}
		else
		{
			fcancelar();
		}
	}

	function fperderfocusidproducto()
	{
		lof=document.fsolicitud;
		if (lof.txtidsolicitud.value!="")
		{
			
			lof.txtoperacion.value="buscar";
			lof.submit();
		}
		else
		{
			lof.txtidcosoto.focus();
		}
	}

	function fguardar()
	{
		lof=document.fsolicitud;
		lof.txtidsolicitud.disabled=false;
	}

	function addRow(tableID) 
	{

		var contador="";
		var datos = <?php echo $datosproducto  ?>;
		var table = document.getElementById(tableID);
		if(document.getElementById('contador'))
		{
			contador = document.getElementById('contador').value;
		} 
		contador++;
		var rowCount = table.rows.length;
		var row = table.insertRow(rowCount);
		var cell1 = row.insertCell(0);
		cell1.align="center";
		var element1 = document.createElement("input");
		element1.type = "checkbox";
		element1.id='opt'+contador;
		cell1.appendChild(element1);
		
		var cell2 = row.insertCell(1);
		var element2 = document.createElement("select");
		element2.setAttribute("name", "descripcion[]");
		element2.id='des'+contador;
		element2.className="form-control";
		element2.setAttribute("onChange", "cargarProducto(this.id)");
		var option;
		option = document.createElement("option");
		option.setAttribute("value", "");
		option.innerHTML = "-Seleccione-";
		element2.appendChild(option);              
		for(i=0; i < datos.length;i++ )
		{
			option = document.createElement("option");
			option.setAttribute("value", datos[i].idproducto);
			option.innerHTML = datos[i].desc_prod;
			element2.appendChild(option);
		}
		cell2.appendChild(element2);

		var cell3 = row.insertCell(2);
		var element3 = document.createElement("input");
		element3.type = "text";
		element3.maxlength="3";
		element3.size="3";
		element3.name="precio[]";
		element3.className="form-control"; 
		element3.id='pvp'+contador;
		element3.value="0.0";
		element3.readOnly = true;
		cell3.appendChild(element3);

		

		var cell4 = row.insertCell(3);
		var element4 = document.createElement("input");
		element4.type = "text";
		element4.size="3";
		element4.className="form-control"; 
		element4.name="peso_pro[]";
		element4.id='mto'+contador;
		element4.disabled=true;
		cell4.appendChild(element4);

		var cell5 = row.insertCell(4);
		var element5 = document.createElement("input");
		element5.type = "text";
		element5.maxlength="3";
		element5.size="3";
		element5.name="cantidad[]";
		element5.className="form-control";
		element5.id='can'+contador; 
		element5.value="0";
		element5.setAttribute("onChange", "recalcular()");
		cell5.appendChild(element5);
		
		var cell6 = row.insertCell(5);
		var element6 = document.createElement("input");
		element6.type="hidden";
		element6.name="codigo[]";
		element6.id="cod"+contador;
		element6.value="0";
		cell6.appendChild(element6);
		document.getElementById('contador').value=contador;
	}

	function deleteRow(tableID) 
	{
		try 
		{
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;
			for(var i=0; i<rowCount; i++) 
			{
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) 
				{
					table.deleteRow(i);
					rowCount--;
					i--;
				}
			}
		}
		catch(e) 
		{
			alert(e);
		}
	}

	function validarCboDescripcion()
	{
		var combos=[];
		var elemento=[];
		var frm = document.getElementById("fsolicitud");
		var j=0;
		for (i=0;i<frm.elements.length;i++)
		{
			if(frm.elements[i].type=='select-one') 
			{
				if(frm.elements[i].name=="descripcion")
				{
					combos[j] = frm.elements[i].value;
					elemento[j] = i;
					j++;
				}
			}
		}
		if(combos.length >1)
		{
			aux = combos[0];
			for (i=1;i<=combos.length;i++)
			{
				if(combos[i] == aux)	
				{
					alert('Valor repetido .......');
					frm.elements[elemento[i]].value=0;
					return false;	
				}
			}
		}
		return true; 
	}

	function cargarProducto(id)
	{
		var cadena = id;
		var pos =0;
		var valor = 0;
		var objact = document.getElementById(id);
		var datos = <?php echo $datosproducto  ?>;
		if(validarCboDescripcion())
		{
			pos=cadena.substring(3);
			valor = objact.value;
			for (i=0;i<datos.length;i++)
			{
				if(datos[i].idproducto == valor)
				{
					document.getElementById('pvp'+pos).value = datos[i].desc_tipo_prod;
					document.getElementById('mto'+pos).value = datos[i].desc_unid_medi;
					break;
				}
			}
			document.getElementById('can'+pos).focus();
		}
		else
		{
			objact.focus();
		}
	}

	function recalcular()
	{
		var precio = 0;
		var cantidad =0;
		var peso_pro = 0;
		var contador = 0;
		var peso_totalr = 0;
		var capacidad = 0;
		if(document.getElementById('contador'))
		{
			contador = document.getElementById('contador').value;
		}
		for (i=1;i<=contador;i++)
		{
			if(document.getElementById('can'+i).value > 0)
			{
				precio = document.getElementById('pvp'+i).value;
				cantidad = document.getElementById('can'+i).value;
				peso_pro = 1 * cantidad;
				peso_totalr = peso_totalr + peso_pro;
			}
		}		
		capacidad=document.getElementById('txtcapacidad').value;
		document.getElementById('totalviatico').value= peso_totalr;
		document.getElementById('txtunidades_req').value= peso_totalr / capacidad;
	}
	function fayuda()
	{
			mipopup = window.open("ayuda/ayudasolicitud.php","miwin","width=550,height=650,scrollbars=yes");
			mipopup.focus();
	}
	function flistar()
	{
			mipopup = window.open("lista/listasolicitud.php","miwin","width=1300,height=650,scrollbars=yes");
			mipopup.focus();
	}
	var miPopup
	function abreempresa(){
		miPopup = window.open("busqueda/catalogoclientesolicitud.php","empresa","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}
	var miPopup
	function abretabulador(){
		miPopup = window.open("busqueda/CatalogoTabuladorTipoUnidad.php","tabulador","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}
</script>
