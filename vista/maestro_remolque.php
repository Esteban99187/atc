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
	require_once("../modelo/clscombo.php");
	$lobjcombo= new clscombo();
	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;
	$liidremolque = isset($_GET['liidremolque']) ? $_GET['liidremolque'] : null;
	$lsserial_carroceria_rem = isset($_GET['lsserial_carroceria_rem']) ? $_GET['lsserial_carroceria_rem'] : null;
	$lsobservaciones_rem = isset($_GET['lsobservaciones_rem']) ? $_GET['lsobservaciones_rem'] : null;
	$lsactivado_rem = isset($_GET['lsactivado_rem']) ? $_GET['lsactivado_rem'] : null;
	$lsidmarca_remolque = isset($_GET['lsidmarca_remolque']) ? $_GET['lsidmarca_remolque'] : null;
	$lsidmodelo_remolque = isset($_GET['lsidmodelo_remolque']) ? $_GET['lsidmodelo_remolque'] : null;
	$lsidtipo_remolque = isset($_GET['lsidtipo_remolque']) ? $_GET['lsidtipo_remolque'] : null;
?>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Remolque</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abreremolque()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
				<div class="panel-body">
					<form method="post" name="fremolque" id="fremolque" action="../controlador/control_maestro_remolque.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
							<div class="form-group col-lg-3">
								<div class="form-group has-error ">
									<label >Placa de Remolque:</label>
									<input class="form-control"  type="text" name="txtidremolque" title="Ingrese Placa del remolque"  maxlength="7" value="<?php print($liidremolque);?>" onblur="fperderfocusidremolque();">
								</div>
							</div>
							<div class="form-group col-lg-5">
								<div class="form-group has-error ">
									<label >Serial carroceria:</label>
									<input class="form-control"  type="text" name="txtserial_carroceria_rem"  title="Ingrese serial del carroceria" onBlur="cambio_mayus(this)" maxlength="20" value="<?php print($lsserial_carroceria_rem);?>"> 
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-4">
								<div class="form-group has-error ">
									<label>Tipo de Remolque</label>
									<select  class="form-control"  name="cmbidtipo_remolque" id="cmbidtipo_remolque" >
										<option value="" value="<?php print($lsidtipo_remolque);?>" >SELECCIONE</option>
										<?php
											$lssql="select idtipo_unidad,concat(' ',desc_tipo_unid) as nombre from tipo_unidad order by nombre";
											$lobjcombo->fgenerar($lssql,"idtipo_unidad","nombre","");
										?>
									</select> 
								</div>
							</div>
							<div class="form-group col-lg-4">
								<div class="form-group has-error ">
									<label>Marca</label>
									<select id="cmbidmarca_remolque" name="cmbidmarca_remolque" class="form-control">
										 <option value="" value="<?php print($lsidmarca_remolque);?>" >SELECCIONE</option>;
											<?php
												include '../modelo/conexion.php';
												fconectar();
												$consulta = "select * from marca_unidad";
												$resultado = mysql_query($consulta);
												if($fila=mysql_fetch_array($resultado))
												{
													do
													{
														echo '<option value="'.$fila['idmarca_unidad'].'">'.$fila['desc_marc'].'</option>';
													}
													while($fila = mysql_fetch_array($resultado));
												}
												desconectar();
											?>
									</select>
								</div>
							</div>
							<div class="form-group col-lg-4">
								<div class="form-group has-error ">
									<label>Modelo</label>
									<select  class="form-control"  name="cmbidmodelo_remolque" id="cmbidmodelo_remolque">
										<option value="" value="<?php print($lsidmodelo_remolque);?>" >SELECCIONE</option>
										<?php
											$lssql="select idmodelo_unidad,concat(' ',desc_mode) as nombre from modelo_unidad order by nombre";
											$lobjcombo->fgenerar($lssql,"idmodelo_unidad","nombre","");
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-12">
								<div class="form-group has-error ">
									<label >Observaciones:</label>
									<input class="form-control"  type="text" name="txtobservaciones_rem" title="Ingrese observaciones_rem" onBlur="cambio_mayus(this)" maxlength="350" value="<?php print($lsobservaciones_rem);?>"> 
								</div>
							</div>
						</div>
						<center>
							<input type="button" name="btnnuevo" value="Nuevo  "class="btn btn-lg btn-primary" onclick="fnuevo();">
							<input type="button" name="btnbuscar" value="Buscar    " class="btn btn-lg btn-primary" onclick="fbuscar();">
							<input type="submit" name="btnguardar" value="Guardar  " class="btn btn-lg btn-primary" onclick="fguardar();">
							<input type="button" name="btnmodificar" value="Modificar " class="btn btn-lg btn-primary" onclick="fmodificar();" >
							<?php
								if ($lsactivado_rem==1 || $lsactivado_rem==NULL)
								{
									echo '<button type="button" name="btndesactivar" class="btn btn-lg btn-primary" title="Clic para Desactivar" onclick="fdesactivar();" >Desactivar</button>';
								}
								else if ($lsactivado_rem==0)
								{
									echo '<button type="button" name="btndesactivar" class="btn btn-lg btn-primary" title="Clic para Activar"  onclick="factivar();" >Activar</button>';
								}
							?>
							<input type="reset"  name="btncancelar" value="Cancelar " class="btn btn-lg btn-primary" onclick="cancelar('maestro_remolque')">
							<input type="button" name="btnlistar" onclick="flistar();" value="Listar " class="btn btn-lg btn-primary" >
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
				<div class="panel-title"><i class="entypo-info"></i>Información</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
			</div>
			<div class="panel-body"> <div class="col-md-1">
					<i class="entypo-basket" style="font-size:30px;"></i>
			</div>
			<div class="col-md-11">
				<label>Un Remolque forma parte esencial en el proceso del servicio de transporte por lo tanto es un registro obligatorio que debe estar disponible para el registro de una relación de unidades</label>
			</div> 
		</div>
	</div> 
