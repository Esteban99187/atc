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
	$liidestado= isset($_GET['liidestado']) ? $_GET['liidestado'] : null ;
	$lsdesc_esta= isset($_GET['lsdesc_esta']) ? $_GET['lsdesc_esta'] : null ;
	$lsestatus_est= isset($_GET['lsestatus_est']) ? $_GET['lsestatus_est'] : null ;
	$lsidpais= isset($_GET['lsidpais']) ? $_GET['lsidpais'] : null ;
	$lihay= isset($_GET['lihay']) ? $_GET['lihay'] : null ;
	$lshacer= isset($_GET['lshacer']) ? $_GET['lshacer'] : null ;
	$lsoperacion= isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null ;
?>
<script type="text/javascript">
	function BuscarAjaxestado(valor)
	{
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../controlador/ControladorBuscarAjax.php",true);
		ajax.onreadystatechange=function()
		{
			if(ajax.readyState==4)
			{
				document.getElementById("datosAjax").innerHTML=ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			if(document.getElementById('est1').checked)
				{ //si esta tildado la caja de activos
					ajax.send("operacion=BusquedaAjaxestado&status=1&estado="+valor); //paso variable con estatus activo(1) y nombre
				}
			else if(document.getElementById('est2').checked)
				{ //si esta tildado la caja de inactivos
					ajax.send("operacion=BusquedaAjaxestado&status=0&estado="+valor); //paso variable con estatus inactivo(0) y nombre
				}
			else
				{ //si no esta tildados ni activos ni inactivos
					ajax.send("operacion=BusquedaAjaxestado&status=Null&estado="+valor); //paso variable con estatus Nulo y nombre
				}	
	}
</script>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Estado</div> 
					<div class="panel-options"><a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a><i class="entypo-help" onclick="abreestado()"></i></div>
				</div>
				<div class="panel-body">
					<form method="post" name="festado" id="festado" action="../controlador/control_maestro_estado.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
					<div class="row">
						
						<div class="form-group col-lg-1">
							<input class="form-control"  type="hidden" name="txtidestado" title="ingrese codigo estado"  onkeypress="return soloNumero(event)" maxlength="3" tabindex="1" value="<?php print($liidestado);?>" onblur="fperderfocusidestado();">
						</div>
						
						<div class="form-group col-lg-4">
							<label>Pais:</label>
								<select  class="form-control" title="Seleccione un Pais. Ej: Venezuela" name="cmbidpais" id="cmbidpais">
									<option value="-" value="<?php print($lsidpais);?>" >seleccione</option>
									<?php
										$lssql="select idpais,concat(' ',desc_pais) as nombre from pais order by nombre";
										$lobjcombo->fgenerar($lssql,"idpais","nombre","");
									?>
								</select>
						</div>		
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	

							<div class="col-lg-4">
								<div class="form-group has-error">						
							<label >Nombre:</label>
								<input class="form-control"  type="text" name="txtdesc_esta" onBlur="cambio_mayus(this)" placeholder="Solo Ingrese Letras" title="Ingrese nombre de un Estado. Ej: Portuguesa" onkeypress="return soloLetra(event)" maxlength="50"  tabindex="2"  value="<?php print($lsdesc_esta);?>"> 
						</div>
						</div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	

						<div class="row">
						<div class="form-group col-lg-3"></div>
							<div class="form-group col-lg-8">
								<label>El campo que contenga un aterisco (*) es un campo obligatorio y debe ser llenado</label>
							</div>
						</div>
					
						<center>
							<button type="button" name="btnnuevo"     class="btn btn-lg btn-primary"  title="Clic para Registrar" onclick="fnuevo();">Nuevo</button>
							<button type="button" name="btnbuscar"    class="btn btn-lg btn-primary"  title="Clic para Consultar" data-toggle="chat" data-collapse-sidebar="1">Consultar</button>
							<button type="submit" name="btnguardar"   class="btn btn-lg btn-primary"  title="Clic para Guardar" onclick="fguardar();">Guardar</button>
							<button type="button" name="btnmodificar" class="btn btn-lg btn-primary"  title="Clic para Modificar" onclick="fmodificar();" >Modificar</button>
							<?php
								if ($lsestatus_est==1)
									{
										echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Desactivar" onclick="feliminar();" >Desactivar</button>';
									}
								else if ($lsestatus_est==0)
									{
										echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Activar"  onclick="factivar();" >Activar</button>';
									}
							?>
							<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('maestro_estado')">Cancelar</button>
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
					<div class="panel-body"> <div class="col-md-1"><i class="entypo-basket" style="font-size:30px;"></i></div>
					<div class="col-md-3"></div>
					<div class="col-md-15">
						<label>Un Estado forma parte de la división territorial de un Pais</label>
					</div>
			</div>
		</div>
	</div>
	</div>
</div>
<script language="javascript">

	finicio();
	function finicio()
		{
		lof=document.festado;
		if (lof.txtoperacion.value=="buscar")
			{
				lof=document.festado;
					lof.txtdesc_esta.disabled=true;
					lof.txtdesc_esta.focus();
					lof.cmbidpais.value="<?php print($lsidpais);?>";
					lof.cmbidpais.disabled=true;
				lof.btnguardar.disabled=true;
				lof.btncancelar.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnmodificar.disabled=false;
				lof.btneliminar.disabled=false;
			}
		else
			{
			fcancelar();
			}
		}

	function fnuevo()
		{
			lof=document.festado;
			lof.txtoperacion.value="incluir";
				lof.txtdesc_esta.disabled=false;
				lof.txtdesc_esta.focus();
				lof.cmbidpais.disabled=false;
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
		}

	function fcancelar()
		{
			lof=document.festado;
				lof.txtdesc_esta.value="";
				lof.cmbidpais.value="-";
			lof.txtoperacion.value="";
			lof.txthacer.value="";
			lof.txthay.value=0;
				lof.txtdesc_esta.disabled=true;
				lof.cmbidpais.disabled=true;
			lof.btnguardar.disabled=true;
			lof.btncancelar.disabled=true;
			lof.btnnuevo.disabled=false;
			lof.btnbuscar.disabled=false;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
		}

	function fmodificar()
		{
			lof=document.festado;
			lof.txtoperacion.value="modificar";
				lof.txtdesc_esta.disabled=false;
				lof.txtdesc_esta.focus();
				lof.cmbidpais.value="<?php print($lsidpais);?>";
				lof.cmbidpais.disabled=false;
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
		}
 
	function feliminar()
		{
			lof=document.festado;
			if (confirm("¿Desea Desactivar el registro?"))
				{
					lof.txtidestado.disabled=false;
					lof.txtoperacion.value="eliminar";
					lof.submit();
				}
			else
			{
				fcancelar();
			}
		}

	function factivar()
		{
			lof=document.festado;
			lof.txtidestado.disabled=false;
			if (confirm("¿Desea Activar el registro?"))
				{
					lof.txtoperacion.value="activar";
					lof.submit();
				}
			else
				{
					fcancelar();
				}
		}
//~ Funcion del onclick , este me permite abrir la ventana emergente, tiene que estar declarado igual que en la parte de arrriba
	var miPopup
		function abreestado(){ //~ luego de 'funcion' se le coloca el nombre que se le dio en el onclick de arriba
		miPopup = window.open("ayuda/ayudaestado.php","solicitud","width=450px,height=870px,scrollbars=yes,toolbar=No") //~ aqui se debe colocar la direccion del archivo de la ayuda
		miPopup.focus()
	}
</script>
<script language="javascript" src="jquery-1.3.2.min.js"></script>
<script language="javascript">
	$(document).ready(function()
	{
		$("#cmbpais").change(function ()
			{
				$("#cmbpais option:selected").each(function ()
					{
						elegido=$(this).val();
						$.post("estados.php", { elegido: elegido }, function(da){$("#cmbestados").html(da);$("#cmbciudades").html(data);$("#cmbciudades").html("");});
					}
					);
			})
// Este puede ponerse en comentario si no se dispone de un 3er combo:
	$("#cmbestados").change(function () {
		$("#cmbestados option:selected").each(function ()
		{
			elegido=$(this).val();
			$.post("ciudades.php", { elegido: elegido }, function(da){$("#cmbciudades").html(da);});
		});
	})

	$("#cmbciudades").change(function () {
	$("#cmbciudades option:selected").each(function () {
	elegido=$(this).val();
	$.post("parroquias.php", { elegido: elegido }, function(data){
	$("#cmbparroquias").html(data);

	});
	});
	})

	$("#cmbparroquias").change(function () {
	$("#cmbparroquias option:selected").each(function () {
	elegido=$(this).val();
	$.post("sectores.php", { elegido: elegido }, function(datas){
	$("#cmbsectores").html(datas);

	});
	});
	})
	$("#cmbestados").change(function () {
	$("#cmbestados option:selected").each(function () {
	elegido=$(this).val();
	$.post("ciudades.php", { elegido: elegido }, function(da){
	$("#cmbciudades").html(da);

	});
	});
	})

	$("#cmbciudades").change(function () {
	$("#cmbciudades option:selected").each(function () {
	elegido=$(this).val();
	$.post("parroquias.php", { elegido: elegido }, function(data){
	$("#cmbparroquias").html(data);

	});
	});
	})

	$("#cmbparroquias").change(function () {
	$("#cmbparroquias option:selected").each(function () {
	elegido=$(this).val();
	$.post("sectores.php", { elegido: elegido }, function(datas){
	$("#cmbsectores").html(datas);

	});
	});
	})

	});
	</script>
</script>
</fieldset>
</html>
