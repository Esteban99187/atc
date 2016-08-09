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
	$liidbanco = isset($_GET['liidbanco']) ? $_GET['liidbanco'] : null;
	$lsdesc_banc = isset($_GET['lsdesc_banc']) ? $_GET['lsdesc_banc'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lsestatus_ban= isset($_GET['lsestatus_ban']) ? $_GET['lsestatus_ban'] : null ;
	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;

?>
<script type="text/javascript">
	function BuscarAjaxbanco(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../controlador/ControladorBuscarAjax.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML=ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=BusquedaAjaxbanco&status=1&estado="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=BusquedaAjaxbanco&status=0&estado="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=BusquedaAjaxbanco&status=Null&estado="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Banco</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abrebanco()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
				<div class="panel-body">
					<form method="post" name="fbanco" id="fbanco" action="../controlador/control_maestro_banco.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
							<div class="form-group col-lg-3"></div>
								<input class="form-control"  type="hidden" name="txtidbanco" onkeypress="return soloNumero(event)" title="ingrese nombre de banco"  maxlength="3" tabindex="1" value="<?php print($liidbanco);?>" onblur="fperderfocusidbanco();">
								<div class="col-lg-6">
								<div class="form-group has-error">
									<label >Nombre:</label>
										<input class="form-control"  type="text" onBlur="cambio_mayus(this)" name="txtdesc_banc" placeholder="Solo Ingrese Letras" onkeypress="return soloLetra(event)" title="ingrese nombre descriptivo del banco" onkeypress="return soloLetra(event)" maxlength="50" onkeypress="return soloLetra(event)" tabindex="2"  value="<?php print($lsdesc_banc);?>">
							</div>
							</div>
							<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							</div>	
						<div class="row">
							<div class="form-group col-lg-3"></div>
							<div class="form-group col-lg-9">
							<label>¡El campo que contenga un asterísco (*) es un campo obligatorio y debe ser llenado!</label>
							</div>
							</div>
							
							<center>
							<button type="button" name="btnnuevo"     class="btn btn-lg btn-primary"  title="Clic para Registrar" onclick="fnuevo();">Nuevo</button>
							<button type="button" name="btnbuscar"    class="btn btn-lg btn-primary"  title="Clic para Consultar" data-toggle="chat" data-collapse-sidebar="1">Consultar</button>
							<button type="submit" name="btnguardar"   class="btn btn-lg btn-primary"  title="Clic para Guardar" onclick="fguardar();">Guardar</button>
							<button type="button" name="btnmodificar" class="btn btn-lg btn-primary"  title="Clic para Modificar" onclick="fmodificar();" >Modificar</button>
							<?php
							 if ($lsestatus_ban==1)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Desactivar" onclick="feliminar();" >Desactivar</button>';
							}
							else if ($lsestatus_ban==0)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Activar"  onclick="factivar();" >Activar</button>';
							}
							?>
							<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('maestro_banco')">Cancelar</button>
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
				<label>El Banco forma parte esencial para el registro del conductor; por lo tanto, es un campo obligatorio que debe ser registrado.</label>
			</div> 
		</div>
	</div> 
</div>
</div>
<script language="javascript">
	finicio();

	function finicio()
	{
		lof=document.fbanco;
		
			if (lof.txtoperacion.value=="buscar")
			{
			lof=document.fbanco;
			lof.txtdesc_banc.disabled=true;
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
		lof=document.fbanco;
		lof.txtoperacion.value="incluir";
		lof.txtdesc_banc.disabled=false;
		lof.txtdesc_banc.focus();
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
	}
		function fcancelar()
	{
		lof=document.fbanco;
		lof.txtdesc_banc.value="";
		lof.txtoperacion.value="";
		lof.txthacer.value="";
		lof.txthay.value=0;
		lof.txtdesc_banc.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=true;
		lof.btnnuevo.disabled=false;
		lof.btnbuscar.disabled=false;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
	}
		function fmodificar()
	{
		lof=document.fbanco;
		lof.txtoperacion.value="modificar";
		lof.txtdesc_banc.disabled=false;
		lof.txtdesc_banc.focus();
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
	}
		function feliminar()
	{
		lof=document.fbanco;
			if (confirm("¿Desea Desactivar el registro?"))
			{
				lof.txtidbanco.disabled=false;
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
		lof=document.fbanco;
		lof.txtidbanco.disabled=false;
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
		function abrebanco(){ //~ luego de 'funcion' se le coloca el nombre que se le dio en el onclick de arriba
		miPopup = window.open("ayuda/ayudabanco.php","solicitud","width=450px,height=870px,scrollbars=yes,toolbar=No") //~ aqui se debe colocar la direccion del archivo de la ayuda
		miPopup.focus()
	}
</script>
