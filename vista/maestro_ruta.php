<?php

	require_once("../modelo/clscombo.php");
    $lobjcombo= new clscombo();

	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;
	$liidtabulador = isset($_GET['liidtabulador']) ? $_GET['liidtabulador'] : null;
	$lskilometraje_tab = isset($_GET['lskilometraje_tab']) ? $_GET['lskilometraje_tab'] : null;
	$lsprecio_total_tab = isset($_GET['lsprecio_total_tab']) ? $_GET['lsprecio_total_tab'] : null;
	$lsidestado_destino_tabulador = isset($_GET['lsidestado_destino_tabulador']) ? $_GET['lsidestado_destino_tabulador'] : null;
	$lsidmunicipio_destino_tabulador = isset($_GET['lsidmunicipio_destino_tabulador']) ? $_GET['lsidmunicipio_destino_tabulador'] : null;
	$lsidparroquia_destino_tabulador = isset($_GET['lsidparroquia_destino_tabulador']) ? $_GET['lsidparroquia_destino_tabulador'] : null;
	$lsidciudad_destino_tabulador = isset($_GET['lsidciudad_destino_tabulador']) ? $_GET['lsidciudad_destino_tabulador'] : null;
	$lsidestado_origen_tabulador = isset($_GET['lsidestado_origen_tabulador']) ? $_GET['lsidestado_origen_tabulador'] : null;
	$lsidmunicipio_origen_tabulador = isset($_GET['lsidmunicipio_origen_tabulador']) ? $_GET['lsidmunicipio_origen_tabulador'] : null;
	$lsidparroquia_origen_tabulador = isset($_GET['lsidparroquia_origen_tabulador']) ? $_GET['lsidparroquia_origen_tabulador'] : null;
	$lsidciudad_origen_tabulador = isset($_GET['lsidciudad_origen_tabulador']) ? $_GET['lsidciudad_origen_tabulador'] : null;


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
				echo "<option value=''>Elige</option>";
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
				echo "<option value=''>Elige</option>";
				echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
			}
			
		}

		echo "</select>";
	}

?>

<link href="css/maestro.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/select_dependiente_origen_tabulador.js"></script>
<script type="text/javascript" src="js/select_dependiente_destino_tabulador.js"></script>


