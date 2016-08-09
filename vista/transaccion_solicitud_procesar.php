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
	include_once ("../modelo/class_producto.php");
	include_once ("../modelo/class_solicitud.php");
	defined("SYSPATH") or die("No direct script access.");
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	if(!$login)
	{
		exit('<script> alert("Acceso Denegado!"); window.location.href="session.php" </script>');
	}
	require_once("../modelo/clscombo.php");
	$lobjcombo= new clscombo();
	

	$lsidsolicitud = isset($_GET['lsidsolicitud']) ? $_GET['lsidsolicitud'] : null;
	//~ tabulador
	$lsidtabulador = isset($_GET['lsidtabulador']) ? $_GET['lsidtabulador'] : null;
	$lsprecio_tabulador = isset($_GET['lsprecio_tabulador']) ? $_GET['lsprecio_tabulador'] : null;
	$lsprecio_sol = isset($_GET['lsprecio_sol']) ? $_GET['lsprecio_sol'] : null;
	//~ fin tabulador	

	$class_producto = new class_producto();
	$datosproducto=$class_producto->listarCombo();
	$contador = 0;
	
	$solicitud= new class_solicitud();
	$solicitud->buscarDetalle($lsidsolicitud);
	$detalle =$solicitud->get_detalle();
	$contador = count($detalle);
	$peso_total=0;
	
	
	
	require_once("../modelo/class_solicitud.php");
	$sol=new class_solicitud;
	$rs = $sol->datosolicitud($lsidsolicitud);
	$ds = $sol->datosolicitud_destino($lsidsolicitud);
	$or = $sol->datosolicitud_origen($lsidsolicitud);
	$pro = $sol->datosolicitud_producto($lsidsolicitud);
	
	

