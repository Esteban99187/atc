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

	$liidprecio = isset($_GET['liidprecio']) ? $_GET['liidprecio'] : null;
	$lsprecio_pre = isset($_GET['lsprecio_pre']) ? $_GET['lsprecio_pre'] : null;
	$lsidtipo_unidad = isset($_GET['lsidtipo_unidad']) ? $_GET['lsidtipo_unidad'] : null;
	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lsestatus_pre = isset($_GET['lsestatus_pre']) ? $_GET['lsestatus_pre'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;

?>

 <script type="text/javascript">
	function BuscarAjaxprecio(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../controlador/ControladorBuscarAjax.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML=ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=BusquedaAjaxprecio&status=1&estado="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=BusquedaAjaxprecio&status=0&estado="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=BusquedaAjaxprecio&status=Null&estado="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Precio por Kilometro</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abreprecio()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
				<div class="panel-body">
					<form method="post" name="fprecio" id="fprecio" action="../controlador/control_maestro_precio.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
					<div class="form-group col-lg-1"></div>
						<input class="form-control"  type="hidden" name="txtidprecio" title="ingrese código de precio"  maxlength="3" tabindex="1" value="<?php print($liidprecio);?>" onblur="fperderfocusidprecio();">
			
					<div class="col-lg-4">
						<div class="form-group has-error">
						<label >Precio:</label>
						<input class="form-control"  placeholder="Solo Ingrese Números" type="text" name="txtprecio_pre" onkeypress="return soloNumero(event)" title="ingrese el precio"  maxlength="20" tabindex="1" value="<?php print($lsprecio_pre);?>" onblur="fperderfocusprecio_pre();">
					</div>
					</div>
					<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
					<div class="col-lg-4">
						<div class="form-group has-error">
						<label>Tipo de Unidad</label>
						<select  class="form-control"  onBlur="cambio_mayus(this)" name="cmbidtipo_unidad" id="cmbidtipo_unidad">
						<option value="" value="<?php print($lsidtipo_unidad);?>" >seleccione</option>
					<?php
						$lssql="select idtipo_unidad, concat(desc_tipo_unid,' ',capacidad,' ',desc_unid_medi) as nombre from tipo_unidad, capacidad, unidad_medida where (tipo_unidad.idcapacidad=capacidad.idcapacidad and capacidad.idunidad_medida=unidad_medida.idunidad_medida) order by nombre";
						$lobjcombo->fgenerar($lssql,"idtipo_unidad","nombre","");
					?>
					</select>
					</div>
					</div>
					
				<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
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
							 if ($lsestatus_pre==1)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Desactivar" onclick="feliminar();" >Desactivar</button>';
							}
							else if ($lsestatus_pre==0)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Activar"  onclick="factivar();" >Activar</button>';
							}
							?>
							<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('maestro_precio')">Cancelar</button>
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
			<label>Un precio por kilómetro es un elemento fundamental para un servicio de transporte por lo tanto es un registro obligatorio que debe ser insertado antes del registro del tabulador de precios </label>
		</div> 
		</div>
	</div> 
</div>
</div>

<script language="javascript">
		finicio();

	  function finicio()
       {
		lof=document.fprecio;
		
			if (lof.txtoperacion.value=="buscar")
			{
			lof=document.fprecio;
			lof.txtprecio_pre.disabled=true;
			lof.cmbidtipo_unidad.value="<?php print($lsidtipo_unidad);?>";
			lof.cmbidtipo_unidad.disabled=true;
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
		lof=document.fprecio;
		lof.txtoperacion.value="incluir";
		lof.txtprecio_pre.disabled=false;
		lof.txtprecio_pre.focus();
		lof.cmbidtipo_unidad.disabled=false;
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
	}

      function fcancelar()
	{
		lof=document.fprecio;
		lof.txtprecio_pre.value="";
		lof.txtoperacion.value="";
		lof.txthacer.value="";
		lof.txthay.value=0;
		lof.txtprecio_pre.disabled=true;
		lof.cmbidtipo_unidad.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=true;
		lof.btnnuevo.disabled=false;
		lof.btnbuscar.disabled=false;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
	} 

    function fmodificar()
	{
		lof=document.fprecio;
		lof.txtoperacion.value="modificar";
		lof.txtprecio_pre.disabled=false;
		lof.txtprecio_pre.focus();
		lof.cmbidtipo_unidad.disabled=false;
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
	}
	function feliminar()
	{
		lof=document.fprecio;
			if (confirm("¿Desea Desactivar el registro?"))
			{
				lof.txtidprecio.disabled=false;
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
		lof=document.fprecio;
		lof.txtidprecio.disabled=false;
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
		function abreprecio(){ //~ luego de 'funcion' se le coloca el nombre que se le dio en el onclick de arriba
		miPopup = window.open("ayuda/ayudaprecio.php","solicitud","width=450px,height=870px,scrollbars=yes,toolbar=No") //~ aqui se debe colocar la direccion del archivo de la ayuda
		miPopup.focus()
	}
		</script>