<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Registro de Rutas</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abrepais()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
			<div class="panel-body">
					<form method="post" name="fruta" action="../controlador/control_maestro_ruta.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
						<div class="form-group col-lg-4">
								<label >Código:</label>
								<input class="form-control"  type="text" name="txtidtabulador" title="ingrese el precio"  maxlength="3" tabindex="1" value="<?php print($liidtabulador);?>" onblur="fperderfocusidtabulador()">
						</div>
					
							<div class="form-group col-lg-4">
								<label >Via:</label>
								<input class="form-control"  type="text" name="txtprecio_total_tab"  title="ingrese la unidad de transporte" maxlength="50"  tabindex="2"  value="<?php print($lsprecio_total_tab);?>">
							</div>	
							<div class="form-group col-lg-4">
								<label >Kilometraje:</label>
								<input class="form-control"  type="text" name="txtkilometraje_tab"  title="ingrese la unidad de transporte" maxlength="50"  tabindex="2"  value="<?php print($lskilometraje_tab);?>"> 
							</div>

						</div>
						<div class="row">
						<!--inican los select dependientes de la direccion origen del tabulador-->
						<div class="form-group col-lg-2"><?php Select_dependiente_origen_tabulador(); ?></div>
						<div class="form-group col-lg-2">
							<label >Estado Origen:</label>
							<select class="form-control" disabled="disabled" name="cmbidestado_origen_tabulador" id="cmbidestado_origen_tabulador">
								<?php
									if (!empty($lsidestado_origen_tabulador))
									{
										echo '<option value="" >'.$lsidestado_origen_tabulador.'</option>';
									}
									else
									{
									 echo '<option value="">Selecciona opci&oacute;n...</option>';
									}
								?>
							</select>
						</div>
						<div class="form-group col-lg-2">
							<label >Municipio Origen:</label>
							<select class="form-control" disabled="disabled" name="cmbidmunicipio_origen_tabulador" id="cmbidmunicipio_origen_tabulador">
								<?php
									if (!empty($lsidmunicipio_origen_tabulador))
									{
										echo '<option value="" >'.$lsidmunicipio_origen_tabulador.'</option>';
									}
									else
									{
									 echo '<option value="">Selecciona opci&oacute;n...</option>';
									}
								?>
							</select>
						</div>
						<div class="form-group col-lg-3">
							<label >Parroquia Origen:</label>
							<select class="form-control" disabled="disabled" name="cmbidparroquia_origen_tabulador" id="cmbidparroquia_origen_tabulador">
								<?php
									if (!empty($lsidparroquia_origen_tabulador))
									{
										echo '<option value="" >'.$lsidparroquia_origen_tabulador.'</option>';
									}
									else
									{
									 echo '<option value="">Selecciona opci&oacute;n...</option>';
									}
								?>
							</select>
						</div>
						<div class="form-group col-lg-3">
							<label >Ciudad Origen:</label>
							<select class="form-control" disabled="disabled" name="cmbidciudad_origen_tabulador" id="cmbidciudad_origen_tabulador">
								<?php
									if (!empty($lsidciudad_origen_tabulador))
									{
										echo '<option value="" >'.$lsidciudad_origen_tabulador.'</option>';
									}
									else
									{
									 echo '<option value="">Selecciona opci&oacute;n...</option>';
									}
								?>
							</select>
						</div>
						</div><div class="row">
						<!--********************************************************************-->
						<!--inican los select dependientes de la direccion destino del tabulador-->
						<div class="form-group col-lg-2"><?php Select_dependiente_destino_tabulador(); ?></div>
						<div class="form-group col-lg-2">
							<label >Estado Destino:</label>
							<select class="form-control" disabled="disabled" name="cmbidestado_destino_tabulador" id="cmbidestado_destino_tabulador">
																<?php
									if (!empty($lsidestado_destino_tabulador))
									{
										echo '<option value="" >'.$lsidestado_destino_tabulador.'</option>';
									}
									else
									{
									 echo '<option value="">Selecciona opci&oacute;n...</option>';
									}
								?>
							</select>
						</div>
						<div class="form-group col-lg-2">
							<label >Municipio Destino:</label>
							<select class="form-control" disabled="disabled" name="cmbidmunicipio_destino_tabulador" id="cmbidmunicipio_destino_tabulador">
								<?php
									if (!empty($lsidmunicipio_destino_tabulador))
									{
										echo '<option value="" >'.$lsidmunicipio_destino_tabulador.'</option>';
									}
									else
									{
									 echo '<option value="">Selecciona opci&oacute;n...</option>';
									}
								?>
							</select>
						</div>
						<div class="form-group col-lg-3">
							<label >Parroquia Destino:</label>
							<select class="form-control" disabled="disabled" name="cmbidparroquia_destino_tabulador" id="cmbidparroquia_destino_tabulador">
								<?php
									if (!empty($lsidparroquia_destino_tabulador))
									{
										echo '<option value="" >'.$lsidparroquia_destino_tabulador.'</option>';
									}
									else
									{
									 echo '<option value="">Selecciona opci&oacute;n...</option>';
									}
								?>
							</select>
						</div>
						<div class="form-group col-lg-3">
							<label >Ciudad Destino:</label>
							<select class="form-control" disabled="disabled" name="cmbidciudad_destino_tabulador" id="cmbidciudad_destino_tabulador">
								<?php
									if (!empty($lsidciudad_destino_tabulador))
									{
										echo '<option value="" >'.$lsidciudad_destino_tabulador.'</option>';
									}
									else
									{
									 echo '<option value="">Selecciona opci&oacute;n...</option>';
									}
								?>
							</select>
						</div>
						</div>
					<div class="row">
							<div class="form-group col-lg-3"></div>
							<div class="form-group col-lg-9">
								<label>El campo que contenga un aterisco (*) es un campo obligatorio y debe ser llenado</label>
							</div>
						</div>
						<center>
							<button type="button" name="btnnuevo"     class="btn btn-lg btn-primary"  title="Clic para Registrar" onclick="fnuevo();">Nuevo</button>
							<input type="button" name="btnbuscar" value="Buscar   "class="btn btn-lg btn-primary" tabindex="22" onclick="fbuscar();">
							<button type="submit" name="btnguardar"   class="btn btn-lg btn-primary"  title="Clic para Guardar" onclick="fguardar();">Guardar</button>
							<button type="button" name="btnmodificar" class="btn btn-lg btn-primary"  title="Clic para Modificar" onclick="fmodificar();" >Modificar</button>
							<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('maestro_ruta')">Cancelar</button>
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
				<label>La ruta es una entidad de vital importancia en el proceso de un servicio de transporte ya que este registro permite guardar las vias y el kilometraje utilizado posteriormente en el tabulador de precios.</label>
			</div> 
		</div>
	</div> 
