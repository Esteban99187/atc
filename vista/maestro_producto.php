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
	$liidproducto = isset($_GET['liidproducto']) ? $_GET['liidproducto'] : null;
	$lsdesc_prod = isset($_GET['lsdesc_prod']) ? $_GET['lsdesc_prod'] : null;
	$lsestatus_pro = isset($_GET['lsestatus_pro']) ? $_GET['lsestatus_pro'] : null;
	$lsidtipo_producto = isset($_GET['lsidtipo_producto']) ? $_GET['lsidtipo_producto'] : null;
	$lsidtipo_unidad = isset($_GET['lsidtipo_unidad']) ? $_GET['lsidtipo_unidad'] : null;
	$lsidunidad_medida = isset($_GET['lsidunidad_medida']) ? $_GET['lsidunidad_medida'] : null;
?>
<script type="text/javascript">
	function BuscarAjaxProducto(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../controlador/ControladorBuscarAjax.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML=ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=BusquedaAjaxProducto&status=1&estado="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=BusquedaAjaxProducto&status=0&estado="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=BusquedaAjaxProducto&status=Null&estado="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>
<link href="css/maestro.css" type="text/css" rel="stylesheet" />
<script src="js/validaciones.js"></script>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Producto</div> 

				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abreproducto()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
			<div class="panel-body">
					<form method="post" name="fproducto" id="fproducto" action="../controlador/control_maestro_producto.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<input type="hidden" name="txtidproducto" value="<?php print($liidproducto);?>">
						<div class="row">
							<div class="col-lg-5">
								<input class="form-control"  type="hidden" name="txtidproducto" title="ingrese nombre descriptivo del pais"  maxlength="3" tabindex="1" value="<?php print($liidproducto);?>" onblur="fperderfocusidproducto();">
								<div class="form-group has-error">
									<label >Nombre:</label>
									<input class="form-control"  onBlur="cambio_mayus(this)"  type="text" name="txtdesc_prod"  onkeypress="return soloLetra(event)" title="Ingrese nombre del producto"  maxlength="20" tabindex="1" value="<?php print($lsdesc_prod);?>" onblur="fperderfocusdesc_prod();">
								</div>
							</div>
							<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>
							<div class="col-lg-5">
								<div class="form-group has-error">
									<label>Tipo de Producto</label>								
									<select  class="form-control"  name="cmbidtipo_producto" id="cmbidtipo_producto">
										<option value="" value="<?php print($lsidtipo_unidad);?>" >Seleccione</option>
											<?php
												$lssql="select idtipo_producto,concat(' ',desc_tipo_prod) as nombre from tipo_producto order by nombre";
												$lobjcombo->fgenerar($lssql,"idtipo_producto","nombre","");
											?>
									</select>
								</div>
							</div>
							<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>
							<div class="col-lg-5">
								<div class="form-group has-error">
									<label>Tipo de Unidad</label>
									<select  class="form-control"  name="cmbidtipo_unidad" id="cmbidtipo_unidad">
											<option value="" value="<?php print($lsidtipo_unidad);?>" >seleccione</option>
												<?php
													$lssql="select idtipo_unidad,concat(' ',desc_tipo_unid) as nombre from tipo_unidad order by nombre";
													$lobjcombo->fgenerar($lssql,"idtipo_unidad","nombre","");
												?>
									</select>
								</div>
							</div>
								<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>
							<div class="col-lg-5">
								<div class="form-group has-error">
									<label>Unidad de Medida</label>
									<select  class="form-control"  name="cmbidunidad_medida" id="cmbidunidad_medida">
										<option value="" value="<?php print($lsidunidad_medida);?>" >Seleccione</option>
										<?php
											$lssql="select idunidad_medida,concat(' ',desc_unid_medi) as nombre from unidad_medida order by nombre";
											$lobjcombo->fgenerar($lssql,"idunidad_medida","nombre","");
										?>
									</select>
								</div>
							</div>
							<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-2"></div>
							<div class="form-group col-lg-9">
								<h4>¡El campo que contenga un asterísco (<b style="color:#C60404;font-size:20px;">*</b>) es un campo obligatorio y debe ser llenado!</h4>
							</div>
						</div>
						<center>
							<button type="button" name="btnnuevo"     class="btn btn-lg btn-primary"  title="Clic para Registrar" onclick="fnuevo();">Nuevo</button>
							<button type="button" name="btnbuscar"    class="btn btn-lg btn-primary"  title="Clic para Consultar" data-toggle="chat" data-collapse-sidebar="1">Consultar</button>
							<button type="submit" name="btnguardar"   class="btn btn-lg btn-primary"  title="Clic para Guardar" onclick="fguardar();">Guardar</button>
							<button type="button" name="btnmodificar" class="btn btn-lg btn-primary"  title="Clic para Modificar" onclick="fmodificar();" >Modificar</button>
							<?php
							 if ($lsestatus_pro==1)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Desactivar" onclick="feliminar();" >Desactivar</button>';
							}
							else if ($lsestatus_pro==0)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Activar"  onclick="factivar();" >Activar</button>';
							}
							?>
							<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('maestro_producto')">Cancelar</button>
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
		lof=document.fproducto;
		
		if (lof.txtoperacion.value=="buscar")
		{
			lof=document.fproducto;
			lof.txtdesc_prod.disabled=true;
			lof.cmbidtipo_producto.value="<?php print($lsidtipo_producto);?>";
			lof.cmbidtipo_producto.disabled=true;
			lof.cmbidtipo_unidad.value="<?php print($lsidtipo_unidad);?>";
			lof.cmbidtipo_unidad.disabled=true;
			lof.cmbidunidad_medida.value="<?php print($lsidunidad_medida);?>";
			lof.cmbidunidad_medida.disabled=true;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnguardar.disabled=true;
			lof.btnmodificar.disabled=false;
			lof.btneliminar.disabled=false;
			lof.btncancelar.disabled=false;
		}
		else 
		{
			fcancelar()
		}
	}

	function fnuevo()
	{
		lof=document.fproducto;
		lof.txtoperacion.value="incluir";
		lof.txtidproducto.value=true;
		lof.txtdesc_prod.disabled=false;
		lof.txtdesc_prod.focus();
		lof.cmbidtipo_producto.disabled=false;
		lof.cmbidtipo_unidad.disabled=false;
		lof.cmbidunidad_medida.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnguardar.disabled=false;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btncancelar.disabled=false;
	}
	function fcancelar()
	{
		lof=document.fproducto;
		lof.txtdesc_prod.value="";
		lof.cmbidtipo_producto.value="-";
		lof.cmbidtipo_unidad.value="-";
		lof.cmbidunidad_medida.value="-";
		lof.txtoperacion.value="";
		lof.txthacer.value="";
		lof.txthay.value=0;
		lof.txtdesc_prod.disabled=true;
		lof.cmbidtipo_producto.disabled=true;
		lof.cmbidtipo_unidad.disabled=true;
		lof.cmbidunidad_medida.disabled=true;
		lof.btnnuevo.disabled=false;
		lof.btnbuscar.disabled=false;
		lof.btnguardar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btncancelar.disabled=true;
	}

	function fmodificar()
	{
		lof=document.fproducto;
		lof.txtoperacion.value="modificar";
		lof.txtdesc_prod.disabled=false;
		lof.txtdesc_prod.focus();
		lof.cmbidtipo_producto.disabled=false;
		lof.cmbidtipo_unidad.disabled=false;
		lof.cmbidunidad_medida.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnguardar.disabled=false;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btncancelar.disabled=false;
	}
	function feliminar()
	{
		lof=document.fproducto;
		lof.txtidproducto.disabled=false;
			if (confirm("¿Desea Desactivar el registro?"))
			{
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
		lof=document.fproducto;
		lof.txtidproducto.disabled=false;
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
		function abreproducto(){ //~ luego de 'funcion' se le coloca el nombre que se le dio en el onclick de arriba
		miPopup = window.open("ayuda/ayudaproducto.php","solicitud","width=450px,height=870px,scrollbars=yes,toolbar=No") //~ aqui se debe colocar la direccion del archivo de la ayuda
		miPopup.focus()
	}
</script>
