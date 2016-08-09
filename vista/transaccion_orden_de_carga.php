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
	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;
	$liidorden_carga = isset($_GET['liidorden_carga']) ? $_GET['liidorden_carga'] : null;
	$lsidestatus_ordcar = isset($_GET['lsidestatus_ordcar']) ? $_GET['lsidestatus_ordcar'] : null;
	$lsidempresa = isset($_GET['lsidempresa']) ? $_GET['lsidempresa'] : null;
	$lsnombre_razon_social_emp = isset($_GET['lsnombre_razon_social_emp']) ? $_GET['lsnombre_razon_social_emp'] : null;
	$lsidremolque = isset($_GET['lsidremolque']) ? $_GET['lsidremolque'] : null;
	$lsplaca_rem = isset($_GET['lsplaca_rem']) ? $_GET['lsplaca_rem'] : null;
	$lsidsolicitud = isset($_GET['lsidsolicitud']) ? $_GET['lsidsolicitud'] : null;
	$lsnombre_pro = isset($_GET['lsnombre_pro']) ? $_GET['lsnombre_pro'] : null;
	$lstelefono_emp = isset($_GET['lstelefono_emp']) ? $_GET['lstelefono_emp'] : null;
	$lsplaca_uni = isset($_GET['lsplaca_uni']) ? $_GET['lsplaca_uni'] : null;
	$lsnombre_unimed = isset($_GET['lsnombre_unimed']) ? $_GET['lsnombre_unimed'] : null;
	$lspeso_sol = isset($_GET['lspeso_sol']) ? $_GET['lspeso_sol'] : null;
	$lscedula = isset($_GET['lscedula']) ? $_GET['lscedula'] : null;
	$lsidrelacion_unidad = isset($_GET['lsidrelacion_unidad']) ? $_GET['lsidrelacion_unidad'] : null;
	$lsnombre_per = isset($_GET['lsnombre_per']) ? $_GET['lsnombre_per'] : null;
	$lsapellido_per = isset($_GET['lsapellido_per']) ? $_GET['lsapellido_per'] : null;
	$lstelefono_corp_per = isset($_GET['lstelefono_corp_per']) ? $_GET['lstelefono_corp_per'] : null;
	$lsidunidad = isset($_GET['lsidunidad']) ? $_GET['lsidunidad'] : null;
	$lsdireccion_salida = isset($_GET['lsdireccion_salida']) ? $_GET['lsdireccion_salida'] : null;
	$lsdireccion_entrega = isset($_GET['lsdireccion_entrega']) ? $_GET['lsdireccion_entrega'] : null;
	$lsfecha_salida = isset($_GET['lsfecha_salida']) ? $_GET['lsfecha_salida'] : null;
	$lsfecha_entrega = isset($_GET['lsfecha_entrega']) ? $_GET['lsfecha_entrega'] : null;
	$lshora_ord = isset($_GET['lshora_ord']) ? $_GET['lshora_ord'] : null;
	$lsfecha_ord = isset($_GET['lsfecha_ord']) ? $_GET['lsfecha_ord'] : null;
	$lihay1 = isset($_GET['lihay1']) ? $_GET['lihay1'] : null;
	$lihay2 = isset($_GET['lihay2']) ? $_GET['lihay2'] : null;
	
	$idsolicitud = $_GET['idsolicitud'];
	
	require_once("../modelo/class_solicitud.php");
	$sol=new class_solicitud;

	$rs = $sol->datosolicitud_emitida($idsolicitud);
	$ds = $sol->datosolicitud_destino_emitida($idsolicitud);
	$or = $sol->datosolicitud_origen_emitida($idsolicitud);
	$pro = $sol->datosolicitud_producto_emitida($idsolicitud);
	require_once("../modelo/class_ordcar.php");
	$ordcar=new class_ordcar;
	$liidorden_carga = $ordcar->fContar();
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
						<div class="panel-heading"><div class="panel-title"><strong>Orden de Carga</strong></div></div>
							<div class="panel-body">
                        <form method="post" name="fordcar" id="fordcar" action="../controlador/control_transaccion_ordcar.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthay1" value="<?php print($lihay1);?>">
						<input type="hidden" name="txthay2" value="<?php print($lihay2);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<input type="hidden" name="txthora_ord"  value="<?php print($lshora_ord);?>">
						<input type="hidden" name="txtidestatus_ordcar"   value="<?php print($lsidestatus_ordcar);?>" >
						<div class="row">
							<div class="form-group col-lg-3">
									<label>Numero de la Orde de Carga</label>
									<input class="form-control" type="text" readonly name="txtidorden_carga"   value="<?php print($liidorden_carga);?>" onblur="fperderfocusidorden_carga();">
							</div>
							<div class="form-group col-lg-3">
							</div>
							<div class="form-group col-lg-3">
							</div>
							<div class="form-group col-lg-3">
									<label>Fecha</label>
									<input class="form-control" readonly type="text" name="txtfecha_ord"  value="<?php print($lsfecha_ord);?>">
							</div>
						</div>
						<div class="row"><hr><h5><center>Datos de la Solicitud</h5></center><hr>
							<div class="form-group col-lg-3">
									<label >N° de Solicitud:</label>
									<input class="form-control" readonly type="text" name="txtidsolicitud"   value="<?php echo $rs['idsolicitud']; ?>">
							</div>
							<div class="form-group col-lg-3">
									<label >Fecha:</label>
									<input class="form-control" readonly type="text" name="txtfecha_sol"   value="<?php echo $rs['fecha_sol']; ?>">
							</div>
							<div class="form-group col-lg-3">
									<label >Hora:</label>
									<input class="form-control" readonly  type="text" name="txthora_sol" value="<?php echo $rs['hora_sol']; ?>">
							</div>
							<div class="form-group col-lg-3">
									<label >Estatus:</label>
									<input class="form-control" readonly type="text" name="txtidestatus"  value="<?php echo $rs['estatus_sol']; ?>">
							</div>
						</div>
						<div class="row"><hr><h5><center>Datos del Cliente</h5></center><hr>
							<div class="form-group col-lg-3">
									<label>RIF</label>
									<input class="form-control" readonly type="text" name="txtidempresa"  value="<?php echo $rs['idcliente']; ?>">
							</div>
							<div class="form-group col-lg-3">
									<label>Nombre o Razon Social</label>
									<input class="form-control" readonly type="text" name="txtnombre_razon_social_emp"   value="<?php echo $rs['nombre_cli'].' '.$rs['apellido_cli']; ?>" >
							</div>
							<div class="form-group col-lg-3">
									<label>Telefono</label>
									<input class="form-control" readonly type="text" name="txttelefono_emp"  value="<?php echo $rs['telefono_cli']; ?>">
							</div>
							<div class="form-group col-lg-3">
									<label >Correo:</label>
									<input class="form-control" readonly  type="text" name="txtnombre_cont" value="<?php echo $rs['correo_cli']; ?>">
							</div>
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
									<div class="row"><hr><h5><center>Datos del Producto</h5></center><hr>
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th style="color:#D86060;">Codigo</th>
										<th style="color:#D86060;">Nombre</th>
										<th style="color:#D86060;">Cantidad</th>
									</tr>
								</thead>
								<tbody>
									<?php
										for($i=0; $i<count($pro); $i++)
										{
											echo "
											<tr>
											<td >".$pro[$i][1]." </td>
											<td>".$pro[$i][2]."</td>
											<td>".$pro[$i][3]."</td>
											</tr>
											";
										}
									?>
									<input type="hidden" name="indice" value="<? echo $indice; ?>"/>
									<input type="hidden" name="equipo_eliminar" value="<? echo $equipo_eliminar; ?>" />
									<input type="hidden" name="foco" value="<? echo $foco; ?>" />
									<input type="hidden" name="hacer" value="<? echo $hacer ?>"/>
								</body>
							</table>
						</div>
						
						<div class="row"><hr><h5><center>Datos del Conductor</h5></center><hr>
							<div class="form-group col-lg-3">
									<label>Cedula</label>
									<input class="form-control" readonly type="text" name="txtcedula"  value="<?php print($lscedula);?>" onblur="fperderfocuscedula();">
							</div>
							<div class="form-group col-lg-3">
									<label>Nombre</label>
									<input class="form-control" readonly type="text" name="txtnombre_per"   value="<?php print($lsnombre_per);?>">
							</div>
							<div class="form-group col-lg-3">
									<label>Apellido</label>
									<input class="form-control" readonly type="text" name="txtapellido_per"   value="<?php print($lsapellido_per);?>">
							</div>
							<div class="form-group col-lg-2">
									<label>Telefono</label>
									<input class="form-control" readonly type="text" name="txttelefono_corp_per" value="<?php print($lstelefono_corp_per);?>">
							</div>
							<div class="form-group col-lg-1">
									<label>Catalogo</label>
									<button class="btn btn-primary" type="button" value="..."   name="btnAbreReluniOrdccar" onclick="abreReluniOrdcar()"><i class="glyphicon glyphicon-search"></i></button>
							</div>
							<div class="form-group col-lg-3">
									<label>Codigo Unidad</label>
									<input class="form-control" readonly type="text" name="txtidunidad" value="<?php print($lsidunidad);?>">
							</div>
							<div class="form-group col-lg-3">
									<label>Placa Unidad</label>
									<input class="form-control" readonly type="text" name="txtplaca_uni" value="<?php print($lsplaca_uni);?>"> 
							</div>
							<div class="form-group col-lg-3">
									<label>Codigo Remolque</label>
									<input class="form-control" readonly type="text" name="txtidremolque" value="<?php print($lsidremolque);?>">
							</div>
							<div class="form-group col-lg-3">
									<label>Placa Remolque</label>
									<input class="form-control" readonly type="text" name="txtplaca_rem" value="<?php print($lsplaca_rem);?>">
							</div>
						</div>
						<div class="form-group col-lg-5">
						</div>
						<center>
							<div class="form-group col-lg-1"><input type="button" name="btnguardar" value="Guardar" class="btn btn-primary" tabindex="20" onclick="fguardar();"></div>
							<div class="form-group col-lg-1"><input type="button" name="btncancelar" value="Cancelar" class="btn btn-primary" tabindex="21" onclick="fcancelar();"></div>
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
<script language="javascript">
	finicio();
	function finicio()
	{
		lof=document.fordcar;
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
		else if (lof.txtoperacion.value=="buscar")
		{
			if ((lof.txthay.value==1)&&(lof.txthacer.value!="incluir"))
			{
				fexiste();
			}
			else if ((lof.txthay.value==0)&&(lof.txthacer.value!="incluir"))
			{
				alert("no existe este ordcar");
				fcancelar();

			}
		}
	}
	function fcancelar()
	{
		lof=document.fordcar;
		lof.txtoperacion.value="IncluirOrden";
		lof.txtidestatus_ordcar.value="Emitida";
		lof.txthora_ord.value="<? print date("y/m/d h:i:s"); ?>";
		lof.txtfecha_ord.value="<? print date("d/m/Y"); ?>";
	}
	function fguardar()
	{
		lof=document.fordcar;
		if (fvalidar())
		{
			lof.submit();
		}
	}
	function fvalidar()
	{
		lbbueno=false;
		lof=document.fordcar;
		if (lof.txtidorden_carga.value=="")
		{
			alert("Código orden de carga en blanco");
			lof.txtidorden_carga.focus();
		}
		else if (lof.txtidestatus_ordcar.value=="-")
		{
			alert("Estatus orden de carga en blanco");
			lof.txtidestatus_ordcar.focus();
		}
		else if (lof.txtidsolicitud.value=="")
		{
			alert("Código de la Solicitud en blanco");
			lof.txtidsolicitud.focus ();
		}
		else if (lof.txtcedula.value=="")
		{
			alert("Cédula del Conductor en blanco");
			lof.txtcedula.focus ();
		}
		else
		{
			lbbueno=true;
		}

		return lbbueno;
	}
</script>
<script type="text/javascript">
	fInicio();
	var miPopup
	function abreReluniOrdcar()
	{
		miPopup = window.open("busqueda/CatalogoReluniOrdcar.php","relacion de Unidad","width=1100px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}
</script>