</div>
</div>
		<script language="javascript">

			finicio();
		    function finicio()
		    {
			    lof=document.fruta;
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
						alert("no existe este tabulador");

						fcancelar();

					}
				}

				else if (lof.txtoperacion.value=="nuevo")
				{
					lof.txtoperacion.value="incluir";
					lof.txtidtabulador.disabled=true;
					lof.txtprecio_total_tab.disabled=false;
					lof.txtkilometraje_tab.disabled=false;
					lof.btnguardar.disabled=false;
					lof.btncancelar.disabled=false;
					lof.btnnuevo.disabled=true;
					lof.btnbuscar.disabled=true;
					lof.btnmodificar.disabled=true;
					lof.btneliminar.disabled=true;
				}
		    }

		   function fexiste()
		   {
				lof=document.fruta;
				lof.txtidtabulador.disabled=true;
				lof.txtkilometraje_tab.disabled=true;
				lof.txtprecio_total_tab.disabled=true;
				lof.cmbidpais_origen_tabulador.disabled=true;
				lof.cmbidestado_origen_tabulador.disabled=true;
				lof.cmbidmunicipio_origen_tabulador.disabled=true;
				lof.cmbidparroquia_origen_tabulador.disabled=true;
				lof.cmbidciudad_origen_tabulador.disabled=true;
				lof.cmbidpais_destino_tabulador.disabled=true;
				lof.cmbidestado_destino_tabulador.disabled=true;
				lof.cmbidmunicipio_destino_tabulador.disabled=true;
				lof.cmbidparroquia_destino_tabulador.disabled=true;
				lof.cmbidciudad_destino_tabulador.disabled=true;
				lof.btnguardar.disabled=true;
				lof.btncancelar.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnmodificar.disabled=false;
				lof.btneliminar.disabled=true;

			}



		function fnuevo()
		{
			lof=document.fruta;
			lof.txtoperacion.value="nuevo";
			lof.txthacer.value="incluir";
			lof.submit();
		}

			function fcancelar()
			{
			   lof=document.fruta;
			   lof.txtidtabulador.value="";
			   lof.txtkilometraje_tab.value="";
			   lof.txtprecio_total_tab.value="";
			   lof.cmbidpais_origen_tabulador.value.value="";
			   lof.cmbidestado_origen_tabulador.value.value="";
			   lof.cmbidmunicipio_origen_tabulador.value.value="";
			   lof.cmbidparroquia_origen_tabulador.value.value="";
			   lof.cmbidciudad_origen_tabulador.value.value="";
			   lof.cmbidpais_destino_tabulador.value="";
			   lof.cmbidestado_destino_tabulador.value="";
			   lof.cmbidmunicipio_destino_tabulador.value="";
			   lof.cmbidparroquia_destino_tabulador.value="";
			   lof.cmbidciudad_destino_tabulador.value="";
			   lof.txthacer.value="";
			   lof.txthay.value=0;
			   lof.txtidtabulador.disabled=true;
			   lof.txtkilometraje_tab.disabled=true;
			   lof.txtprecio_total_tab.disabled=true;
			   lof.cmbidpais_origen_tabulador.disabled=true;
			   lof.cmbidestado_origen_tabulador.disabled=true;
			   lof.cmbidmunicipio_origen_tabulador.disabled=true;
			   lof.cmbidparroquia_origen_tabulador.disabled=true;
			   lof.cmbidciudad_origen_tabulador.disabled=true;
			   lof.cmbidpais_destino_tabulador.disabled=true;
			   lof.cmbidestado_destino_tabulador.disabled=true;
			   lof.cmbidmunicipio_destino_tabulador.disabled=true;
			   lof.cmbidparroquia_destino_tabulador.disabled=true;
			   lof.cmbidciudad_destino_tabulador.disabled=true;
			   lof.btnguardar.disabled=true;
			   lof.btncancelar.disabled=true;
			   lof.btnnuevo.disabled=false;
			   lof.btnbuscar.disabled=false;
			   lof.btnmodificar.disabled=true;
			   lof.btneliminar.disabled=true;
			}

			function fbuscar()
			{
				lof=document.fruta;
				lof.txtidtabulador.disabled=false;
				lof.txtidtabulador.focus();
				lof.txtkilometraje_tab.disabled=true;
				lof.txtprecio_total_tab.disabled=true;
				lof.cmbidpais_origen_tabulador.disabled=true;
				lof.cmbidestado_origen_tabulador.disabled=true;
				lof.cmbidmunicipio_origen_tabulador.disabled=true;
				lof.cmbidparroquia_origen_tabulador.disabled=true;
				lof.cmbidciudad_origen_tabulador.disabled=true;
				lof.cmbidpais_destino_tabulador.disabled=true;
				lof.cmbidestado_destino_tabulador.disabled=true;
				lof.cmbidmunicipio_destino_tabulador.disabled=true;
				lof.cmbidparroquia_destino_tabulador.disabled=true;
				lof.cmbidciudad_destino_tabulador.disabled=true;
				lof.btnguardar.disabled=true;
				lof.btncancelar.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=false;
				lof.btnmodificar.disabled=true;
				lof.btneliminar.disabled=true;
			}

			function fmodificar()
			{
				lof=document.fruta;
				lof.txtoperacion.value="modificar";
				lof.txtidtabulador.disabled=true;
				lof.txtkilometraje_tab.disabled=false;
				lof.txtprecio_total_tab.disabled=false;
				lof.txtprecio_total_tab.focus();
				lof.cmbidpais_origen_tabulador.disabled=false;
				lof.cmbidestado_origen_tabulador.disabled=false;
				lof.cmbidmunicipio_origen_tabulador.disabled=false;
				lof.cmbidparroquia_origen_tabulador.disabled=false;
				lof.cmbidciudad_origen_tabulador.disabled=false;
				lof.cmbidpais_destino_tabulador.disabled=false;
				lof.cmbidestado_destino_tabulador.disabled=false;
				lof.cmbidmunicipio_destino_tabulador.disabled=false;
				lof.cmbidparroquia_destino_tabulador.disabled=false;
				lof.cmbidciudad_destino_tabulador.disabled=false;
				lof.btnguardar.disabled=false;
				lof.btncancelar.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnmodificar.disabled=true;
				lof.btneliminar.disabled=true;
			}

			function feliminar()
			{
				lof=document.fruta;
				if (confirm("desea eliminar"))
				{
					lof.txtidtabulador.disabled=false;
					lof.txtoperacion.value="eliminar";
					lof.submit();
				}
				else
				{
					fcancelar();
				}
			}

			function fperderfocusidtabulador()
			{
				lof=document.fruta;
				if (lof.txtidtabulador.value!="")
				{
					lof.txtoperacion.value="buscar";
					lof.submit();
				}
				else
				{
					lof.txtidtabulador.focus();
				}
			}
			function fguardar()
			{
				lof=document.fruta;
				lof.txtidtabulador.disabled=false;
				if (fvalidar())
				{
					lof.submit();
				}
			}
			
			function fvalidar()
			{
				lbbueno=false;
				lof=document.fruta;
				if (lof.txtidtabulador.value=="")
				{
					alert("Código en Blanco");
					lof.txtidtabulador.focus();
				}
				else if (lof.txtprecio_total_tab.value=="")
				{
					lof.txtidtabulador.disabled=true;
					alert("Via en Blanco");
					lof.txtprecio_total_tab.focus();
				}
				else if (lof.txtkilometraje_tab.value=="")
				{
					lof.txtidtabulador.disabled=true;
					alert("Kilometraje en Blanco");
					lof.txtkilometraje_tab.focus();
				}
				else if (lof.cmbidpais_origen_tabulador.value=="")
				{
					lof.txtidtabulador.disabled=true;
					alert("País Origen en Blanco");
					lof.cmbidpais_origen_tabulador.focus();
				}
				else if (lof.cmbidestado_origen_tabulador.value=="")
				{
					lof.txtidtabulador.disabled=true;
					alert("Estado Origen en Blanco");
					lof.cmbidestado_origen_tabulador.focus();
				}
				else if (lof.cmbidmunicipio_origen_tabulador.value=="")
				{
					lof.txtidtabulador.disabled=true;
					alert("Municipio Origen en Blanco");
					lof.cmbidmunicipio_origen_tabulador.focus();
				}
				else if (lof.cmbidparroquia_origen_tabulador.value=="")
				{
					lof.txtidtabulador.disabled=true;
					alert("Parroquia Origen en Blanco");
					lof.cmbidparroquia_origen_tabulador.focus();
				}
				else if (lof.cmbidciudad_origen_tabulador.value=="")
				{
					lof.txtidtabulador.disabled=true;
					alert("Ciudad Origen en Blanco");
					lof.cmbidciudad_origen_tabulador.focus();
				}
				else if (lof.cmbidpais_destino_tabulador.value=="")
				{
					lof.txtidtabulador.disabled=true;
					alert("País Destino en Blanco");
					lof.cmbidpais_destino_tabulador.focus();
				}
				else if (lof.cmbidestado_destino_tabulador.value=="")
				{
					lof.txtidtabulador.disabled=true;
					alert("Estado Destino en Blanco");
					lof.cmbidestado_destino_tabulador.focus();
				}
				else if (lof.cmbidmunicipio_destino_tabulador.value=="")
				{
					lof.txtidtabulador.disabled=true;
					alert("Municipio Destino en Blanco");
					lof.cmbidmunicipio_destino_tabulador.focus();
				}
				else if (lof.cmbidparroquia_destino_tabulador.value=="")
				{
					lof.txtidtabulador.disabled=true;
					alert("Parroquia Destino en Blanco");
					lof.cmbidparroquia_destino_tabulador.focus();
				}
				else if (lof.cmbidciudad_destino_tabulador.value=="")
				{
					lof.txtidtabulador.disabled=true;
					alert("Ciudad Destino en Blanco");
					lof.cmbidciudad_destino_tabulador.focus();
				}
				else
				{
					lbbueno=true;
				}
				return lbbueno;
			}
			function fayuda()
			{
					mipopup = window.open("ayuda/ayudatabulador.php","miwin","width=550,height=650,scrollbars=yes");
					mipopup.focus();
			}
			function multiplica()
			{
				var a = document.fruta.txtprecio_pre.value //en el DOM esto referencia el valor del primer cuadro
				var b = document.fruta.txtkilometraje_tab.value //esto referencia el valor del segundo cuadro
				document.fruta.txtprecio_total_tab.value=parseFloat(a)*parseFloat(b) //convertimos a números
				//los valores de los cuadros de texto se interpretan siempre como cadenas de caracteres
			}
			function flistar()
		   {
				   mipopup = window.open("lista/listatabulador.php","miwin","width=1300,height=650,scrollbars=yes");
				   mipopup.focus();
		   }
		   
		   var miPopup
			function abreruta(){
			miPopup = window.open("ayuda/ayudaruta.php","producto","width=400px,height=550px,scrollbars=yes,toolbar=No")
			miPopup.focus()
			}
			
		</script>
