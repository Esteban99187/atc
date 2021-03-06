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

	$liidtipo_proveedor = isset($_GET['liidtipo_proveedor']) ? $_GET['liidtipo_proveedor'] : null;
	$lsdesc_tipo_prov = isset($_GET['lsdesc_tipo_prov']) ? $_GET['lsdesc_tipo_prov'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lsestatus_tippro = isset($_GET['lsestatus_tippro']) ? $_GET['lsestatus_tippro'] : null;
	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;
?>
<script type="text/javascript">
	function BuscarAjaxtipoproveedor(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../controlador/ControladorBuscarAjax.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML=ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=BusquedaAjaxtipoproveedor&status=1&estado="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=BusquedaAjaxtipoproveedor&status=0&estado="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=BusquedaAjaxtipoproveedor&status=Null&estado="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Tipo de Proveedor</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abretipo_proveedor()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
				<div class="panel-body">
					<form method="post" name="fmaestro_tipo_proveedor" id="fmaestro_tipo_proveedor" action="../controlador/control_maestro_tipo_proveedor.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
							<div class="form-group col-lg-3"></div>
								<input class="form-control"  type="hidden" name="txtidtipo_proveedor" onkeypress="return soloNumero(event)"  title="ingrese codigo tipo proveedor"  maxlength="3" tabindex="1" value="<?php print($liidtipo_proveedor);?>" onblur="fperderfocusidtipo_proveedor();">
								<div class="col-lg-6">
								<div class="form-group has-error">
									<label >Nombre:</label>
										<input class="form-control"  onBlur="cambio_mayus(this)" type="text" name="txtdesc_tipo_prov" placeholder="Solo Ingrese Letras" onkeypress="return soloLetra(event)" title="ingrese nombre tipo proveedor" maxlength="50" value="<?php print($lsdesc_tipo_prov);?>"> 
									</div>
									</div>
							<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							</div>	
						

							<div class="row">
							<div class="form-group col-lg-3"></div>
							<div class="form-group col-lg-9">
								
								<label>El campo que contenga un aterisco (*) es un campo obligatorio y debe ser llenado.</label>
							</div>
							</div>
							<center>
							<button type="button" name="btnnuevo"     class="btn btn-lg btn-primary"  title="Clic para Registrar" onclick="fnuevo();">Nuevo</button>
							<button type="button" name="btnbuscar"    class="btn btn-lg btn-primary"  title="Clic para Consultar" data-toggle="chat" data-collapse-sidebar="1">Consultar</button>
							<button type="submit" name="btnguardar"   class="btn btn-lg btn-primary"  title="Clic para Guardar" onclick="fguardar();">Guardar</button>
							<button type="button" name="btnmodificar" class="btn btn-lg btn-primary"  title="Clic para Modificar" onclick="fmodificar();" >Modificar</button>
							<?php
							 if ($lsestatus_tippro==1)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Desactivar" onclick="feliminar();" >Desactivar</button>';
							}
							else if ($lsestatus_tippro==0)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Activar"  onclick="factivar();" >Activar</button>';
							}
							?>
							<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('maestro_tipo_proveedor')">Cancelar</button>
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
						<label>Un tipo de proveedor forma parte esencial para el registro del cliente; por lo tanto, es un campo obligatorio que debe ser registrado.</label>
					</div> 
		</div>
	</div> 
</div>
</div>
<script language="javascript">

	finicio();

	function finicio()
	{
		lof=document.fmaestro_tipo_proveedor;
		
			if (lof.txtoperacion.value=="buscar")
			{
			lof=document.fmaestro_tipo_proveedor;
			lof.txtdesc_tipo_prov.disabled=true;
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
		lof=document.fmaestro_tipo_proveedor;
		lof.txtoperacion.value="incluir";
		lof.txtdesc_tipo_prov.disabled=false;
		lof.txtdesc_tipo_prov.focus();
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
	}	
		
	function fcancelar()
	{
		lof=document.fmaestro_tipo_proveedor;
		lof.txtdesc_tipo_prov.value="";
		lof.txtoperacion.value="";
		lof.txthacer.value="";
		lof.txthay.value=0;
		lof.txtdesc_tipo_prov.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=true;
		lof.btnnuevo.disabled=false;
		lof.btnbuscar.disabled=false;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
	}
	function fmodificar()
	{
		lof=document.fmaestro_tipo_proveedor;
		lof.txtoperacion.value="modificar";
		lof.txtdesc_tipo_prov.disabled=false;
		lof.txtdesc_tipo_prov.focus();
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
	}	
		
		
	function feliminar()
		{
			lof=document.fmaestro_tipo_proveedor;
				if (confirm("¿Desea desactivar el registro?"))
				{
					lof.txtidtipo_proveedor.disabled=false;
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
		lof=document.fmaestro_tipo_proveedor;
		lof.txtidtipo_proveedor.disabled=false;
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
		function abretipo_proveedor(){ //~ luego de 'funcion' se le coloca el nombre que se le dio en el onclick de arriba
		miPopup = window.open("ayuda/ayudatipo_proveedor.php","solicitud","width=450px,height=870px,scrollbars=yes,toolbar=No") //~ aqui se debe colocar la direccion del archivo de la ayuda
		miPopup.focus()
	}
</script>
