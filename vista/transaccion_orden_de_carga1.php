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
	session_start();  
	define("SYSPATH", realpath("system") . "/");
	defined("SYSPATH") or die("No direct script access.");
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	if(!$login)
	{
		exit('<script> alert("Acceso Denegado!"); window.location.href="session.php" </script>');
	}
	$control = isset($_GET['control']) ? $_GET['control'] : null ;
	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;
	$liidsolicitud = isset($_GET['liidsolicitud']) ? $_GET['liidsolicitud'] : null;
	$lsidestatus = isset($_GET['lsidestatus']) ? $_GET['lsidestatus'] : null;
	$lsidempresa = isset($_GET['lsidempresa']) ? $_GET['lsidempresa'] : null;
	$lsnombre_razon_social_emp = isset($_GET['lsnombre_razon_social_emp']) ? $_GET['lsnombre_razon_social_emp'] : null;
	$lscedula_cont = isset($_GET['lscedula_cont']) ? $_GET['lscedula_cont'] : null;
	$lsnombre_cont = isset($_GET['lsnombre_cont']) ? $_GET['lsnombre_cont'] : null;
	$lsidproducto = isset($_GET['lsidproducto']) ? $_GET['lsidproducto'] : null;
	$lsnombre_pro = isset($_GET['lsnombre_pro']) ? $_GET['lsnombre_pro'] : null;
	$lsnombre_tippro = isset($_GET['lsnombre_tippro']) ? $_GET['lsnombre_tippro'] : null;
	$lsnombre_tipuni = isset($_GET['lsnombre_tipuni']) ? $_GET['lsnombre_tipuni'] : null;
	$lsnombre_unimed = isset($_GET['lsnombre_unimed']) ? $_GET['lsnombre_unimed'] : null;
	$lspeso_sol = isset($_GET['lspeso_sol']) ? $_GET['lspeso_sol'] : null;
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
	$lshora_sol = isset($_GET['lshora_sol']) ? $_GET['lshora_sol'] : null;
	$lsfecha_sol = isset($_GET['lsfecha_sol']) ? $_GET['lsfecha_sol'] : null;
	$lscedula_res = isset($_GET['lscedula_res']) ? $_GET['lscedula_res'] : null;
	$lsnombre_res = isset($_GET['lsnombre_res']) ? $_GET['lsnombre_res'] : null;
	$lsapellido_res = isset($_GET['lsapellido_res']) ? $_GET['lsapellido_res'] : null;
	$lihay1 = isset($_GET['lihay1']) ? $_GET['lihay1'] : null;
	$lihay2 = isset($_GET['lihay2']) ? $_GET['lihay2'] : null;
	$lihay3 = isset($_GET['lihay3']) ? $_GET['lihay3'] : null;
	
	$idsolicitud = $_GET['idsolicitud'];
	
	require_once("../modelo/class_solicitud.php");
	$sol=new class_solicitud;
	$rs = $sol->datosolicitud_emitida($idsolicitud);
	$ds = $sol->datosolicitud_destino_emitida($idsolicitud);
	$or = $sol->datosolicitud_origen_emitida($idsolicitud);
	$pro = $sol->datosolicitud_producto_emitida($idsolicitud);
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
		<title>ATC Sistema</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="js/bootstrapValidator.css" rel="stylesheet">
		<link href="css/mainSis.css" rel="stylesheet">
		<link type="text/css" href="../libreria/jquery/css/redmond/jquery-ui-1.8.19.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="../libreria/jquery/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="../libreria/jquery/js/jquery-ui-1.8.19.custom.min.js"></script>
		<script type="text/javascript" src="js/select_dependiente_origen_tabulador.js"></script>
		<script src="js/main.js"></script>
		<script src="js/ajax.js"></script>
		<script type='text/javascript' src="js/google.jquery.min.js"></script>
		<script type='text/javascript' src="js/vendor/bootstrap.js"></script>
		<script src="js/validacionScript.js"></script>
		<script src="js/bootstrapValidator.js"></script>
		<script src="js/highcharts.js"></script>
		<script src="js/modules/exporting.js"></script>
		<script src="js/graficos.js"></script>
		<script type='text/javascript' src="js/vendor/jquery.min.js"></script>
		<style type="text/css"> body { padding-top: 50px; } </style>
		<script src="js/validaciones.js"></script>
	</head>    
	<body>

		<div class="container col-md-12">
			<div class="row spa">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading"><strong>Orden de Carga</strong></div>
							<div class="panel-body">
								<form method="post" name="fsolicitud" id="fsolicitud" action="../controlador/control_transaccion_solicitud.php">
									<input type="hidden" name="txtoperacion"    value="asignar_tabulador">
									<input type="hidden" name="txthay"          value="<?php print($lihay);?>">
									<input type="hidden" name="txthay1"         value="<?php print($lihay1);?>">
									<input type="hidden" name="txthay2"         value="<?php print($lihay2);?>">
									<input type="hidden" name="txthay3"         value="<?php print($lihay3);?>">
									<input type="hidden" name="txthacer"        value="<?php print($lshacer);?>">
									<input type="hidden" name="txtcedula_res"   value="<?php print($lscedula_res);?>">
									<input type="hidden" name="txtnombre_res"   value="<?php print($lsnombre_res);?>">
									<input type="hidden" name="txtapellido_res" value="<?php print($lsapellido_res);?>">
									<div class="row">
										<div class="form-group col-lg-3">
												<label >N° de Solicitud:</label>
												<input class="form-control" readonly type="text" name="txtidsolicitud" title="Ingrese Código" maxlength="3" tabindex="1"  value="<?php echo $rs['idsolicitud']; ?>">
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
										<div class="row"><hr><h5><center>Datos del Cliente</h5></center><hr>							
											<div class="form-group col-lg-2">
													<label >RIF del Cliente:</label>
													<input class="form-control" readonly type="text" name="txtidempresa" onkeypress="return soloNumero(event)" title="Ingrese RIF" maxlength="12" tabindex="2"  onblur="fperderfocusidempresa();" value="<?php echo $rs['idcliente']; ?>"> 
											</div>
											<div class="form-group col-lg-3">
													<label >Razon Social del Cliente:</label>
													<input class="form-control" readonly type="text" name="txtnombre_razon_social_emp" maxlength="12" tabindex="2"  value="<?php echo $rs['nombre_cli'].' '.$rs['apellido_cli']; ?>">
											</div>
											<div class="form-group col-lg-3">
													<label >Teléfono:</label>
													<input class="form-control" readonly  type="text" name="txtcedula_cont" maxlength="12"  tabindex="2"  value="<?php echo $rs['telefono_cli']; ?>">
											</div>
											<div class="form-group col-lg-3">
													<label >Correo:</label>
													<input class="form-control" readonly  type="text" name="txtnombre_cont"  tabindex="2"  value="<?php echo $rs['correo_cli']; ?>">
											</div>
										</div>
										<div class="row"><hr><h5><center>Datos del Producto</h5></center><hr>
											<table class="table table-bordered table-striped table-hover">
												<thead style="background: -moz-linear-gradient(top, rgba(216,96,96,0.13) 0%, rgba(216,96,96,0.13) 100%); /* FF3.6+ */ background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(216,96,96,0.13)), color-stop(100%,rgba(216,96,96,0.13))); /* Chrome,Safari4+ */ background: -webkit-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* Chrome10+,Safari5.1+ */ background: -o-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* Opera 11.10+ */ background: -ms-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* IE10+ */
												background: linear-gradient(to bottom, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* W3C */ filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#21d86060', endColorstr='#21d86060',GradientType=0 ); /* IE6-9 */">
													<tr>
														<th style="color:#D86060;">Codigo</th>
														<th style="color:#D86060;">Nombre</th>
														<th style="color:#D86060;">Cantidad</th>
													</tr>
												</thead>
												<thead>
													<?php
														for($i=0; $i<count($pro); $i++)
														{
															echo "
															<tr>
															<td style=\"border-right: solid;color:#D86060;border-left: solid;color:#D86060;\" >".$pro[$i][1]." </td>
															<td style=\"border-right: solid;color:#D86060;\" >".$pro[$i][2]."</td>
															<td style=\"border-right: solid;color:#D86060;\" >".$pro[$i][3]."</td>
															</tr>
															";
														}
													?>
													<input type="hidden" name="indice" value="<? echo $indice; ?>"/>
													<input type="hidden" name="equipo_eliminar" value="<? echo $equipo_eliminar; ?>" />
													<input type="hidden" name="foco" value="<? echo $foco; ?>" />
													<input type="hidden" name="hacer" value="<? echo $hacer ?>"/>
												</thead>
											</table>
										</div>
											<div class="row"><hr><h5><center>Datos del Origen</h5></center><hr>
											<div class="form-group col-lg-2">
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
											<div class="form-group col-lg-3">
												<label >Parroquia Origen:</label>
												<input class="form-control" readonly name="cmbidparroquia_origen_tabulador" id="cmbidparroquia_origen_tabulador" value="<?php echo $or['nombre_parroquia_origen']; ?>">
											</div>
											<div class="form-group col-lg-3">
												<label >Ciudad Origen:</label>
												<input class="form-control" readonly  name="cmbidciudad_origen_tabulador" id="cmbidciudad_origen_tabulador" value="<?php echo $or['nombre_ciudad_origen']; ?>">
											</div>
											
											<div class="form-group col-lg-2">
											<label >Fecha de Origen:</label>
											<input class="form-control" readonly type="text" name="txtfecha_salida"     tabindex="2"  value="<?php echo $rs['fecha_salida_sol']; ?>"> 
										</div>
										<div class="form-group col-lg-10">
											<label >Direccion de Origen:</label>
											<input class="form-control" readonly type="text" name="txtdireccion_salida" title="Ingrese Dirección de Origen" maxlength="250" tabindex="2"  value="<?php echo $rs['direccion_salida_sol']; ?>">
										</div>
										</div>
											<div class="row"><hr><h5><center>Datos del Destino</h5></center><hr>
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
												<input class="form-control"  readonly type="text" name="txtfecha_entrega" tabindex="2"  value="<?php echo $rs['fecha_entrega_sol']; ?>">
										</div>
										<div class="form-group col-lg-10">
											<label >Direccion de Destino:</label>
											<input class="form-control" readonly  type="text" name="txtdireccion_entrega"  maxlength="250" title="Ingrese Dirección de Destino" tabindex="2"  value="<?php echo $rs['direccion_entrega_sol']; ?>">
										</div>
										
										</div>
										<div class="row"><hr>
										<div class="form-group col-lg-12">
												<label >Observaciones:</label>
												<input readonly class="form-control" name="txtobservaciones_sol"  value="<?php echo $rs['observaciones_sol']; ?>"   >
										</div>
									</div>
											<div class="row"><hr><h5><center>Datos del Tabulador</h5></center><hr>
										<div class="form-group col-lg-2">
										<label >codigo del tabulador:</label>
										<input class="form-control" readonly type="text" name="txtidtabulador" onkeypress="return soloNumero(event)" title="ingrese Código del Tabulador" maxlength="5" tabindex="2"  value="<?php echo $rs['idtabulador']; ?>">
										</div>
										<div class="form-group col-lg-3">
												<label >Precio del Tabulador:</label>
												<input class="form-control" readonly  type="text" name="txtprecio_tabulador" maxlength="12" tabindex="2"   value="<?php echo $rs['precio_total_tab']; ?>">
										</div>
										<div class="form-group col-lg-2">
												<label >Unidad Requeridas:</label>
												<input class="form-control"  readonly type="text" name="txtunidades_req" onkeypress="return soloNumero(event)" maxlength="12" tabindex="2"  value="<?php echo $rs['unidades_req_sol']; ?>">
										</div>
										<div class="form-group col-lg-3">
												<label >Total de la Solicitud:</label>
												<input class="form-control" readonly type="text" name="txtprecio_sol" maxlength="12"  tabindex="2"   value="<?php echo $rs['precio_total_sol']; ?>"> 
										</div>
										</div>
										
										<div class="row"><hr><h5><center>Datos de la Orden</h5></center><hr>
										
							<div class="form-group col-lg-3">
								<label >Cedula:</label>
									<input class="form-control" type="text" name="txtcedula"  title="Ingrese Código" maxlength="20" tabindex="1"  value="<?php print(@$lscedula);?>" onblur="fperderfocuscedula();">
							</div>
							
							<div class="form-group col-lg-5">
								<label >Nombre:</label>
									<input class="form-control" readonly type="text" name="txtnombres_per"  title="Ingrese Código" maxlength="20" tabindex="1"  value="<?php print(@$lsnombres_per);?>">
							</div>
							
							<div class="form-group col-lg-3">
								<label >Telefono:</label>
									<input class="form-control" readonly type="text" name="txttelefono_corp_per"  title="Ingrese Código" maxlength="3" tabindex="1"  value="<?php print(@$lstelefono_corp_per);?>">
							</div>
							<div class="form-group col-lg-1">
									<INPUT class="btn btn-primary" type="button" value="..."  title="Buscar Relacion de Unidades" name="btnAbrereluni" onclick="abrereluni()">
							</div>
							<div class="form-group col-lg-2">
								<label >Nro de Unidad:</label>
									<input class="form-control" readonly type="text" name="txtidunidad" title="Ingrese Código" maxlength="3" tabindex="1"  value="<?php print(@$lsidunidad);?>">
							</div>
							
							<div class="form-group col-lg-2">
								<label >Placa de la Unidad:</label>
									<input class="form-control" readonly type="text" name="txtplaca_uni"  title="Ingrese Código" maxlength="3" tabindex="1"  value="<?php print(@$lsplaca_uni);?>"> 
							</div>
							
							<div class="form-group col-lg-3">
								<label >Nro de Remolque:</label>
									<input class="form-control" readonly type="text" name="txtidremolque"  title="Ingrese Código" maxlength="3" tabindex="1"  value="<?php print(@$lsidremolque);?>">
							</div>
							<div class="form-group col-lg-2">
								<label >Placa del Remolque:</label>
									<input class="form-control" readonly type="text" name="txtplaca_rem"  title="Ingrese Código" maxlength="3" tabindex="1"  value="<?php print(@$lsplaca_rem);?>">
							</div>
							</div>
									<div class="form-group col-lg-5">
									</div>
									<center>
										<div class="form-group col-lg-1"><input type="submit" name="btnguardar" value="Guardar           " class="btn btn-primary" tabindex="20" onclick="fguardar();"></div>
										<div class="form-group col-lg-1"><input type="reset" name="btncancelar" value="Cancelar            " class="btn btn-primary" tabindex="21" onclick="cancelar('transaccion_solicitud')"></div>
									</center> 
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