?>

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Solicitud de Transporte</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
			</div>
			<div class="panel-body">
					<form method="post" name="fsolicitud_procesar" id="fsolicitud_procesar" action="../controlador/control_transaccion_solicitud.php" >
						<input type="hidden" name="txtoperacion" value="asignar_tabulador">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
							<div class="form-group col-lg-3">
								<label >N° de Solicitud:</label>
								<input class="form-control"  readonly type="text" name="txtidsolicitud"  value="<?php echo $lsidsolicitud; ?>" />
							</div>
							<div class="form-group col-lg-3">
									<label >Fecha:</label>
									<input class="form-control" readonly type="text" name="txtfecha_sol"   maxlength="12" tabindex="2"  value="<?php echo $rs['fecha_sol']; ?>">
							</div>
							<div class="form-group col-lg-3">
									<label >Hora:</label>
									<input class="form-control" readonly  type="text" name="txthora_sol" maxlength="12" tabindex="2"  value="<?php echo $rs['hora_sol']; ?>">
							</div>
							<div class="form-group col-lg-3">
									<label >Estatus:</label>
									<input class="form-control" readonly type="text" name="txtidestatus" maxlength="12" tabindex="2"  value="<?php echo $rs['estatus_sol']; ?>">
							</div>
						</div>
						<div class="row"><h5><center>Datos del Cliente</h5></center><hr>
							<div class="form-group col-lg-3">
									<label >RIF</label>
									<input class="form-control"  type="text" name="txtidcliente" readonly onkeypress="return soloNumero(event)" title="Ingrese RIF" maxlength="12" tabindex="2"   value="<?php echo $rs['idcliente']; ?>"> 
							</div>
							<div class="form-group col-lg-3">
									<label >Razón Social</label>
									<input class="form-control" readonly type="text" name="txtnombre_cli" maxlength="30" tabindex="2"  value="<?php echo $rs['nombre_cli'].' '.$rs['apellido_cli']; ?>">
							</div>
							<div class="form-group col-lg-3">
									<label >Teléfono</label>
									<input class="form-control" readonly  type="text" name="txttelefono_cli" maxlength="12"  tabindex="2"  value="<?php echo $rs['telefono_cli']; ?>">
							</div>
							<div class="form-group col-lg-3">
									<label >Correo Electronico</label>
									<input class="form-control" readonly  type="text" name="txtcorreo_cli"  tabindex="2"  value="<?php echo $rs['correo_cli']; ?>">
							</div>
						</div>   
						<div class="row"><h5><center>Tabulador de Precio por Kilometro</h5></center><hr>
							<div class="form-group col-lg-3">
								<label >Pais Origen:</label>
								<input class="form-control" readonly name="cmbidpais_origen_tabulador" id="cmbidpais_origen_tabulador" value="<?php echo $or['nombre_pais_origen']; ?>">
							</div>
							<div class="form-group col-lg-2">
								<label >Estado Origen:</label>
								<input class="form-control" readonly name="cmbidestado_origen_tabulador" id="cmbidestado_origen_tabulador" value="<?php echo $or['nombre_estado_origen']; ?>">
							</div>
							<div class="form-group col-lg-2">
								<label >Municipio Origen:</label>
								<input class="form-control" readonly  name="cmbidmunicipio_origen_tabulador" id="cmbidmunicipio_origen_tabulador" value="<?php echo $or['nombre_municipio_origen']; ?>">
							</div>
							<div class="form-group col-lg-2">
								<label >Parroquia Origen:</label>
								<input class="form-control" readonly name="cmbidparroquia_origen_tabulador" id="cmbidparroquia_origen_tabulador" value="<?php echo $or['nombre_parroquia_origen']; ?>">
							</div>
							<div class="form-group col-lg-3">
								<label >Ciudad Origen:</label>
								<input class="form-control" readonly  name="cmbidciudad_origen_tabulador" id="cmbidciudad_origen_tabulador" value="<?php echo $or['nombre_ciudad_origen']; ?>">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-2">
								<label >Fecha de Origen:</label>
								<input class="form-control"  type="text" readonly name="txtfecha_salida"  id="datepicker"   tabindex="2"  value="<?php echo $rs['fecha_salida_sol']; ?>"> 
							</div>
							<div class="form-group col-lg-10">
								<label >Direccion de Origen:</label>
								<input class="form-control"  type="text" readonly name="txtdireccion_salida" title="Ingrese Dirección de Origen" maxlength="250" tabindex="2"  value="<?php echo $rs['direccion_salida_sol']; ?>">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-2">
								<label >Pais Destino:</label>
								<input class="form-control" readonly name="cmbidpais_destino_tabulador" id="cmbidpais_destino_tabulador" value="<?php echo $ds['nombre_pais_destino']; ?>">
							</div>
							<div class="form-group col-lg-2">
								<label >Estado Destino:</label>
								<input class="form-control" readonly name="cmbidestado_destino_tabulador" id="cmbidestado_destino_tabulador" value="<?php echo $ds['nombre_estado_destino']; ?>">
							</div>
							<div class="form-group col-lg-2">
								<label >Municipio Destino:</label>
								<input class="form-control" readonly  name="cmbidmunicipio_destino_tabulador" id="cmbidmunicipio_destino_tabulador" value="<?php echo $ds['nombre_municipio_destino']; ?>">
							</div>
							<div class="form-group col-lg-3">
								<label >Parroquia Destino:</label>
								<input class="form-control" readonly name="cmbidparroquia_destino_tabulador" id="cmbidparroquia_destino_tabulador" value="<?php echo $ds['nombre_parroquia_destino']; ?>">
							</div>
							<div class="form-group col-lg-3">
								<label >Ciudad Destino:</label>
								<input class="form-control" readonly  name="cmbidciudad_destino_tabulador" id="cmbidciudad_destino_tabulador" value="<?php echo $ds['nombre_ciudad_destino']; ?>">
							</div>
							<div class="form-group col-lg-2">
								<label >Fecha de Destino:</label>
								<input class="form-control"  type="text" id="datepicker1" readonly name="txtfecha_entrega" tabindex="2"  value="<?php echo $rs['fecha_entrega_sol']; ?>">
							</div>
							<div class="form-group col-lg-10">
								<label >Direccion de Destino:</label>
								<input class="form-control"  type="text" readonly name="txtdireccion_entrega"  maxlength="250" title="Ingrese Dirección de Destino" tabindex="2"  value="<?php echo $rs['direccion_entrega_sol']; ?>">
							</div>
						</div>
						<div class="row">
							<input type="hidden" name="txtidtipo_unidad" id="txtidtipo_unidad"   value="<?php echo $or['idtipo_unidad_sol']; ?>">
							<div class="form-group col-lg-4">
								<label >Tipo unidad:</label>
								<input class="form-control"  type="text" name="txtdesc_tipo_unid" readonly value="<?php echo $or['desc_tipo_unid']; ?>">
							</div>
							<div class="form-group col-lg-4">
								<label >Capacidad:</label>
								<input class="form-control"  type="text" name="txtcapacidad" id="txtcapacidad" readonly onkeypress="return soloNumero(event)" title="ingrese Código del Tabulador" maxlength="5" tabindex="2"   value="<?php echo $or['capacidad']; ?>">
							</div>
							<div class="form-group col-lg-4">
								<label >Medida:</label>
								<input class="form-control"  type="text" name="txtdesc_unid_medi" readonly  title="ingrese Código del Tabulador" maxlength="5" tabindex="2"   value="<?php echo $or['desc_unid_medi']; ?>">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-12">
									<label >Observaciones:</label>
									<input rows="1" class="form-control" readonly name="txtobservaciones_sol"  value="<?php echo $rs['observaciones_sol']; ?>"   >
							</div>
						</div>
						<div class="row">
							<h5><center>Producto</h5></center><hr>
							<div class="form-group col-lg-2"></div>
								<table class="table table-striped" id="table_solicitud">
									<tr>
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
										<td>
											<select  class="form-control"  readonly name="descripcion[]" id="des<?php echo $i  ?>" onChange="cargarProducto(this.id)">
												<option value="" value="" >Seleccione</option>
												<?php
													$lssql="select * from producto ";
													$lobjcombo->fgenerar($lssql,"idproducto","desc_prod",$val['iddet_cencos']);
												?>
											</select>
										</td>
										<td><input class="form-control" name="precio[]" id="pvp<?php echo $i  ?>" value="<?php if(isset($val['desc_tipo_prod']))echo $val['desc_tipo_prod']  ?>" size="3" readOnly="true" /></td>
										<td><input class="form-control" readonly name="peso_pro[]" id="mto<?php echo $i  ?>" value="<?php if(isset($val['unidad_medida']))echo $val['unidad_medida']  ?>" size="3"  /></td>
										<td><input class="form-control" readonly name="cantidad[]" id="can<?php echo $i  ?>" value="<?php if(isset($val['peso_pro']))echo $val['peso_pro']  ?>" size="3" onChange="recalcular()"  /></td>
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
								<input class="form-control"  type="text" name="txtunidades_req" id="txtunidades_req"  readonly   value="<?php echo $or['unidades_req_sol']; ?>">
							</div>
							<br>
						</div>
									<div class="row"><hr><h5><center>Datos del Tabulador</h5></center><hr>
										<div class="form-group col-lg-2">
											<label >codigo del tabulador:</label>
											<input class="form-control"  readonly type="text" name="txtidtabulador" onkeypress="return soloNumero(event)" title="ingrese Código del Tabulador" maxlength="5" tabindex="2"  onblur="fperderfocusidtabulador();" value="<?php print($lsidtabulador);?>">
										</div>
										<div class="form-group col-lg-1">
											<label >Catologo</label>
											<button class="btn btn-primary" type="button" title="buscar precio" value="..."  class="botontab" name="btnAbretabulador"   onclick="abretabulador()"><i class="glyphicon glyphicon-folder-open"></i></button>
										</div>
										<div class="form-group col-lg-3">
											<label >Precio:</label>
											<input class="form-control" readonly  type="text" name="txtprecio_tabulador" maxlength="12" tabindex="2"   value="<?php print($lsprecio_tabulador);?>">
										</div>
										<div class="form-group col-lg-1">
											<label >Procesar</label>
											<button class="btn btn-primary" name="Suma" onClick="multiplica()" type="button" value=""> &nbsp; = &nbsp;</button>
										</div>
										<div class="form-group col-lg-5">
											<label >total:</label>
											<input class="form-control" readonly type="text" name="txtprecio_sol" maxlength="12"  tabindex="2"   value="<?php print($lsprecio_sol);?>"> 
										</div>
									</div>
									<div class="row">
										<div class="form-group col-lg-6">
											<label >Ciudad Origen:</label>
											<input class="form-control" readonly  name="cmbidciudad_origen_tabulador_procesar" id="cmbidciudad_origen_tabulador_procesar" >
										</div>
										<div class="form-group col-lg-6">
											<label >Ciudad Destino:</label>
											<input class="form-control" readonly  name="cmbidciudad_destino_tabulador_procesar" id="cmbidciudad_destino_tabulador_procesar" >
										</div>
									</div>
						<center>
							<button type="submit" name="btnguardar"   class="btn btn-lg btn-primary"  title="Clic para Guardar" onclick="fguardar();">Procesar</button>
							<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('solicitud_en_espera')">Cancelar</button>
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
	function fguardar()
	{
		lof=document.fsolicitud_procesar;
		if (fvalidar())
		{
			lof.submit();
		}
	}
	var miPopup
	function abretabulador()
	{
		miPopup = window.open("busqueda/CatalogoTabuladorProcesar.php","tabulador","width=1100px,height=350px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}
	function multiplica()
	{
		var a = document.fsolicitud_procesar.txtprecio_tabulador.value //en el DOM esto referencia el valor del primer cuadro
		var b = document.fsolicitud_procesar.txtunidades_req.value //esto referencia el valor del segundo cuadro
		document.fsolicitud_procesar.txtprecio_sol.value=parseFloat(a)*parseFloat(b) //convertimos a números
		//los valores de los cuadros de texto se interpretan siempre como cadenas de caracteres
	}
</script>