</div>
</div>
<script language="javascript">
	finicio();
	function finicio()
		{
			lof=document.fremolque;
			if (lof.txtoperacion.value!="buscar")
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
					else if (lof.txtoperacion.value=="desactivar")
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
					alert("Remolque no existe");
					fcancelar();
				}
				else if ((lof.txthay.value==1)&&(lof.txthacer.value=="incluir"))
				{
					fexiste();
				}
				else if ((lof.txthay.value==0)&&(lof.txthacer.value=="incluir"))
				{
					lof.txtoperacion.value="incluir";
					lof.txtidremolque.disabled=false;
					lof.txtserial_carroceria_rem.disabled=false;
					lof.txtserial_carroceria_rem.focus();
					lof.txtobservaciones_rem.disabled=false;
					lof.cmbidmarca_remolque.disabled=false;
					lof.cmbidmodelo_remolque.disabled=false;
					lof.cmbidtipo_remolque.disabled=false;
					lof.btnguardar.disabled=false;
					lof.btncancelar.disabled=false;
					lof.btnnuevo.disabled=true;
					lof.btnbuscar.disabled=true;
					lof.btnmodificar.disabled=true;
					lof.btndesactivar.disabled=true;
					lof.btnAbreremolque.disabled=true;
				}
			}
		}
		function fexiste()
		{
			lof=document.fremolque;
			lof.txtidremolque.disabled=true;
			lof.txtserial_carroceria_rem.disabled=true;
			lof.txtobservaciones_rem.disabled=true;
			lof.cmbidmarca_remolque.value="<?php print($lsidmarca_remolque);?>";
			lof.cmbidmarca_remolque.disabled=true;
			lof.cmbidmodelo_remolque.value="<?php print($lsidmodelo_remolque);?>";
			lof.cmbidmodelo_remolque.disabled=true;
			lof.cmbidtipo_remolque.value="<?php print($lsidtipo_remolque);?>";
			lof.cmbidtipo_remolque.disabled=true;
			lof.btnguardar.disabled=true;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=false;
			lof.btndesactivar.disabled=false;
			lof.btnAbreremolque.disabled=true;
		}
		function fnuevo()
		{
			lof=document.fremolque;
			lof.txthacer.value="incluir";
			lof.txtidremolque.disabled=false;
			lof.txtidremolque.focus();
			lof.txtserial_carroceria_rem.disabled=false;
			lof.txtobservaciones_rem.disabled=false;
			lof.cmbidmarca_remolque.disabled=false;
			lof.cmbidmodelo_remolque.disabled=false;
			lof.cmbidtipo_remolque.disabled=false;
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btndesactivar.disabled=true;
			lof.btnAbreremolque.disabled=true;
		}
		function fcancelar()
		{
			lof=document.fremolque;
			lof.txtidremolque.value="";
			lof.txtserial_carroceria_rem.value="";
			lof.txtobservaciones_rem.value="";
			lof.cmbidmarca_remolque.value="-";
			lof.cmbidmodelo_remolque.value="-";
			lof.cmbidtipo_remolque.value="-";
			lof.txtoperacion.value="";
			lof.txthacer.value="";
			lof.txthay.value=0;
			lof.txtidremolque.disabled=true;
			lof.txtserial_carroceria_rem.disabled=true;
			lof.txtobservaciones_rem.disabled=true;
			lof.cmbidmarca_remolque.disabled=true;
			lof.cmbidmodelo_remolque.disabled=true;
			lof.cmbidtipo_remolque.disabled=true;
			lof.btnguardar.disabled=true;
			lof.btncancelar.disabled=true;
			lof.btnnuevo.disabled=false;
			lof.btnbuscar.disabled=false;
			lof.btnmodificar.disabled=true;
			lof.btndesactivar.disabled=true;
			lof.btnAbreremolque.disabled=true;
		}
		function fbuscar()
		{
			lof=document.fremolque;
			lof.txtidremolque.disabled=false;
			lof.txtidremolque.focus();
			lof.txtserial_carroceria_rem.disabled=true;
			lof.txtobservaciones_rem.disabled=true;
			lof.cmbidmarca_remolque.disabled=true;
			lof.cmbidmodelo_remolque.disabled=true;
			lof.cmbidtipo_remolque.disabled=true;
			lof.btnguardar.disabled=true;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=false;
			lof.btnmodificar.disabled=true;
			lof.btndesactivar.disabled=true;
			lof.btnAbreremolque.disabled=false;
		}
		function fmodificar()
		{
			lof=document.fremolque;
			lof.txtoperacion.value="modificar";
			lof.txtidremolque.disabled=true;
			lof.txtserial_carroceria_rem.disabled=false;
			lof.txtserial_carroceria_rem.focus();
			lof.txtobservaciones_rem.disabled=false;
			lof.cmbidmarca_remolque.disabled=false;
			lof.cmbidmodelo_remolque.disabled=false;
			lof.cmbidtipo_remolque.disabled=false;
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btndesactivar.disabled=true;
		}
		function fdesactivar()
		{
			lof=document.fremolque;
			if (confirm("Desea desactivar este remolque"))
			{
				lof.txtidremolque.disabled=false;
				lof.txtoperacion.value="desactivar";
				lof.submit();
			}
			else
			{
				fcancelar();
			}
		}
		function factivar()
		{
			lof=document.fremolque;
			if (confirm("Desea activar este remolque"))
			{
				lof.txtidremolque.disabled=false;
				lof.txtoperacion.value="activar";
				lof.submit();
			}
			else
			{
				fcancelar();
			}
		}
		function fperderfocusidremolque()
		{
			lof=document.fremolque;
			if (lof.txtidremolque.value!="")
			{
				lof.txtoperacion.value="buscar";
				lof.submit();
			}
			else
			{
				lof.txtidremolque.focus();
			}
		}
		function fguardar()
		{
			lof=document.fremolque;
			lof.txtidremolque.disabled=false;
		}
		function flistar()
		{
			mipopup = window.open("lista/listaremolque.php","miwin","width=1300,height=650,scrollbars=yes");
			mipopup.focus();
		}
		function fayuda()
		{
			mipopup = window.open("ayuda/ayudaremolque.php","miwin","width=550,height=650,scrollbars=yes");
			mipopup.focus();
		}
		var miPopup
		function Abreremolque()
		{
			miPopup = window.open("busqueda/buscaremolque.php","solicitud","width=650px,height=270px,scrollbars=yes,toolbar=No")
			miPopup.focus()
		}
		function flistar()
		{
			mipopup = window.open("lista/listaremolque.php","miwin","width=1300,height=650,scrollbars=yes");
			mipopup.focus();
		}
		function fayuda()
		{
			mipopup = window.open("ayuda/ayudaremolque.php","miwin","width=550,height=650,scrollbars=yes");
			mipopup.focus();
		}
		var miPopup
		function abreremolque()
		{
			miPopup = window.open("ayuda/ayudaremolque.php","producto","width=400px,height=550px,scrollbars=yes,toolbar=No")
			miPopup.focus()
		}
</script>
<script language="javascript">
	$(document).ready(function()
	{
		$("#cmbidmarca_unidad").change(function () 
		{
			$("#cmbidmarca_unidad option:selected").each(function () 
			{
				elegido=$(this).val();
				$.post("../modelo/modelo.php", { elegido: elegido }, function(da)
				{
					$("#cmbidmodelo_unidad").html(da);
				});
			});
		})
	});
</script>
